<?php
require_once __DIR__ . '/../services/global.php';
require_once __DIR__ . '/../database/conection.php';
require_once __DIR__ . '/../services/register.php';

class UserModel
{
    private $registerService;
    
    public function __construct($user)
    {
        $this->registerService = new Register($user);
    }

    public function getUsers()
    {

    }

    public function getUser()
    {

    }

    public function createUser()
    {   
       return $this->registerService->registerUser();
    }

    public function editUser()
    {

    }

    public function deleteUser()
    {

    }
}
