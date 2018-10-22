<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/functions.php';
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

if(isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
    setcookie('message', "", time());
}

$title = "Користувачі";
$page_view = $_SERVER['DOCUMENT_ROOT'] . "/views/pages/home_view.php";
require $_SERVER['DOCUMENT_ROOT'] . '/views/layout/default.php';

