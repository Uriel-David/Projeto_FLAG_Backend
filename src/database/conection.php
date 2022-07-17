<?php

namespace Database\ConectionMySQL;

class ConnectionMySQL {
  private $db;
  private $user;
  private $password;
  private $connection;

  public function __construct($db = 'mysql:host=localhost;dbname=kanban_app', $user = 'root', $password = '')
  {
    $this->db = $db;
    $this->user = $user;
    $this->password = $password;
  }

  public function connect()
  {
    $this->connection = new PDO($this->db, $this->user, $this->password);
    
    if ($this->connection->connect_error) {
      die("Failed connect with database: " . $this->connection->connect_error);
    }

    return $this->connection;
  }

  public function closeConnection()
  {
    $this->connection->close();
  }
}