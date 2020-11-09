<?php
session_start();

//includes and evaluates the specified file
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('headers.php');

unset($_SESSION['user']);
echo json_encode(array("ok"=> true));