<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";
//var_dump($_GET);
//var_dump($_POST);
//var_dump($_SERVER);

$errors = [];

if(isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
    setcookie('message', "", time());
}


$title = "Додавання нового користувача";
$page_view =  $_SERVER['DOCUMENT_ROOT'] . "/views/pages/users/add_user_view.php";
require  $_SERVER['DOCUMENT_ROOT'] . '/views/layout/default.php';