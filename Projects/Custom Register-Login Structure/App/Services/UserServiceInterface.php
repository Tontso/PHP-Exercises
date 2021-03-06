<?php

namespace App\Services;

use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword): bool;
    public function login(string $username, string $password): ?UserDTO;
    public function currentUser(): ?UserDTO;
    public function isLogged(): bool;
    public function edit(UserDTO $userDTO): bool;
    public function getAll();

}