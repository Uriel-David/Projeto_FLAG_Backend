<?php

class Board
{
    private $titleBoard;
    private $categoryBoard;
    private $boardId;

    public function __construct($board)
    {
        $this->titleBoard      = $board['title_board'] ?? null;
        $this->categoryBoard   = $board['category_board'] ?? null;
        $this->boardId         = $board['board_id'] ?? null;
    }

    public function getTitle()
    {
        return htmlspecialchars($this->titleBoard);
    }

    public function getCategory()
    {
        return htmlspecialchars($this->categoryBoard);
    }

    public function getId()
    {
        return htmlspecialchars($this->boardId);
    }

    public function getAllData()
    {
        return [
            'title_board'       => htmlspecialchars($this->titleBoard),
            'category_board'    => htmlspecialchars($this->categoryBoard),
            'board_id'          => htmlspecialchars($this->boardId),
        ];
    }
}