<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";
if(!isset($_SESSION['this_user']) || ($_SESSION['this_user']['role'] != 1 && $_SESSION['this_user']['role'] != 2)) header('Location: /');

$messages = [];
$old_values = [];
$errors = [];


if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
//    $title = $_POST['title'];
//    $content = $_POST['content'];
    $user_id = $_SESSION['this_user']['id'];


    if(isset($_POST['title']) && !empty($_POST['title'])){
        $title = $_POST['title'];
        $old_values['title'] = $title;
    } else {
        $errors['title_field'] = 'Назва статті не введена!';
    }

    if(isset($_POST['content']) && !empty($_POST['content'])){
        $content = $_POST['content'];
        $old_values['content'] = $content;
    } else {
        $errors['content_field'] = 'Текст статті не заповнений!';
    }

    if(empty($errors)) {
        $link = connectDB();

        $query = "INSERT INTO articles (title, content, user_id) VALUES('$title', '$content', '$user_id');";

        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        disconnectDB($link);

        if($result) {
            $messages[] = [
                'status' => 'success',
                'text' => 'Стаття успішно додана!'
            ];
        } else {
            $messages[] = [
                'status' => 'error',
                'text' => 'Заповніть поля!'
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
    header('Location: /articles/addArticle.php');
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

$title = "Додавання нової статті";
$page_view =  $_SERVER['DOCUMENT_ROOT'] . "/views/pages/articles/add_article_view.php";
require  $_SERVER['DOCUMENT_ROOT'] . '/views/layout/default.php';
