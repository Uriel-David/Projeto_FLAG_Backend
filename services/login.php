<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/validations.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/conection.php';

class Login extends Connection
{
  private $validateFormLogin;
  private $user;
  private $db;

  public function __construct($user)
  {
    $this->db                = $this->connect();
    $this->user              = $user;
    $this->validateFormLogin = new ValidationForm(); 
  }

  public function loginUser()
  {
    if ($this->validateFormLogin->validateFormLogin($this->user)) {
      $userData = new User($this->user);
      $user     = $userData->getAllData();

      $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email');
      $stmt->execute(['email' => $user['email']]);
      $rows = $stmt->fetchAll();

      for ($i = 0; $i < count($rows); $i++) {
        if (password_verify($user['password'], $rows[$i]['password']) || $user['password'] == $rows[$i]['password']) {
          $_SESSION['userId']     = $rows[$i]['user_id'];
          $_SESSION['email']      = $user['email'];
          $_SESSION['stateLogin'] = 'logged';
          
          return true;
        }
      }
    }

    return false;
  }
}