<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";
$messages = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
    if(isset($_POST['user_id']) && !empty($_POST['user_id'])){
        $user_id = $_POST['user_id'];
    } else {
        $errors['user_id'] = 'Не вказано id користувача!';
    }

    if(!
        (
            isset($_SESSION['this_user'])
            && ($_SESSION['this_user']['role'] == 1 || $_SESSION['this_user']['id'] == $user_id)

        )
    ) header('Location: /users');

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
    }

    if(isset($_POST['role']) && !empty($_POST['role']) && $_POST['role'] != 0){
        $role = $_POST['role'];
    } else {
        $errors['role_field'] = 'Поле "Роль" не заповнене!';
    }

    if(empty($errors)) {
        $link = connectDB();
        if(isset($password)) {
            $query = "UPDATE users SET user_name = '$login', email = '$email', role = '$role', password = md5('$password') WHERE id = '$user_id';";
        } else {
            $query = "UPDATE users SET user_name = '$login', email = '$email', role = '$role' WHERE id = '$user_id';";
        }

        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        disconnectDB($link);

        if($result) {
            if(isset($password) && $_SESSION['this_user']['id'] == $user_id) {
                $_SESSION['this_user']['password'] = md5($password);
            }
            $messages[] = [
                'status' => 'success',
                'text' => 'Дані користувача успішно оновлені!'
            ];
        } else {
            $messages[] = [
                'status' => 'error',
                'text' => 'ані користувача не оновлені!'
            ];
        }
    } else {
        $messages[] = [
            'status' => 'error',
            'text' => 'Виправте помилки!'
        ];

        setcookie('errors', json_encode($errors));
    }

    setcookie('messages', json_encode($messages));

    header("Location: /users/editUser.php?id=$user_id");
} else {
    $messages[] = [
        'status' => 'error',
        'text' => 'На сторінку updateUser.php не можна зайти методом GET!'
    ];
    setcookie('messages', json_encode($messages));
    header('Location: /users');
}
