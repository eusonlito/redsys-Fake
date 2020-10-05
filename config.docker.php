<?php
return array(
    // Signature Key
    'Key' => $_SERVER['KEY'] ?: 'sq7HjrUOBfKmC576ILgskD5srU870gJ7',

    // Basic auth to attach to Ds_Merchant_MerchantURL response if your environment is protected
    'basic_auth' => array(
        'user' => $_SERVER['BASIC_AUTH_USER'] ?: '',
        'password' => $_SERVER['BASIC_AUTH_PASSWORD'] ?: ''
    )
);
