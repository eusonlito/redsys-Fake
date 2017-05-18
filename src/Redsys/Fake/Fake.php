<?php
namespace Redsys\Fake;

use Exception;
use Redsys\Messages\Messages;

class Fake
{
    private $options = array();

    private $option_prefix = 'Ds_Merchant_';

    private $success = '';
    private $error = '';

    public function __construct(array $options)
    {
        $this->setOption($options);

        return $this;
    }

    public function setOption($option, $value = null)
    {
        if (is_string($option)) {
            $option = array($option => $value);
        }

        $this->options = array_merge($this->options, $option);

        if (empty($this->options['Key'])) {
            throw new Exception(sprintf('Option <strong>%s</strong> can not be empty', 'Key'));
        }

        return $this;
    }

    public function getOption($key = null, $default = '')
    {
        if (empty($key)) {
            return $this->options;
        } elseif (array_key_exists($key, $this->options)) {
            return $this->options[$key];
        } else {
            return $default;
        }
    }

    public function getError()
    {
        return $this->error;
    }

    public function getMessages($exp = '')
    {
        if (empty($exp)) {
            return Messages::getAll();
        }

        return Messages::getByExp($exp);
    }

    public function getSuccess()
    {
        return $this->success;
    }

    private function setErrorCode($code)
    {
        $message = Messages::getByCode($code);

        if (empty($message)) {
            throw new Exception(sprintf('Error code <strong>%s</strong> not defined', $code));
        }

        $msg = Messages::getByCode($message['msg']);

        $this->setError(sprintf('[%s] %s [%s - %s]', $message['code'], $message['message'], $message['msg'], $msg['message']));
    }

    private function setError($msg, $throw = true)
    {
        $this->error = new Exception($msg);

        if ($throw) {
            throw $this->error;
        }

        return $this;
    }

    public function loadFromUrl()
    {
        $path = basename(preg_replace('#/$#', '', getenv('REQUEST_URI')));

        if (!$this->isValidPath($path)) {
            return $this->setError(sprintf('URL "%s" is not valid', getenv('REQUEST_URI')), false);
        }

        try {
            $this->$path();
        } catch (Exception $e) {}

        return $this;
    }

    private function isValidPath($path)
    {
        return in_array($path, array('realizarPago'), true);
    }

    private function realizarPago()
    {
        if (isset($_POST['action'])) {
            return $this->realizarPagoResponse();
        }

        if ($this->checkSignature($_POST) === true) {
            $this->success = 'Valid signature';
        } else {
            $this->setErrorCode('SIS0041');
        }
    }

    private function realizarPagoResponse()
    {
        $success = ($_POST['action'] === 'success');

        $values_json = base64_decode($_POST['Ds_MerchantParameters']);
        $values = json_decode($values_json, true);

        $Merchant_Url = $values['Ds_Merchant_Url'.($success ? 'OK' : 'KO')];

        if (empty($values['Ds_Merchant_MerchantURL'])) {
            die(header('Location: '.$Merchant_Url));
        }

        $Curl = new Curl(array(
            'base' => $values['Ds_Merchant_MerchantURL']
        ));

        $auth = $this->getOption('basic_auth');

        if (isset($auth['user']) && isset($auth['password'])) {
            $Curl->setHeader(CURLOPT_USERPWD, $auth['user'].':'.$auth['password']);
        }

        $values['Ds_Merchant_Response'] = sprintf('%04d', $_POST['Ds_Response']);

        $post = array(
            'DS_Date' => date('d/m/Y'),
            'DS_Hour' => date('H:i'),
            'Ds_SecurePayment' => $this->getOption('SecurePayment', '0'),
            'Ds_Card_Country' => $this->getOption('Card_Country', '724'),
            'Ds_Amount' => $values['Ds_Merchant_Amount'],
            'Ds_Currency' => $values['Ds_Merchant_Currency'],
            'Ds_Order' => $values['Ds_Merchant_Order'],
            'Ds_MerchantCode' => $values['Ds_Merchant_MerchantCode'],
            'Ds_Terminal' => sprintf('%03d', $values['Ds_Merchant_Terminal']),
            'Ds_Response' => $values['Ds_Merchant_Response'],
            'Ds_MerchantData' => $values['Ds_Merchant_MerchantData'],
            'Ds_TransactionType' => $values['Ds_Merchant_TransactionType'],
            'Ds_ConsumerLanguage' => (int) $values['Ds_Merchant_ConsumerLanguage'],
            'Ds_AuthorisationCode' => ($success ? mt_rand(100000, 999999) : '')
        );

        if ($success === false) {
            $post['Ds_ErrorCode'] = $_POST['Ds_ErrorCode'];
        }


        $to_post = array();
        $to_post['Ds_MerchantParameters'] = base64_encode(json_encode($post));
        $to_post['Ds_SignatureVersion'] = $_POST['Ds_SignatureVersion'];
        $to_post['Ds_Signature'] = $_POST['Ds_Signature'];

        $Curl->post('', array(), $to_post);

        sleep(1);

        die(header('Location: '.$Merchant_Url));
    }

    private function getSignature($type, $values)
    {
        if (!in_array($type, array('check', 'new'), true)) {
            $this->setError(sprintf('Signature type <strong>%s</strong> is not valid', $type));
        }

        $prefix = $this->option_prefix;

        $values_json = base64_decode($values['Ds_MerchantParameters']);
        $values = json_decode($values_json, true);

        if (empty($values[$prefix.'Amount'])) {
            $this->setErrorCode('SIS0018');
        } elseif (empty($values[$prefix.'Order'])) {
            $this->setErrorCode('SIS0074');
        } elseif (empty($values[$prefix.'MerchantCode'])) {
            $this->setErrorCode('SIS0008');
        } elseif (empty($values[$prefix.'Currency'])) {
            $this->setErrorCode('SIS0015');
        } elseif (!in_array($values[$prefix.'TransactionType'], array('0', '1', '2', '3', '7', '8', '9'))) {
            $this->setErrorCode('SIS0023');
        }

        $array_json = json_encode($values);
        $array_base = base64_encode($array_json);

        $order = $values[$prefix.'Order'];

        $key = $this->encrypt3DESOpenSSL($order, base64_decode($this->options['Key']));

        return base64_encode(hash_hmac('sha256', $array_base, $key, true));
    }

    private function checkSignature($data)
    {
        $field = 'Ds_Signature';

        if (empty($data[$field])) {
            return $this->setErrorCode('SIS0020');
        }

        $signature = $this->getSignature('check', $data);

        return ($signature === $data[$field]);
    }

    private function encrypt3DESOpenSSL($message, $key)
    {
        $l = ceil(strlen($message) / 8) * 8;
        $message = $message.str_repeat("\0", $l - strlen($message));

        return substr(openssl_encrypt($message, 'des-ede3-cbc', $key, OPENSSL_RAW_DATA, "\0\0\0\0\0\0\0\0"), 0, $l);
    }
}
