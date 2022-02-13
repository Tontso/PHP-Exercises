<?php

namespace Core\Services\Users;

interface UserServiceInterface
{
    public function register($username, $password): bool;
}