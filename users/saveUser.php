<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";
if(!(isset($_SESSION['this_user']) && $_SESSION['this_user']['role'] == 1)) header('Location: /');

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
        $errors['email_field'] = 'Поле "Email" не заповнене!';
    }

    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
    } else {
        $errors['password_field'] = 'Поле "Пароль" не заповнене!';
    }

    if(isset($_POST['role']) && !empty($_POST['role']) && $_POST['role'] != 0){
        $role = $_POST['role'];
        $old_values['role'] = $role;
    } else {
        $errors['role_field'] = 'Поле "Роль" не заповнене!';
    }

    if(empty($errors)) {
        $link = connectDB();
        $query = "INSERT INTO users (user_name, email, password, role) VALUES('$login', '$email', md5('$password'), '$role');";

        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        disconnectDB($link);

        if($result) {
            $messages[] = [
                'status' => 'success',
                'text' => 'Користувач успішно доданий!'
            ];
        } else {
            $messages[] = [
                'status' => 'error',
                'text' => 'Сталась помилка. Спробуйте пізніше!'
            ];
        }
    } else {
        $messages[] = [
            'status' => 'error',
            'text' => 'Виправте помилки!'
        ];

        setcookie('errors', json_encode($errors));
        setcookie('old_values', json_encode($old_values));
    }

    setcookie('messages', json_encode($messages));

    header('Location: /users/addUser.php');
} else {
    $messages[] = [
        'status' => 'error',
        'text' => 'На сторінку saveUser.php не можна зайти методом GET!'
    ];
    setcookie('messages', json_encode($messages));
    header('Location: /users');
}
