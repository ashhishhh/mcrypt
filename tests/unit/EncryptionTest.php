<?php

use PHPUnit\Framework\TestCase;

class EncryptionTest extends TestCase {

    private $key;

    public function test_encryption() {
        $this->key = 'The key value';
        $encryptionObj = Encrypt\EncryptionFactory::create($this->key);

        $payload = ['Something', 'Some other thing', 'Something else'];
        $garble = [];
        foreach ($payload as $string) {
            $garble[] = $encryptionObj->encrypt($string);
        }
        foreach ($garble as $string) {
            $payload_result[] = $encryptionObj->decrypt($string);
        }

        $this->assertEquals($payload, $payload_result);
    }

}
