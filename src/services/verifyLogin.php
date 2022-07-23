<?php
require __DIR__ . '/global.php';
require __DIR__ . '/../database/conection.php';

$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$password = isset($_SESSION['password']) ? $_SESSION['password'] : null;

if (!empty($email)) {
  $database   = new Connection();
  $connection = $database->connect();

  $stmt = $connection->prepare('SELECT * FROM users WHERE email = :email');
  $stmt->execute(['email' => $email]);

  for ($i = 0; $i < count($row = $stmt->fetchAll()); $i++) {
    if ($email == $row[$i]['email']) {
      header("Location: ../src/views/kanban.php");
      exit;
    }
  }
}
