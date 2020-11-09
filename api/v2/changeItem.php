<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once('headers.php');
require_once(__ROOT__ . '/request.php');
require_once('db_connection.php');//includes and evaluates the specified file.

// update - change data
$mysql->query("UPDATE $db_table_items SET text = '$text', checked = '$checked' WHERE id = '$id'");
$response['ok'] = ($mysql->affected_rows > 0) ? true : false;
$mysql->close();

//Returning JSON response from a PHP Script
echo json_encode($response);