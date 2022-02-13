<?php

namespace DTO;

class ProfileEditBindingModel
{
    private $id;
    private $username;
    private $password ;
    private $email;
    private $birthday;

    


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