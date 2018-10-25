<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";
if(!(isset($_SESSION['this_user']) && $_SESSION['this_user']['role'] == 1)) header('Location: /');

$errors = [];

if(isset($_COOKIE['errors'])) {
    $errors = json_decode($_COOKIE['errors'], true);
    setcookie('errors', "", time());
}
if(isset($_COOKIE['messages'])) {
    $messages = json_decode($_COOKIE['messages'], true);
    setcookie('messages', "", time());
}
if(isset($_COOKIE['old_values'])) {
    $old_values = json_decode($_COOKIE['old_values'], true);
    setcookie('old_values', "", time());
}

$title = "Додавання нового користувача";
$page_view =  $_SERVER['DOCUMENT_ROOT'] . "/views/pages/users/add_user_view.php";
require  $_SERVER['DOCUMENT_ROOT'] . '/views/layout/default.php';