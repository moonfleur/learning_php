<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/config/functions.php";

$user_id = $_GET['id'];

$link = connectDB();

$query = "SELECT * FROM users WHERE id = $user_id;";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

//$count = mysqli_num_rows($result);
$user_data = mysqli_fetch_assoc($result);
disconnectDB($link);

if(isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
    setcookie('message', "", time());
}

$title = "Редагування користувача";
$page_view =  $_SERVER['DOCUMENT_ROOT'] . "/views/pages/edit_user_view.php";
require $_SERVER['DOCUMENT_ROOT'] . '/views/layout/default.php';