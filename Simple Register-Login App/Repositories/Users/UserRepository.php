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
        return $this->db->query("SELECT * FROM users")->execute()->fetch();   
    }


    public function register(UserDTO $userDTO)
    {
        $this->db->query("INSERT INTO users (username, password) VALUES (?, ?)")
            ->execute([$userDTO->getUsername(), $userDTO->getPassword()]);
    }


    public function getUserByName(string $username): UserDTO
    {
        $user = $this->db->query("SELECT * FROM users WHERE username = ?")
            ->execute([$username])->fetch();
        
        $user = $user->current();
        
        return new UserDTO($user['username'], $user['password'], '');
    }
    
}