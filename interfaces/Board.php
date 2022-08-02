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
        return $this->titleBoard;
    }

    public function getCategory()
    {
        return $this->categoryBoard;
    }

    public function getId()
    {
        return $this->boardId;
    }

    public function getAllData()
    {
        $board = [
            'title_board'       => $this->titleBoard,
            'category_board'    => $this->categoryBoard,
            'board_id'          => $this->board,
        ];

        return $board;
    }
}