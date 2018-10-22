<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $link = connectDB();

    $query = "DELETE FROM users WHERE id = $id;";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    disconnectDB($link);

    if($result) {
        setcookie('message', 'Користувач успішно видалений!');
    } else {
        setcookie('message', 'Користувач не видалений!');
    }
}

header("Location: /users");