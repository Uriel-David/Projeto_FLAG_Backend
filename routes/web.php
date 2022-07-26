<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/Users.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';

$routes = explode("/", $_SERVER["REQUEST_URI"]);
$route = $routes[3];
$userData = isset($_POST) ? $_POST : null;
$userController = new UserController($userData);

if ($route == 'login' && !empty($userData)) {
    $userController->login();
}

if ($route == 'register' && !empty($userData)) {
    $userController->post();
}

if ($route == 'logout') {
    $userController->logout();
}
