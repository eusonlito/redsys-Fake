<?php
namespace Redsys\Fake;

use Exception;

class Fake
{
    private $options = array();

    private $option_prefix = 'Ds_Merchant_';

    private $o_required = array('Environment', 'Currency', 'Terminal', 'ConsumerLanguage', 'MerchantCode', 'Key', 'MerchantName', 'Titular');
    private $o_optional = array('UrlOK', 'UrlKO', 'TransactionType', 'MerchantURL');

    private $values = array();
    private $hidden = array();

    public function __construct(array $options)
    {
        return $this->setOption($options);
    }

    public function setOption($option, $value = null)
    {
        if (is_array($option)) {
            $options = $option;
        } elseif ($value !== null) {
            $options = array($option => $value);
        } else {
            throw new Exception(sprintf('Option <strong>%s</strong> can not be empty', $option));
        }

        $options = array_merge($this->options, $options);

        foreach ($this->o_required as $option) {
            if (empty($options[$option])) {
                throw new Exception(sprintf('Option <strong>%s</strong> is required', $option));
            }

            $this->options[$option] = $options[$option];
        }

        foreach ($this->o_optional as $option) {
            if (array_key_exists($option, $options)) {
                $this->options[$option] = $options[$option];
            }
        }

        $this->setEnvironment($options['Environment']);

        return $this;
    }

    public function getOption($key = null)
    {
        return $key ? $this->options[$key] : $this->options;
    }

    public function getSignature()
    {
        $prefix = $this->option_prefix;
        $fields = array('Amount', 'Order', 'MerchantCode', 'Currency', 'TransactionType', 'MerchantURL');
        $key = '';

        foreach ($fields as $field) {
            if (!isset($this->values[$prefix.$field])) {
                throw new Exception(sprintf('Field <strong>%s</strong> is empty and is required to create signature key', $field));
            }

            $key .= $this->values[$prefix.$field];
        }

        return strtoupper(sha1($key.$this->options['Key']));
    }

    public function checkTransaction(array $post)
    {
        $prefix = 'Ds_';

        if (empty($post) || empty($post[$prefix.'Signature'])) {
            throw new Exception('_POST data is empty');
        }

        $fields = array('Amount', 'Order', 'MerchantCode', 'Currency', 'Response');
        $key = '';

        foreach ($fields as $field) {
            if (empty($post[$prefix.$field])) {
                throw new Exception(sprintf('Field <strong>%s</strong> is empty and is required to verify transaction'));
            }

            $key .= $post[$prefix.$field];
        }

        $signature = strtoupper(sha1($key.$this->options['Key']));

        if ($signature !== $post[$prefix.'Signature']) {
            throw new Exception(sprintf('Signature not valid (%s != %s)', $signature, $post[$prefix.'Signature']));
        }

        $response = (int)$post[$prefix.'Response'];

        if (($response >= 100) && ($response !== 900)) {
            throw new Exception(sprintf('Transaction error. Code: <strong>%s</strong>', $post[$prefix.'Response']));
        }

        return $post[$prefix.'Signature'];
    }
}
