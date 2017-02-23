<?php
session_start();
ob_start();

//SSL sertifikatı varsa əgər istifadə oluna bilər
/*if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}*/

include 'app/Bootstrap.php';
include 'app/Controller.php';
include 'app/database/Database.php';

$Boot = new Bootstrap();
$ROUTE = $Boot->init($_GET['route']);

$controller = new Controller();
$controller->detectRoute($ROUTE);

ob_end_flush();
?>
