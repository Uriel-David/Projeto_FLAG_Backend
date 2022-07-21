<?php
require __DIR__ . '/global.php';

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  session_destroy();

  header('Location: ../index.php');
  exit;
}
