<?php
session_start();

define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once('headers.php');
require_once(__ROOT__ . '/request.php');//includes and evaluates the specified file.
require_once('db_connection.php');//includes and evaluates the specified file.

$user = $_SESSION['user'];
$mysql->query("INSERT INTO $db_table_items (text, login) VALUES('$text', '$user') "); // insert data in database
echo(json_encode(array('id' => $mysql->insert_id))); // //Returning JSON response from a PHP Script

$mysql->close(); // end of work