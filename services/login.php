<?php
require_once __DIR__ . '/global.php';
require_once __DIR__ . '/validations.php';
require_once __DIR__ . '/../database/conection.php';

class Login
{
  private $validateFormLogin;
  private $user;

  public function __construct($user)
  {
    $this->user                 = $user;
    $this->validateFormLogin = new ValidationForm(); 
  }

  public function loginUser()
  {
    if ($this->validateFormLogin->validateFormLogin($this->user)) {
      $userData = new User($this->user);
      $user     = $userData->getAllData();
  
      $database   = new Connection();
      $connection = $database->connect();

      $stmt = $connection->prepare('SELECT * FROM users WHERE email = :email');
      $stmt->execute(['email' => $user['email']]);

      for ($i = 0; $i < count($row = $stmt->fetchAll()); $i++) {
        if (password_verify($user['password'], $row[$i]['password'])) {
          $_SESSION['userId']     = $row[$i]['user_id'];
          $_SESSION['email']      = $user['email'];
          $_SESSION['stateLogin'] = 'logged';
          
          return true;
        }
      }
    }

    return false;
  }
}

$validateFormLogin = new ValidationForm;
if ($validateFormLogin->validateFormLogin($_POST)) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  
}
