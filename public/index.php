<?php
require __DIR__.'/../vendor/autoload.php';

$config = __DIR__.'/../config';
$config .= (is_file($config.'.local.php') ? '.local' : '').'.php';

$Fake = new Redsys\Fake\Fake(require $config);
$Fake->loadFromUrl();

include __DIR__.'/../src/views/html.php';
