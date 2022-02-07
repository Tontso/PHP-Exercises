<?php

namespace Repositories\Users;

use Data\Users\UserDTO;

class UserRepository implements UserRepositoryInterface
{

    private $db;


    public function __construct(\Database\DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function getAllUsers(): \Generator
    {
        return $this->db->query("SELECT * FROM users")->execute()->fetch(UserDTO::class);   
    }


    public function register(UserDTO $userDTO)
    {
        $this->db->query("INSERT INTO users (username, password) VALUES (?, ?)")
            ->execute([$userDTO->getUsername(), $userDTO->getPassword()]);
    }


    public function getUserByName(string $username): UserDTO
    {
        $user = $this->db->query("SELECT * FROM users WHERE username = ?")
            ->execute([$username])->fetch(UserDTO::class);
        
        $user = $user->current();

        $tmpUser = new UserDTO();
        $tmpUser->setId($user->getId());
        $tmpUser->setUsername($user->getUsername());
        $tmpUser->setPassword($user->getPassword());
        $tmpUser->setConfirmPassword('');

        return $tmpUser;
    }

    public function getUserById(int $id): UserDTO{
        $user = $this->db->query("SELECT * FROM users WHERE id = ?")
            ->execute([$id])->fetch(UserDTO::class);
        
        $user = $user->current();
        $tmpUser = new UserDTO();
        $tmpUser->setId($user->getId());
        $tmpUser->setUsername($user->getUsername());
        $tmpUser->setPassword($user->getPassword());
        $tmpUser->setConfirmPassword('');

        return $tmpUser;
    }
    
}