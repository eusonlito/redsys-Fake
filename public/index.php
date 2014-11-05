<?php
require __DIR__.'/../src/autoload.php';

$Fake = new Redsys\Fake\Fake(require __DIR__.'/../config.php');
$Fake->loadFromUrl();

include __DIR__.'/../src/views/html.php';
