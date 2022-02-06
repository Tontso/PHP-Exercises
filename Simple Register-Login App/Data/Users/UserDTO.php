<?php

namespace Data\Users;

class UserDTO
{
    private $username;
    private $password;
    private $confirmPassword;

    public function __construct(string $username, string $password, string $confirmPassword)
    {
        $this->setUsername($username);
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword($confirmPassword): void
    {
        $this->confirmPassword = $confirmPassword;
    }
}
