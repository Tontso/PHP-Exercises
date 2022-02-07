<?php

namespace Repositories\Users;
use Data\Users\UserDTO;

interface UserRepositoryInterface
{
    public function getAllUsers(): \Generator;

    public function register(UserDTO $userDTO);

    public function getUserByName(string $username): UserDTO;

    public function getUserById(int $id): UserDTO;
   
}