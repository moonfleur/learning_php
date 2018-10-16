<?php

function getDBConfig() {
    $db_config = [];

    $db_config['server'] = 'localhost';
    $db_config['user'] = 'root';
    $db_config['password'] = '';
    $db_config['db_name'] = 'blog';

    return $db_config;
}