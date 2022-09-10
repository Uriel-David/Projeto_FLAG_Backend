<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Kanban.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Task.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';

class KanbansController extends Controller
{
    private $kanbanModel;
    private $taskModel;

    public function __construct($board = null, $task = null)
    {
        if (empty($board)) {
            $board = [];
        }

        if (empty($task)) {
            $task = [];
        }

        $this->kanbanModel  = new KanbanModel($board);
        $this->taskModel    = new TaskModel($task);
    }

    public function get()
    {
        $boards = $this->kanbanModel->getBoards();
        $tasks  = $this->taskModel->getTasks();
        include($_SERVER['DOCUMENT_ROOT'] . '/views/kanban.php');
    }

    public function post()
    {
        $this->kanbanModel->createBoard();
        $this->taskModel->createTask();
        $boards = $this->kanbanModel->getBoards();
        $tasks  = $this->taskModel->getTasks();
        include($_SERVER['DOCUMENT_ROOT'] . '/views/kanban.php');
    }

    public function put()
    {
        $this->kanbanModel->editBoard();
        $this->taskModel->editTask();
        $boards = $this->kanbanModel->getBoards();
        $tasks  = $this->taskModel->getTasks();
        include($_SERVER['DOCUMENT_ROOT'] . '/views/kanban.php');
    }

    public function deleteTask()
    {
        $this->taskModel->deleteTask();
        $boards = $this->kanbanModel->getBoards();
        $tasks  = $this->taskModel->getTasks();
        include($_SERVER['DOCUMENT_ROOT'] . '/views/kanban.php');
    }

    public function deleteBoard()
    {
        $this->kanbanModel->deleteBoard();
        $boards = $this->kanbanModel->getBoards();
        $tasks  = $this->taskModel->getTasks();
        include($_SERVER['DOCUMENT_ROOT'] . '/views/kanban.php');
    }
}
