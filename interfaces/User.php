<?php

class User
{
    private $name;
    private $username;
    private $email;
    private $password;
    private $userId;
    private $isAdmin;

    public function __construct($user)
    {
        $this->name     = htmlspecialchars($user['name']) ?? null;
        $this->username = htmlspecialchars($user['username']) ?? null;
        $this->email    = htmlspecialchars($user['email']) ?? null;
        $this->password = htmlspecialchars($user['password']) ?? null;
        $this->userId   = htmlspecialchars($user['user_id']) ?? null;
        $this->isAdmin  = htmlspecialchars($user['is_admin']) ?? 0;
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

    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function getAllData()
    {
        $user = [
            'name'      => $this->name,
            'username'  => $this->username,
            'email'     => $this->email,
            'password'  => $this->password,
            'user_id'   => $this->userId,
            'is_admin'  => $this->isAdmin,
        ];

        return $user;
    }
}