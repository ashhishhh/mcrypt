<?php

namespace Encrypt;

use Encrypt\Encryptable;

class OpenSSL implements Encryptable {

    private $key;
    private $cipher;

    public function __construct($key, $cipher = null) {
        $this->key = $key;
        $this->cipher = $cipher ? $cipher : 'aes-256-cbc';
    }

    public function encrypt($payload) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
        $encrypted = openssl_encrypt($payload, $this->cipher, $this->key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    public function decrypt($garble) {
        list($encrypted_data, $iv) = explode('::', base64_decode($garble), 2);
        return openssl_decrypt($encrypted_data, $this->cipher, $this->key, 0, $iv);
    }

}
