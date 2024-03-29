<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/conection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/interfaces/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/validations.php';

class UserModel extends Connection
{
    private $user;
    private $validateForm;
    private $db;
    
    public function __construct($user = null)
    {
        if (empty($user)) {
            $user = [];
        }

        $this->db           = $this->connect();
        $this->user         = $user;
        $this->validateForm = new ValidationForm();
    }

    public function getUsers()
    {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll();

        return $users;
    }

    public function getUser($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $id]);
        $user = $stmt->fetch();

        return $user;
    }

    public function createUser()
    {   
        if ($this->validateForm->validateFormRegister($this->user)) {
            $userData   = new User($this->user);
            $user       = $userData->getAllData();
            $password   = password_hash($user['password'], PASSWORD_DEFAULT);
            $apiKey     = bin2hex(random_bytes(20));
            $dateNow    = date('Y-m-d h:m:s');

            $verifyEmail = $this->db->prepare("SELECT email FROM users WHERE email = :email");
            $verifyEmail->execute(['email' => $user['email']]);

            if (empty($verifyEmail->fetch())) {
                $stmt = $this->db->prepare("INSERT INTO users (user_id, username, email, password, name, api_key, is_admin, createdAt) VALUES (NULL, :username, :email, :password, :name, :api_key, :is_admin, :createdAt)");
                $stmt->execute(['username' => $user['username'], 'email' => $user['email'], 'password' => $password, 'name' => $user['name'], 'api_key' => $apiKey, 'is_admin' => $user['is_admin'], 'createdAt' => $dateNow]);
            
                if ($stmt) {
                    $_SESSION['userId']     = $this->db->lastInsertId();
                    $_SESSION['email']      = $user['email'];
                    $_SESSION['stateLogin'] = 'logged';
                }

                return $this->db->lastInsertId();
            } else {
                if (isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged') {
                    if ($_SESSION['isAdmin']) {
                        header('Location: /getUsers');
                    } else {
                        header('Location: /userPanel');
                    }
                } else {
                    header('Location: /register');
                }
            }
        } else {
            if (isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged') {
                if ($_SESSION['isAdmin']) {
                    header('Location: /getUsers');
                } else {
                    header('Location: /userPanel');
                }
            } else {
                header('Location: /register');
            }
        }
    }

    public function editUser()
    {
        if ($this->validateForm->validateFormRegister($this->user)) {
            $userData   = new User($this->user);
            $user       = $userData->getAllData();
            $verifyEmail = $this->db->prepare("SELECT email FROM users WHERE email = :email");
            $verifyEmail->execute(['email' => $user['email']]);

            if (empty($verifyEmail->fetch())) {
                if (!empty($user['password']) || $user['password'] != null) {
                    $password   = password_hash($user['password'], PASSWORD_DEFAULT);
    
                    $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email, password = :password, name = :name WHERE user_id = :user_id");
                    $stmt->execute(['username' => $user['username'], 'email' => $user['email'], 'password' => $password, 'name' => $user['name'], 'user_id' => $user['user_id']]);
    
                    if (!$_SESSION['isAdmin']) {
                        $_SESSION['username']   = $user['username'];
                        $_SESSION['email']      = $user['email'];
                    }
                }
    
                if (empty($user['password']) || $user['password'] == null) {
                    $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email, name = :name WHERE user_id = :user_id");
                    $stmt->execute(['username' => $user['username'], 'email' => $user['email'], 'name' => $user['name'], 'user_id' => $user['user_id']]);
    
                    if (!$_SESSION['isAdmin']) {
                        $_SESSION['username']   = $user['username'];
                        $_SESSION['email']      = $user['email'];
                    }
                }

                return $this->db->lastInsertId();
            } else {
                if (isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged') {
                    if ($_SESSION['isAdmin']) {
                        header('Location: /getUsers');
                    } else {
                        header('Location: /userPanel');
                    }
                } else {
                    header('Location: /register');
                }
            }
        } else {
            if (isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged') {
                if ($_SESSION['isAdmin']) {
                    header('Location: /getUsers');
                } else {
                    header('Location: /userPanel');
                }
            } else {
                header('Location: /register');
            }
        }
    }

    public function deleteUser($id)
    {
        $connection = $this->connect();

        $stmt = $connection->prepare('DELETE FROM users WHERE user_id = :user_id');
        $stmt->execute(['user_id' => $id]);
        $user = $stmt->fetch();
        
        return $user;
    }
}
