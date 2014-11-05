<?php
if ($error = $Fake->getError()) {
    require __DIR__.'/response-error.php';
} elseif ($success = $Fake->getSuccess()) {
    require __DIR__.'/response-success.php';
}
