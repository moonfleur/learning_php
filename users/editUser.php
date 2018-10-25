<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/config/functions.php";
$user_id = $_GET['id'];

if(!
    (
        isset($_SESSION['this_user'])
        && ($_SESSION['this_user']['role'] == 1 || $_SESSION['this_user']['id'] == $user_id)

    )
) header('Location: /users');

$messages = [];

$link = connectDB();

$query = "SELECT * FROM users WHERE id = $user_id;";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

//$count = mysqli_num_rows($result);
$user_data = mysqli_fetch_assoc($result);
disconnectDB($link);

if(isset($_COOKIE['errors'])) {
    $errors = json_decode($_COOKIE['errors'], true);
    setcookie('errors', "", time());
}
if(isset($_COOKIE['messages'])) {
    $messages = json_decode($_COOKIE['messages'], true);
    setcookie('messages', "", time());
}

$title = "Редагування користувача";
$page_view =  $_SERVER['DOCUMENT_ROOT'] . "/views/pages/users/edit_user_view.php";
require $_SERVER['DOCUMENT_ROOT'] . '/views/layout/default.php';