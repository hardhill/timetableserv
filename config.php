<?php
if(!defined('REG_KEY'))
{
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('./404.html'));
}

setlocale(LC_ALL, 'ru_RU');
//Адрес базы данных
define('REG_SERVER','mysql16.hostland.ru');

define('REG_PORT','3306');
//Логин БД
define('REG_USER','host1608830_timet');

//Пароль БД
define('REG_PASSWORD','Mer1daCX400');

//БД
define('REG_DATABASE','host1608830_timet');


//Префикс БД
define('REG_DBPREFIX','reg_');

//Errors
define('REG_ERROR_CONNECT','Немогу соеденится с БД');

//Errors
define('REG_NO_DB_SELECT','Данная БД отсутствует на сервере');

//Адрес хоста сайта
define('REG_HOST','http://'. $_SERVER['HTTP_HOST'] .'/');

//Адрес почты от кого отправляем
define('REG_MAIL_AUTOR','admin@bielecki.ru');
?>