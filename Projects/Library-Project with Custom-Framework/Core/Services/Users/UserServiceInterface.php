<?php

namespace Core\Services\Users;

use DTO\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO): bool;
    public function edit(UserDTO $userDTO): bool;
    public function getAll();

}