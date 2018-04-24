<?php

namespace Encrypt;

interface Encryptable {

    public function encrypt($payload);

    public function decrypt($garble);
}
