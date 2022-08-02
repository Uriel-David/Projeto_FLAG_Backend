<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/conection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/interfaces/Board.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/validations.php';

class KanbanModel extends Connection
{
    private $board;
    private $validateForm;
    private $db;
    
    public function __construct($board = null)
    {
        if (empty($board)) {
            $board = [];
        }

        $this->db           = $this->connect();
        $this->board        = $board;
        $this->validateForm = new ValidationForm();
    }

    public function getBoards()
    {
        $stmt = $this->db->prepare("SELECT * FROM boards_kanban");
        $stmt->execute();
        $boards = $stmt->fetchAll();

        return $boards;
    }

    public function getBoard()
    {
        $stmt = $this->db->prepare("SELECT * FROM boards_kanban WHERE board_id = :board_id");
        $stmt->execute(['board_id' => $this->board['board_id']]);
        $board = $stmt->fetch();

        return $board;
    }

    public function createBoard()
    {
        if ($this->validateForm->validateFormBoardCreate($this->board)) {
            $boardData  = new Board($this->board);
            $board      = $boardData->getAllData();
            $userId     = $_SESSION['userId'];
            $dateNow    = date('Y-m-d h:m:s');
        
            $stmt = $this->db->prepare("INSERT INTO boards_kanban (board_id, user_id, title_board, category_board, createdAt) VALUES (NULL, :user_id, :title_board, :category_board, :createdAt)");
            $stmt->execute(['user_id' => $userId, 'title_board' => $board['title_board'], 'category_board' => $board['category_board'], 'createdAt' => $dateNow]);
        }
      
        return $this->db->lastInsertId();
    }

    public function editBoard()
    {
        if ($this->validateForm->validateFormBoardCreate($this->board)) {
            $boardData   = new Board($this->board);
            $board       = $boardData->getAllData();
            $userId      = $_SESSION['userId'];
        
            $stmt = $this->db->prepare("UPDATE boards_kanban SET title_board = :title_board, category_board = :category_board WHERE board_id = :board_id AND user_id = :user_id");
            $stmt->execute(['title_board' => $board['title_board'], 'category_board' => $board['category_board'], 'board_id' => $board['board_id'], 'user_id' => $userId]);
        }
      
        return $this->db->lastInsertId();
    }

    public function deleteBoard()
    {
        $connection = $this->connect();

        $stmt = $connection->prepare('DELETE FROM boards_kanban WHERE board_id = :board_id');
        $stmt->execute(['board_id' => $this->board['board_id']]);
        $board = $stmt->fetch();
        
        return $board;
    }
}
