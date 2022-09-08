<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/Users.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/Kanbans.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';

$routes = explode("/", $_SERVER["REQUEST_URI"]);
$route  = $routes[1];
$data   = isset($_POST) ? $_POST : null;

if ($route == '') {
    include($_SERVER['DOCUMENT_ROOT'] . '/views/home.php');
}

if ($route == 'about') {
    include($_SERVER['DOCUMENT_ROOT'] . '/views/about.php');
}

if ($route == 'register') {
    include($_SERVER['DOCUMENT_ROOT'] . '/views/register.php');
}

if ($route == 'login') {
    include($_SERVER['DOCUMENT_ROOT'] . '/views/login.php');
}

if ($route == 'homeKanban' && (!empty($data) || (isset($_SESSION['stateLogin']) && $_SESSION['stateLogin'] == 'logged'))) {
    $usersController = new UsersController($data);
    $usersController->login();
}

if ($route == 'logout') {
    $usersController = new UsersController($data);
    $usersController->logout();
}

if ($route == 'register' && !empty($data)) {
    $usersController = new UsersController($data);
    $usersController->post();
}

if ($route == 'getUsers') {
    $usersController = new UsersController($data);
    $usersController->get();
}

if ($route == 'userPanel') {
    $usersController = new UsersController($data);
    $usersController->getOne();
}

if (str_contains($route, 'editUser')) {
    $usersController = new UsersController($data);
    $usersController->edit();
}

if (str_contains($route, 'updateUser') && !empty($data)) {
    $usersController = new UsersController($data);
    $usersController->put();
}

if (str_contains($route, 'deleteUser')) {
    $usersController = new UsersController($data);
    $usersController->delete();
}

if ($route == 'getBoards') {
    $kanbansController = new KanbansController($data);
    $kanbansController->get();
}

if (($route == 'createBoard' || $route == 'createTask') && !empty($data)) {
    $kanbansController = new KanbansController($data, $data);
    $kanbansController->post();
}

if (($route == 'updateBoard' || $route == 'updateTask') && !empty($data)) {
    $kanbansController = new KanbansController($data, $data);
    $kanbansController->put();
}

if ($route == 'deleteTask' && !empty($data)) {
    $kanbansController = new KanbansController($data, $data);
    $kanbansController->deleteTask();
}

if ($route == 'deleteBoard' && !empty($data)) {
    $kanbansController = new KanbansController($data, $data);
    $kanbansController->deleteBoard();
}
