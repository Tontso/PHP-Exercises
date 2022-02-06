<?php

namespace Services\Users;

use Data\Users\UserDTO;

interface UserServiceInterface
{
    /**
     * @param UserDTO $userDTO
     * @throws \Exception
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
}