<?php

namespace DTO;

class UserDTO
{
    private $id;
    private $username;
    private $password;
    private $fullName;
    private $bornOn;

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */ 
    public function setUsername($username)
    {
        $this->username = $username;
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
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

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
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}