<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {

    if(isset($_POST['login']) && !empty($_POST['login'])){
        $login = $_POST['login'];
    } else {
        $errors['login_field'] = 'Поле "Логін" не заповнене!';
    }

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
    } else {
        $errors['email_field'] = 'Поле "Email" не заповнене!';
    }

    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
    } else {
        $errors['password_field'] = 'Поле "Пароль" не заповнене!';
    }

    if(isset($_POST['role']) && !empty($_POST['role']) && $_POST['role'] != 0){
        $role = $_POST['role'];
    } else {
        $errors['role_field'] = 'Поле "Роль" не заповнене!';
    }

    if(empty($errors)) {
        $link = connectDB();
        $query = "INSERT INTO users (user_name, email, password, role) VALUES('$login', '$email', md5($password), '$role');";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        disconnectDB($link);

        if($result) {
            setcookie('message', 'Користувач успішно доданий!');
        } else {
            setcookie('message', 'Користувач не доданий!');
        }
    }

    header('Location: /users/addUser.php');
} else {
    setcookie('message', 'На сторінку saveUser.php не можна зайти методом GET!');
    header('Location: /users');
}
