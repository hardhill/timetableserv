<?php

/* 

для вычисления количество процессов выполненных подразделениями по типу диапазона дат

 параметр запроса 
 ?datep=2018-04-01&p=week
 ?datep=2018-04-01&p=day
 */
if (!defined('REG_KEY')) {
    header("HTTP/1.1 404 Not Found");
    die();
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
//header("Expires: " . gmdate("D, d M Y H:i:s", time()/*+86400*365*/) . " GMT");
//header("Cache-Control: max-age=0"/*+86400*365*/);

$sql = "select * from timetable";
//

try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    $arrError[] = $e;
    echo ServerOtvet($arrError);
}

//получаем все текущие процессы
$alldata = $stmt->fetchAll(PDO::FETCH_ASSOC);
//$allproc = convert_from_cp1251_to_utf8_recursively($allproc);



//создаем массив для дальнейшей отправки клиенту
$monitor = array();

$monitor["data"] = $alldata;


if (count($monitor) > 0) {
    //$otv = json_encode($rows,JSON_UNESCAPED_UNICODE);
    echo ServerOtvet($alldata);
} else {
    echo ServerOtvet($arrError);
}

?>