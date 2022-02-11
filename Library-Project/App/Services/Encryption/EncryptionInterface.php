<?php

namespace App\Services\Encryption;

interface EncryptionInterface
{
    public function encryption(string $password);
    public function verify(string $password, string $hash);
}
    