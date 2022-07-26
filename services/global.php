<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'] . '/');
$dotenv->safeLoad();
