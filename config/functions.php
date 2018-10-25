<?php
require_once 'database.php';

autoload();

function connectDB() {
    $db_config = getDBConfig();
    $link = mysqli_connect($db_config['server'], $db_config['user'], $db_config['password'], $db_config['db_name']) or die("Ошибка " . mysqli_error($link));
    return $link;
}

function disconnectDB($link) {
    mysqli_close($link);
}


function checkUser() {
    if (isset($_SESSION['this_user'])) {
        $user_id = $_SESSION['this_user']['id'];
        $password = $_SESSION['this_user']['password'];

        $link = connectDB();

        $query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1;";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

        $user = mysqli_fetch_assoc($result);

        if($user != null) {
            if($password != $user['password']) {
                unset($_SESSION['this_user']);
                header('Location: /');
            } else {
                $_SESSION['this_user'] = $user;
            }
        }
    }
}

function autoload() {
    session_start();
    checkUser();
}
