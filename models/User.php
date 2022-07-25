<?php
require_once __DIR__ . '/../database/conection.php';
require_once __DIR__ . '/../interfaces/User.php';
require_once __DIR__ . '/../services/global.php';
require_once __DIR__ . '/../services/validations.php';

class UserModel
{
    private $user;
    private $validateForm;
    
    public function __construct($user = null)
    {
        $this->user         = $user;
        $this->validateForm = new ValidationForm();
    }

    public function getUsers()
    {
        $database   = new Connection();
        $connection = $database->connect();

        $stmt = $connection->prepare('SELECT * FROM users');
        $stmt->execute();
        $users = $stmt->fetchAll();

        if ($users > 0) {
            $database->closeConnection();
            return $users;
        }

        return 'Unable to find users in the database.';
    }

    public function getUser($id)
    {
        $database   = new Connection();
        $connection = $database->connect();

        $stmt = $connection->prepare('SELECT * FROM `users` WHERE `user_id` = :id');
        $stmt->execute(['user_id' => $id]);
        $user = $stmt->fetch();

        if ($user > 0) {
            $database->closeConnection();
            return $user;
        }

        return 'Unable to find user in the database.';
    }

    public function createUser()
    {   
        if ($this->validateForm->validateFormRegister($this->user)) {
            $userData   = new User($this->user);
            $user       = $userData->getAllData();
            $password   = password_hash($user['password'], PASSWORD_DEFAULT);
            $apiKey     = bin2hex(random_bytes(20));
            $dateNow    = date('Y-m-d h:m:s');
        
            $database   = new Connection();
            $connection = $database->connect();
        
            $stmt = $connection->prepare('INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `name`, `api_key`, `createdAt`) VALUES (NULL, :username, :email, :password, :name, :api_key, :createdAt)');
            $stmt->execute(['username' => $user['username'], 'email' => $user['email'], 'password' => $password, 'name' => $user['name'], 'api_key' => $apiKey, 'createdAt' => $dateNow]);
        
            if ($stmt) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['stateLogin'] = 'logged';
                $database->closeConnection();
                
                return true;
            }
        }
      
        return false;
    }

    public function editUser($id)
    {
        if ($this->validateForm->validateFormRegister($this->user)) {
            $userData   = new User($this->user);
            $user       = $userData->getAllData();
            $password   = password_hash($user['password'], PASSWORD_DEFAULT);
        
            $database   = new Connection();
            $connection = $database->connect();
        
            $stmt = $connection->prepare('UPDATE `users` SET `username` = :username, `email` = :email, `password` = :password, `name` = :name WHERE `user_id` = :id');
            $stmt->execute(['username' => $user['username'], 'email' => $user['email'], 'password' => $password, 'name' => $user['name'], 'user_id' => $id]);
        
            if ($stmt) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['stateLogin'] = 'logged';
                $database->closeConnection();
                
                return true;
            }
        }
      
        return false;
    }

    public function deleteUser($id)
    {
        $database   = new Connection();
        $connection = $database->connect();

        $stmt = $connection->prepare('DELETE FROM `users` WHERE `user_id` = :id');
        $stmt->execute(['user_id' => $id]);
        $user = $stmt->fetch();

        if ($user > 0) {
            $database->closeConnection();
            return 'User with id deleted: ' . $id;
        }

        return 'Unable to delete user in the database.';
    }
}
