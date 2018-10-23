<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";
if(!(isset($_SESSION['this_user']) && $_SESSION['this_user']['role'] == 1)) header('Location: /');

$messages = [];

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $link = connectDB();

    $query = "DELETE FROM users WHERE id = $id;";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    disconnectDB($link);

    if($result) {
        $messages[] = [
            'status' => 'success',
            'text' => 'Користувач успішно видалений!'
        ];
    } else {
        $messages[] = [
            'status' => 'error',
            'text' => 'Користувач не видалений!'
        ];
    }
    setcookie('messages', json_encode($messages));
}

header("Location: /users");