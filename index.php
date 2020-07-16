<?php

//Устанавливаем кодировку и вывод всех ошибок
//header('Content-Type: text/html; charset=UTF8');
error_reporting(E_ALL);

//Включаем буферизацию содержимого
//ob_start();


//Определяем переменную для переключателя

$mode=isset($_REQUEST['mode'])?$_REQUEST['mode']: false;

//$user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
$arrError = array();

//Устанавливаем ключ защиты
define('REG_KEY', true);

//Подключаем конфигурационный файл
include_once 'config.php';



//Подключаем скрипт с функциями
include_once 'func.php';


//подключаем MySQL
include_once 'db.php';




switch ($mode) {

    case 'test':
        include_once "test.php";
        break;
    case 'table':
        include_once "table.php";
        break;
    default:
        include_once 'all_data.php';
}
 ?>