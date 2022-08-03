<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/conection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Kanban.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Task.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/login.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/logout.php';

class UsersController
{
    private $userModel;
    private $kanbanModel;
    private $taskModel;
    private $userLogin;
    private $userLogout;

    public function __construct($user = null)
    {
        if (empty($user)) {
            $user = [];
        }

        $this->userModel    = new UserModel($user);
        $this->userLogin    = new Login($user);
        $this->userLogout   = new Logout();
        $this->kanbanModel  = new KanbanModel();
        $this->taskModel    = new TaskModel();
    }

    public function get()
    {
        $users = $this->userModel->getUsers();
        include($_SERVER['DOCUMENT_ROOT'] . '/views/panelAdmin.php');
    }

    public function post()
    {
        if ($this->userModel->createUser()) {
            include($_SERVER['DOCUMENT_ROOT'] . '/views/kanban.php');
        } else {
            include($_SERVER['DOCUMENT_ROOT'] . '/views/register.php');
        }
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
            $user = $this->userModel->getUser($_SESSION['userId']);
            
            if ($user['is_admin']) {
                include($_SERVER['DOCUMENT_ROOT'] . '/views/panelAdmin.php');
            } else {
                $boards = $this->kanbanModel->getBoards();
                $tasks  = $this->taskModel->getTasks();
                include($_SERVER['DOCUMENT_ROOT'] . '/views/kanban.php');
            }
        } else {
            include($_SERVER['DOCUMENT_ROOT'] . '/views/login.php');
        }
    }

    public function logout()
    {
        $this->userLogout->logoutUser();
        include($_SERVER['DOCUMENT_ROOT'] . '/index.php');
    }
}
