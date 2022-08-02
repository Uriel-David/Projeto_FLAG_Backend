<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/conection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/interfaces/Task.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/validations.php';

class TaskModel extends Connection
{
    private $task;
    private $validateForm;
    private $db;
    
    public function __construct($task = null)
    {
        if (empty($task)) {
            $task = [];
        }

        $this->db           = $this->connect();
        $this->task         = $task;
        $this->validateForm = new ValidationForm();
    }

    public function getTasks()
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks_kanban");
        $stmt->execute();
        $tasks = $stmt->fetchAll();

        return $tasks;
    }

    public function getTask() {
        $stmt = $this->db->prepare("SELECT * FROM tasks_kanban WHERE task_id = :task_id");
        $stmt->execute(['task_id' => $this->task['task_id']]);
        $task = $stmt->fetch();

        return $task;
    }

    public function createTask() {
        if ($this->validateForm->validateFormTaskCreate($this->task)) {
            $taskData   = new Task($this->task);
            $task       = $taskData->getAllData();
            $dateNow    = date('Y-m-d h:m:s');
        
            $stmt = $this->db->prepare("INSERT INTO tasks_kanban (task_id, board_id, task_title, task_description, task_category, createdAt) VALUES (NULL, :board_id, :task_title, :task_description, :task_category, :createdAt)");
            
            $stmt->execute(['board_id' => $task['board_id'], 'task_title' => $task['task_title'], 'task_description' => $task['task_description'], 'task_category' => $task['task_category'], 'createdAt' => $dateNow]);
        }
      
        return $this->db->lastInsertId();
    }

    public function editTask()
    {
        if ($this->validateForm->validateFormTaskCreate($this->task)) {
            $taskData   = new Task($this->task);
            $task       = $taskData->getAllData();
        
            $stmt = $this->db->prepare("UPDATE tasks_kanban SET task_title = :task_title, task_description = :task_description, task_category = :task_category WHERE task_id = :task_id AND board_id = :board_id");
            
            $stmt->execute(['task_title' => $task['task_title'], 'task_description' => $task['task_description'], 'task_category' => $task['task_category'], 'task_id' => $task['task_id'], 'board_id' => $task['board_id']]);
        }
      
        return $this->db->lastInsertId();
    }

    public function deleteTask()
    {
        $connection = $this->connect();

        $stmt = $connection->prepare('DELETE FROM tasks_kanban WHERE task_id = :task_id');
        $stmt->execute(['task_id' => $this->task['task_id']]);
        $task = $stmt->fetch();
        
        return $task;
    }
}
