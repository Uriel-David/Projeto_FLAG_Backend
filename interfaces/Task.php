<?php

class Task
{
    private $titleTask;
    private $descriptionTask;
    private $categoryTask;
    private $boardId;
    private $taskId;

    public function __construct($task)
    {
        $this->titleTask        = $task['title_task'] ?? null;
        $this->descriptionTask  = $task['description_task'] ?? null;
        $this->categoryTask     = $task['category_task'] ?? null;
        $this->boardId          = $task['board_id'] ?? null;
        $this->taskId           = $task['task_id'] ?? null;
    }

    public function getTitle()
    {
        return htmlspecialchars($this->titleTask);
    }

    public function getDescription()
    {
        return htmlspecialchars($this->descriptionTask);
    }

    public function getCategory()
    {
        return htmlspecialchars($this->categoryTask);
    }

    public function getBoardId() {
        return htmlspecialchars($this->boardId);
    }

    public function getId()
    {
        return htmlspecialchars($this->taskId);
    }

    public function getAllData()
    {
        return [
            'board_id'          => htmlspecialchars($this->boardId),
            'task_title'        => htmlspecialchars($this->titleTask),
            'task_description'  => htmlspecialchars($this->descriptionTask),
            'task_category'     => htmlspecialchars($this->categoryTask),
            'task_id'           => htmlspecialchars($this->taskId),
        ];
    }
}