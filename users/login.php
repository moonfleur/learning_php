<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";
if(isset($_SESSION['this_user'])) header('Location: /');

$messages = [];
$old_values = [];
$errors = [];



if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {

    if(isset($_POST['login']) && !empty($_POST['login'])){
        $login = $_POST['login'];
        $old_values['login'] = $login;
    } else {
        $errors['login_field'] = 'Поле "Логін" не заповнене!';
    }

    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
    } else {
        $errors['password_field'] = 'Поле "Пароль" не заповнене!';
    }

    if(empty($errors)) {
        $link = connectDB();

        $query = "SELECT * FROM users WHERE user_name = '$login' LIMIT 1;";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

        $user = mysqli_fetch_assoc($result);

        if($user != null && md5($password) == $user['password']) {
            $_SESSION['this_user'] = $user;
        } else {
            $messages[] = [
                'status' => 'error',
                'text' => 'Неправильний логін або пароль!'
            ];
        }

        disconnectDB($link);
    } else {
        $messages[] = [
            'status' => 'error',
            'text' => 'Виправте помилки!'
        ];
    }

    if(isset($_SESSION['this_user'])) {
        header('Location: /');
    } else {
        setcookie('errors', json_encode($errors));
        setcookie('old_values', json_encode($old_values));
        setcookie('messages', json_encode($messages));

        header('Location: /users/login.php');
    }
}


// GET
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

$title = "Вхід";
$page_view = $_SERVER['DOCUMENT_ROOT'] . "/views/pages/users/login_view.php";
require $_SERVER['DOCUMENT_ROOT'] . '/views/layout/default.php';