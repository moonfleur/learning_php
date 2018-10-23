<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/config/functions.php";
if(!isset($_SESSION['this_user'])) header('Location: /');

unset($_SESSION['this_user']);

header('Location: /');