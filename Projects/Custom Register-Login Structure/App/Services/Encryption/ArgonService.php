<?php

namespace App\Services\Encryption;

class ArgonService implements EncryptionInterface
{
    
    public function encryption(string $password)
    {
        return password_hash($password, PASSWORD_ARGON2I);
    }

    public function verify(string $password, string $hash)
    {
        return password_verify($password, $hash);
    }
}