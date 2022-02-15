<?php

namespace App\Data;

class UserDTO 
{

    private $id;
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $bornOn;

    public static function create($username, $password, $firstName, $lastName, $bornOn,$id=null) {
        return (new UserDTO())
        ->setUsername($username)
        ->setPassword($password)
        ->setFirstName($firstName)
        ->setLastName($lastName)
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
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

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
}