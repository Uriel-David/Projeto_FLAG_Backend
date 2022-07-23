<?php
require_once __DIR__ . '/global.php';
require_once __DIR__ . '/../database/conection.php';
require_once __DIR__ . '/../services/register.php';

class UserModel
{
    private $registerService;
    
    private function __construct($user)
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
        if ($this->registerService->registerUser()) {
            header("Location: ../views/kanban.php");
            exit;
        }

        header("Location: ../views/register.php?register=error");
        exit;
    }

    public function editUser()
    {

    }

    public function deleteUser()
    {

    }
}
