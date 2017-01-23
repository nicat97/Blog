<?php
session_start();

include 'app/Bootstrap.php';
include 'app/Controller.php';
include 'app/database/Database.php';

$Boot = new Bootstrap();
$ROUTE = $Boot->init($_GET['route']);

$controller = new Controller();
$controller->detectRoute($ROUTE);

?>