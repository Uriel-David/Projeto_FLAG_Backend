<?php
require $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
require $_SERVER['DOCUMENT_ROOT'] . '/database/conection.php';

$email    = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$password = isset($_SESSION['password']) ? $_SESSION['password'] : null;
$isLogged = isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged' ? $_SESSION['stateLogin'] : null;

if (!empty($email) && $isLogged === 'logged') {
  $database   = new Connection();
  $connection = $database->connect();

  $stmt = $connection->prepare('SELECT * FROM users WHERE email = :email');
  $stmt->execute(['email' => $email]);

  for ($i = 0; $i < count($row = $stmt->fetchAll()); $i++) {
    if ($email == $row[$i]['email']) {
      header("Location: /views/kanban.php");
      exit;
    }
  }
}
