<?php

namespace Repository\Users;

use DTO\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO): bool;
    public function update(int $id, UserDTO $userDTO): bool;
    public function delete(int $id): bool;
    public function findUserByUsername(string $username);
    public function findUserById(int $id);

    /**
     * @return \Generaton|UserDTO[]
     */
    public function findAll(): \Generator;
}