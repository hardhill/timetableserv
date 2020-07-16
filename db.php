<?php

//Ключ защиты
if(!defined('REG_KEY'))
{
    header("HTTP/1.1 404 Not Found");
    //exit(file_get_contents('./404.html'));
    die();
}

//Подключение к базе данных mySQL с помощью PDO
try {
    $db = new PDO('mysql:host='.REG_SERVER.';port='.REG_PORT.' charset=utf8;dbname='.REG_DATABASE, REG_USER, REG_PASSWORD);//, array( PDO::ATTR_PERSISTENT => true));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header("Status: 500 Server error");
    echo "Ошибка соединеия!: " . $e->getMessage() . "<br/>";
    die();
}
?>