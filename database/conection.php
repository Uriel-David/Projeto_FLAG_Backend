<?php
require __DIR__ . '/../services/global.php';

class Connection
{
  private $db;
  private $host;
  private $dbName;
  private $dbUser;
  private $dbPass;
  private $connection;

  public function __construct()
  {
    $this->db     = $_ENV['DB'];
    $this->host   = $_ENV['DB_HOST'];
    $this->dbName = $_ENV['DB_NAME'];
    $this->dbUser = $_ENV['DB_USER'];
    $this->dbPass = $_ENV['DB_PASS'];
  }

  public function connect()
  {
    try {
      $this->connection = new PDO($this->db . ':host=' . $this->host . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPass);
      $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $error) {
      echo 'ERROR: ' . $error->getMessage();
    }

    return $this->connection;
  }

  public function closeConnection()
  {
    $this->connection = null;
  }
}
