<?php
require_once __DIR__ . '/global.php';
require_once __DIR__ . '/validations.php';
require_once __DIR__ . '/../database/conection.php';
require_once __DIR__ . '/../interfaces/User.php';

class Register {
  private $validateFormRegister;
  private $user;

  public function __construct($user)
  {
    $this->user                 = $user;
    $this->validateFormRegister = new ValidationForm(); 
  }

  
  public function registerUser()
  {
    if ($this->validateFormRegister->validateFormRegister($this->user)) {
      $userData = new User($this->user);
      $user     = $userData->getAllData();
      $password = password_hash($user['password'], PASSWORD_DEFAULT);
  
      $database   = new Connection();
      $connection = $database->connect();
  
      $stmt = $connection->prepare('INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `name`) VALUES (NULL, :username, :email, :password, :name)');
      $stmt->execute(['username' => $user['username'], 'email' => $user['email'], 'password' => $password, 'name' => $user['name']]);
  
      if ($stmt) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['stateLogin'] = 'logged';
        $database->closeConnection();
        
        return true;
      }
    }

    return false;
  }
}