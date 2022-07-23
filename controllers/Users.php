<?php
require_once __DIR__ . '/global.php';
require_once __DIR__ . '/../database/conection.php';
require_once __DIR__ . '/../models/User.php';

class UserController
{
    private $userModel;

    private function __construct($user)
    {
        $this->userModel = new UserModel($user);
    }

    public function get()
    {
    }

    public function post()
    {
        $this->userModel->createUser();
    }

    public function put()
    {
    }

    public function delete()
    {
    }
}

// Criar rotas
