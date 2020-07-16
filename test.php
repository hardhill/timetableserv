<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!defined('REG_KEY'))
{
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('./404.html'));
}
//$id=isset($_REQUEST['id'])?$_REQUEST['id']*2: 0;
$value = array('id'=>1,'name'=>"ivan",'country'=>'Russia',"office"=>array("yandex"," management"));
$in = json_encode($value);


try {
    $s = ServerOtvet($value);
}catch(ErrorException $e){
    header('Content-Type: text/html; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    echo $e;
}
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
echo $s;

?>

