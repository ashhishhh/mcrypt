<?php

namespace Encrypt;

use Encrypt\EncryptionClass;

class EncryptionFactory {

    public static function create($key, $cipher = null) {
        return new EncryptionClass($key, $cipher);
    }

}
