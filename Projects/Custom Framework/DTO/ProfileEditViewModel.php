<?php

namespace DTO;

class ProfileEditViewModel
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $birthday;

    public function __construct($id, $username, $password, $email, $birthday)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->birthday = $birthday;
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }
}