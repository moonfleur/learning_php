<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/functions.php';
$messages = [];
$old_values = [];
$errors = [];


if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {

    if(isset($_POST['login']) && !empty($_POST['login'])){
        $login = $_POST['login'];
        $old_values['login'] = $login;
    } else {
        $errors['login_field'] = 'Поле "Логін" не заповнене!';
    }

    if(
        isset($_POST['email']) && !empty($_POST['email'])
        && strstr($_POST['email'], '@') && strstr($_POST['email'], '.')
    ){
        $email = $_POST['email'];
        $old_values['email'] = $email;
    } else {
        $errors['email_field'] = 'Поле "Email" неправильно заповнене!';
    }

    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
    } else {
        $errors['password_field'] = 'Поле "Пароль" не заповнене!';
    }

    if(!(isset($_POST['password_confirm']) && isset($_POST['password']) && $_POST['password'] == $_POST['password_confirm'])) {
        $errors['password_confirm'] = 'Паролі не співпадають!';
    }

    $role = 3;

    if(empty($errors)) {
        $link = connectDB();
        $query = "INSERT INTO users (user_name, email, password, role) VALUES('$login', '$email', md5('$password'), '$role');";

        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        disconnectDB($link);

        if($result) {
            $messages[] = [
                'status' => 'success',
                'message' => 'Реєстрація пройшла успішно!'
            ];
        } else {
            $messages[] = [
                'status' => 'error',
                'message' => 'Сталась помилка. Спробуйте пізніше!'
            ];
        }
    } else {
        $messages[] = [
            'status' => 'error',
            'message' => 'Виправте помилки!'
        ];

        setcookie('errors', json_encode($errors));
        setcookie('old_values', json_encode($old_values));
    }

    setcookie('messages', json_encode($messages));

    header('Location: /users/registration.php');
}

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

$title = "Реєстрація нового користувача";
$page_view = $_SERVER['DOCUMENT_ROOT'] . "/views/pages/users/registration_view.php";
require $_SERVER['DOCUMENT_ROOT'] . '/views/layout/default.php';