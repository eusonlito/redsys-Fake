<?php
namespace Redsys\Fake;

use Exception;
use Redsys\Messages\Messages;

class Fake
{
    private $options = array();

    private $signature_fields_check = array('Amount', 'Order', 'MerchantCode', 'Currency', 'TransactionType', 'MerchantURL');
    private $signature_fields_new = array('Amount', 'Order', 'MerchantCode', 'Currency', 'Response');

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
        $Merchant_Url = $_POST['Ds_Merchant_Url'.($success ? 'OK' : 'KO')];

        if (empty($_POST['Ds_Merchant_MerchantURL'])) {
            die(header('Location: '.$Merchant_Url));
        }

        $Curl = new Curl(array(
            'base' => $_POST['Ds_Merchant_MerchantURL']
        ));

        $auth = $this->getOption('basic_auth');

        if (isset($auth['user']) && isset($auth['password'])) {
            $Curl->setHeader(CURLOPT_USERPWD, $auth['user'].':'.$auth['password']);
        }

        $_POST['Ds_Merchant_Response'] = sprintf('%04d', $_POST['Ds_Response']);

        $post = array(
            'DS_Date' => date('d/m/Y'),
            'DS_Hour' => date('H:i'),
            'Ds_SecurePayment' => $this->getOption('SecurePayment', '0'),
            'Ds_Card_Country' => $this->getOption('Card_Country', '724'),
            'Ds_Amount' => $_POST['Ds_Merchant_Amount'],
            'Ds_Currency' => $_POST['Ds_Merchant_Currency'],
            'Ds_Order' => $_POST['Ds_Merchant_Order'],
            'Ds_MerchantCode' => $_POST['Ds_Merchant_MerchantCode'],
            'Ds_Terminal' => sprintf('%03d', $_POST['Ds_Merchant_Terminal']),
            'Ds_Signature' => $this->getSignature('new', $_POST),
            'Ds_Response' => $_POST['Ds_Merchant_Response'],
            'Ds_MerchantData' => $_POST['Ds_Merchant_MerchantData'],
            'Ds_TransactionType' => $_POST['Ds_Merchant_TransactionType'],
            'Ds_ConsumerLanguage' => (int) $_POST['Ds_Merchant_ConsumerLanguage'],
            'Ds_AuthorisationCode' => ($success ? mt_rand(100000, 999999) : '')
        );

        if ($success === false) {
            $post['Ds_ErrorCode'] = $_POST['Ds_ErrorCode'];
        }

        $Curl->post('', array(), $post);

        sleep(1);

        die(header('Location: '.$Merchant_Url));
    }

    private function getSignature($type, $values)
    {
        if (!in_array($type, array('check', 'new'), true)) {
            $this->setError(sprintf('Signature type <strong>%s</strong> is not valid', $type));
        }

        $fields = ($type === 'check') ? $this->signature_fields_check : $this->signature_fields_new;
        $prefix = $this->option_prefix;

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

        $key = '';

        foreach ($fields as $field) {
            $key .= $values[$prefix.$field];
        }

        return strtoupper(sha1($key.$this->options['Key']));
    }

    private function checkSignature($data)
    {
        $field = $this->option_prefix.'MerchantSignature';

        if (empty($data[$field])) {
            return $this->setErrorCode('SIS0020');
        }

        $signature = $this->getSignature('check', $data);

        return ($signature === $data[$field]);
    }
}
