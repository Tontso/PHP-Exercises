<?php 

namespace Repository\Users;

use DTO\UserDTO;
use Driver\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{

    private $db;

    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }
    
    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query("
            INSERT INTO users (username, password, full_name, born_on) 
            VALUES(?, ?, ?, ?);
        ")
        ->execute([
            $userDTO->getUsername(), 
            $userDTO->getPassword(),
            $userDTO->getFullName(),
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
                full_name = ?,
                born_on = ?
            WHERE id = ?
        ")
        ->execute([
            $userDTO->getUsername(), 
            $userDTO->getPassword(),
            $userDTO->getFullName(),
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
                full_name AS fullName, 
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
            full_name AS fullName, 
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
        SELECT id, username, password, full_name, born_on 
        FROM users
        ")
        ->execute()
        ->fetch(UserDTO::class);
        
    }
}