<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
require_once __DIR__ . '/global.php';
require_once __DIR__ . '/validations.php';
require_once __DIR__ . '/../database/conection.php';

$validateFormLogin = new ValidationForm;
if ($validateFormLogin->validateFormLogin($_POST)) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $database   = new Connection();
  $connection = $database->connect();

  $stmt = $connection->prepare('SELECT * FROM users WHERE email = :email');
  $stmt->execute(['email' => $email]);

  for ($i = 0; $i < count($row = $stmt->fetchAll()); $i++) {
    if (password_verify($password, $row[$i]['password'])) {
      $_SESSION['email'] = $email;
      $_SESSION['stateLogin'] = 'logged';
      header("Location: ../views/kanban.php");
      exit;
    }
  }

  header("Location: ../index.php?login=error");
  exit;
}
