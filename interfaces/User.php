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
        $this->name     = $user['name'] ?? null;
        $this->username = $user['username'] ?? null;
        $this->email    = $user['email'] ?? null;
        $this->password = $user['password'] ?? null;
        $this->userId   = $user['user_id'] ?? null;
        $this->isAdmin  = $user['is_admin'] ?? 0;
    }

    public function getName()
    {
        return htmlspecialchars($this->name);
    }

    public function getUsername()
    {
        return htmlspecialchars($this->username);
    }

    public function getEmail()
    {
        return htmlspecialchars($this->email);
    }

    public function getPassword()
    {
        return htmlspecialchars($this->password);
    }

    public function getId()
    {
        return htmlspecialchars($this->userId);
    }

    public function getIsAdmin()
    {
        return htmlspecialchars($this->isAdmin);
    }

    public function getAllData()
    {
        return [
            'name'      => htmlspecialchars($this->name),
            'username'  => htmlspecialchars($this->username),
            'email'     => htmlspecialchars($this->email),
            'password'  => htmlspecialchars($this->password),
            'user_id'   => htmlspecialchars($this->userId),
            'is_admin'  => htmlspecialchars($this->isAdmin),
        ];
    }
}