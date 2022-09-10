<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';

class Controller {
    public function error() {
        include($_SERVER['DOCUMENT_ROOT'] . '/views/error.php');
    }
}