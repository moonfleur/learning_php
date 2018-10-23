<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/functions.php';
if(!isset($_SESSION['this_user'])) header('Location: /');

$messages = [];
//$usernames = ["Zaya", "Козявка", "Какашка", "Какашіще", "ЗАКАШУЛЬКА"];
//
//
//include_once 'view1.php';
//require_once 'view.php';


//$query = "INSERT INTO users (user_name, email, password, role) VALUES('Zaya', 'Zayyyaaa@com.ua', md5('123'), 1);";
//$query = "INSERT INTO users (user_name, email, password, role) VALUES('Kakashka', 'Kakashka@com.ua', md5('123'), 1);";

$link = connectDB();

$query = "SELECT * FROM users;";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

//$count = mysqli_num_rows($result);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


disconnectDB($link);
//var_dump($users);

//for ($i = 0; $i < $count; $i++) {
//    $row = mysqli_fetch_assoc($result);
//    $users[] = $row;
//    var_dump($row);
//}

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

$title = "Користувачі";
$page_view = $_SERVER['DOCUMENT_ROOT'] . "/views/pages/users/list_view.php";
require $_SERVER['DOCUMENT_ROOT'] . '/views/layout/default.php';

