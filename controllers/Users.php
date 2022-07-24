<?php
require_once __DIR__ . '/../services/global.php';
require_once __DIR__ . '/../database/conection.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../services/login.php';
require_once __DIR__ . '/../services/logout.php';

class UserController
{
    private $userModel;
    private $userLogin;
    private $userLogout;

    public function __construct($user)
    {
        if (!isset($user)) {
            $user = [];
        }

        $this->userModel    = new UserModel($user);
        $this->userLogin    = new Login($user);
        $this->userLogout   = new Logout();
    }

    public function get()
    {
    }

    public function post()
    {
        if ($this->userModel->createUser()) {
            header("Location: /../views/kanban.php");
            exit;
        }

        header("Location: /../views/register.php/");
        exit;
    }

    public function put()
    {
    }

    public function delete()
    {
    }

    public function login()
    {
        if ($this->userLogin->loginUser()) {
            header("Location: /../views/kanban.php/");
            exit;
        }
        header("Location: /../");
        exit;
    }

    public function logout()
    {
        $this->userLogout->logoutUser();
    }
}

// Criar rotas -> Provavelmente criar um diretório para gerenciar as rotas
$route = explode("/", $_SERVER["REQUEST_URI"]);
$userData = isset($_POST) ? $_POST : null;
$userController = new UserController($userData);

if ($route[3] == 'login' && !empty($userData)) {
    $userController->login();
}

if ($route[3] == 'register' && !empty($userData)) {
    $userController->post();
}

if ($route[3] == 'logout') {
    $userController->logout();
}