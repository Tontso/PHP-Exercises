<?php

namespace App\Repository;

use App\Data\UserDTO;
use Database\DatabaseInterface;
use Generator;

class UserRepository implements UserRepositoryInterface
{

    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }

    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query("
            INSERT INTO users (username, password, first_name, last_name, born_on) 
            VALUES(?, ?, ?, ?,?);
        ")
        ->execute([
            $userDTO->getUsername(), 
            $userDTO->getPassword(),
            $userDTO->getFirstName(),
            $userDTO->getLastName(),
            $userDTO->getBornOn()
            ])
        ->fetch(UserDTO::class);
        return true;
    }
    public function update(int $id, UserDTO $userDTO): bool
    {
        $this->db->query("
            UPDATE users
            SET
                username = ?,
                password = ?,
                first_name = ?,
                last_name = ?,
                born_on = ?
            WHERE id = ?
        ")
        ->execute([
            $userDTO->getUsername(), 
            $userDTO->getPassword(),
            $userDTO->getFirstName(),
            $userDTO->getLastName(),
            $userDTO->getBornOn(),
            $id
        ])
        ->fetch(UserDTO::class);
        return true;

    }
    public function delete(int $id): bool
    {
        $this->db->query("
            DELETE FROM users WHERE id = ?
        ")
        ->execute([$id])
        ->fetch(UserDTO::class);
        return true;
    }
    public function findUserByUsername(string $username)
    {
        return $this->db->query("
            SELECT id, 
                username, 
                password, 
                first_name AS firstName, 
                last_name AS lastName, 
                born_on AS bornOn
            FROM users
            WHERE username = ?
        ")
        ->execute([
            $username
            ])
        ->fetch(UserDTO::class)
        ->current();
    }
    public function findUserById(int $id)
    {
        return $this->db->query("
        SELECT id, 
            username, 
            password, 
            first_name AS firstName, 
            last_name AS lastName, 
            born_on AS bornOn
        FROM users
        WHERE id = ?
        ")
        ->execute([
        $id
        ])
        ->fetch(UserDTO::class)
        ->current();
    }

    /**
     * @return \Generaton|UserDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("
        SELECT id, username, password, first_name, last_name, born_on 
        FROM users
        ")
        ->execute()
        ->fetch(UserDTO::class);
        
    }
}