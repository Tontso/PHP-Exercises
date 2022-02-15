<?php

namespace Core\Services\Authentication;

use DTO\UserDTO;

interface AuthenticationServiceInterface
{
    public function isLogged(): bool;

    public function login($username, $password): bool;

    public function getCurrentUser(): ?UserDTO;
}