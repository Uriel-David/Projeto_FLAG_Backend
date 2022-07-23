<?php

class User
{
    private $name;
    private $username;
    private $email;
    private $password;

    public function __construct($user)
    {
        $this->name     = $user['name'];
        $this->username = $user['username'];
        $this->email    = $user['email'];
        $this->password = $user['password'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAllData()
    {
        $user = [
            'name'      => $this->name,
            'username'  => $this->username,
            'email'     => $this->email,
            'password'  => $this->password
        ];

        return $user;
    }
}