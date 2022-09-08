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
        $this->titleTask        = htmlspecialchars($task['title_task']) ?? null;
        $this->descriptionTask  = htmlspecialchars($task['description_task']) ?? null;
        $this->categoryTask     = htmlspecialchars($task['category_task']) ?? null;
        $this->boardId          = htmlspecialchars($task['board_id']) ?? null;
        $this->taskId           = htmlspecialchars($task['task_id']) ?? null;
    }

    public function getTitle()
    {
        return $this->titleTask;
    }

    public function getDescription()
    {
        return $this->descriptionTask;
    }

    public function getCategory()
    {
        return $this->categoryTask;
    }

    public function getBoardId() {
        return $this->boardId;
    }

    public function getId()
    {
        return $this->taskId;
    }

    public function getAllData()
    {
        $task = [
            'board_id'          => $this->boardId,
            'task_title'        => $this->titleTask,
            'task_description'  => $this->descriptionTask,
            'task_category'     => $this->categoryTask,
            'task_id'           => $this->taskId,
        ];

        return $task;
    }
}