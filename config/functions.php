<?php
require_once 'database.php';

function connectDB() {
    $db_config = getDBConfig();
    $link = mysqli_connect($db_config['server'], $db_config['user'], $db_config['password'], $db_config['db_name']) or die("Ошибка " . mysqli_error($link));
    return $link;
}

function disconnectDB($link) {
    mysqli_close($link);
}
