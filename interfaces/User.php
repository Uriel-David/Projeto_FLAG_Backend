<?php

class User
{
    private $name;
    private $username;
    private $email;
    private $password;
    private $userId;

    public function __construct($user)
    {
        $this->name     = $user['name'] ?? null;
        $this->username = $user['username'] ?? null;
        $this->email    = $user['email'] ?? null;
        $this->password = $user['password'] ?? null;
        $this->userId   = $user['user_id'] ?? null;
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

    public function getId()
    {
        return $this->userId;
    }

    public function getAllData()
    {
        $user = [
            'name'      => $this->name,
            'username'  => $this->username,
            'email'     => $this->email,
            'password'  => $this->password,
            'user_id'   => $this->userId,
        ];

        return $user;
    }
}