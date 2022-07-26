<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';

class Connection
{
  public function connect()
  {
    $db     = $_ENV['DB'];
    $host   = $_ENV['DB_HOST'];
    $dbName = $_ENV['DB_NAME'];
    $dbUser = $_ENV['DB_USER'];
    $dbPass = $_ENV['DB_PASS'];

    try {
      $connection = new PDO($db . ':host=' . $host . ';dbname=' . $dbName, $dbUser, $dbPass);
      $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $error) {
      echo 'ERROR: ' . $error->getMessage();
    }

    return $connection;
  }
}
