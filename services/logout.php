<?php
require $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';

class Logout
{ 
  public function logoutUser()
  {
    if (session_status() === PHP_SESSION_ACTIVE) {
      unset($_SESSION['userId']);
      unset($_SESSION['email']);
      unset($_SESSION['stateLogin']);
      session_destroy();
    }    
  }
}
