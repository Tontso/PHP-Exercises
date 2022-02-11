<?php

namespace App\Data;

class UserDTO 
{

    private $id;
    private $username;
    private $password;
    private $fullName;
    private $bornOn;

    public static function create($username, $password, $fullName, $bornOn, $id=null) {
        return (new UserDTO())
        ->setUsername($username)
        ->setPassword($password)
        ->setFullName($fullName)
        ->setBornOn($bornOn);
    }

    

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of bornOn
     */ 
    public function getBornOn()
    {
        return $this->bornOn;
    }

    /**
     * Set the value of bornOn
     *
     * @return  self
     */ 
    public function setBornOn($bornOn)
    {
        $this->bornOn = $bornOn;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of fullName
     */ 
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set the value of fullName
     *
     * @return  self
     */ 
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }
}