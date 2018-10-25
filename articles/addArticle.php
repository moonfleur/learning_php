<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['this_user']['id'];

    $link = connectDB();

    $query = "INSERT INTO articles (title, content, user_id) VALUES('$title', '$content', '$user_id');";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    disconnectDB($link);

    header('Location: /articles/addArticle.php');
}

$title = "Додавання нової статті";
$page_view =  $_SERVER['DOCUMENT_ROOT'] . "/views/pages/articles/add_article_view.php";
require  $_SERVER['DOCUMENT_ROOT'] . '/views/layout/default.php';
