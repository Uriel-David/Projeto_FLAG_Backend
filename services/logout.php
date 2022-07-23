<?php
require __DIR__ . '/global.php';

class Logout
{
  public function __construct()
  {
  }
  
  public function logoutUser()
  {
    if (session_status() === PHP_SESSION_ACTIVE) {
      unset($_SESSION['email']);
      unset($_SESSION['stateLogin']);
      session_destroy();
    
      header('Location: /../');
      exit;
    }    
  }
}
