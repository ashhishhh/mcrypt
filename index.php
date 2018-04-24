<?php

use Encrypt\EncryptionFactory;

require_once 'vendor/autoload.php';

$key = '9101112012345678';
$encryptionObj = EncryptionFactory::create($key);

$payload = "You string will go here";
$garble = $encryptionObj->encrypt($payload);
$payload = $encryptionObj->decrypt($garble);
echo $garble;
