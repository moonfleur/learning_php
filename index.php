<?php

//$usernames = ["Zaya", "Козявка", "Какашка", "Какашіще", "ЗАКАШУЛЬКА"];
//
//
//include_once 'view1.php';
//require_once 'view.php';
$db_config = [];

$db_config['server'] = 'localhost';
$db_config['user'] = 'root';
$db_config['password'] = '';
$db_config['db_name'] = 'blog';

$link = mysqli_connect($db_config['server'], $db_config['user'], $db_config['password'], $db_config['db_name']) or die("Ошибка " . mysqli_error($link));

//$query = "INSERT INTO users (user_name, email, password, role) VALUES('Zaya', 'Zayyyaaa@com.ua', md5('123'), 1);";
//$query = "INSERT INTO users (user_name, email, password, role) VALUES('Kakashka', 'Kakashka@com.ua', md5('123'), 1);";

$query = "SELECT * FROM users;";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

//$count = mysqli_num_rows($result);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

//var_dump($users);

//for ($i = 0; $i < $count; $i++) {
//    $row = mysqli_fetch_assoc($result);
//    $users[] = $row;
//    var_dump($row);
//}

mysqli_close($link);

require 'view.php';

