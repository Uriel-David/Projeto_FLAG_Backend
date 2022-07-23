<?php
require __DIR__ . '/global.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  session_destroy();

  header('Location: ../index.php');
  exit;
}
