<?php

namespace Services\Users;

use Data\Users\UserDTO;

interface UserServiceInterface
{
    /**
     * @param UserDTO $userDTO
     * @throws RegistrationException
     * @return mixted
     */
    public function register(UserDTO $userDTO);

    /**
     * @param string $username
     * @param string $password
     * @throws \Exception
     * @return bool
     */
    public function verifyCredentials(string $username, string $password): bool;

    public function findByUsername(string $username): UserDTO;
    
    public function findById(int $id): UserDTO;

    public function edit(int $id, UserDTO $userDTO): void;
}