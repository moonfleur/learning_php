<?php
require_once "config/functions.php";
//var_dump($_GET);
//var_dump($_POST);
//var_dump($_SERVER);

$errors = [];

if(isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
    setcookie('message', "", time());
}


$title = "Додавання нового користувача";
$page_view = "views/pages/add_user_view.php";
require 'views/layout/default.php';