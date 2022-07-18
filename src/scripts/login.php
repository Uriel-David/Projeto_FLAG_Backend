<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
require './global.php';
require '../database/conection.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

if (isset($_SESSION['email']) == $email) {
  $database   = new Connection();
  $connection = $database->connect();

  $stmt = $connection->prepare('SELECT * FROM users WHERE email = :email');
  $stmt->execute(array('email' => $email));

  for ($i = 0; $i < count($row = $stmt->fetchAll()); $i++) {
    print_r($row[$i]['password']);
  }
}

$database   = new Connection();
$connection = $database->connect();

$stmt = $connection->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute(array('email' => $email));

for ($i = 0; $i < count($row = $stmt->fetchAll()); $i++) {
  print_r($row[$i]['password']);
}
