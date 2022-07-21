<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
require_once __DIR__ . '/global.php';
require_once __DIR__ . '/validations.php';
require_once __DIR__ . '/../database/conection.php';

$validateFormRegister = new ValidationForm;
if ($validateFormRegister->validateFormRegister($_POST)) {
  $name     = $_POST['name'];
  $username = $_POST['username'];
  $email    = $_POST['email'];
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_DEFAULT);

  $database   = new Connection();
  $connection = $database->connect();

  $stmt = $connection->prepare('INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `name`, `is_admin`) VALUES (NULL, :username, :email, :password, :name, 0)');
  $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password, 'name' => $name]);

  if ($stmt) {
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    header("Location: ../views/kanban.php");
    exit;
  }

  header("Location: ../views/register.php?register=error");
  exit;
}
