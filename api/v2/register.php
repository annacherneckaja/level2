<?php
session_start();
//includes and evaluates the specified file
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once('headers.php');
require_once('db_connection.php');//includes and evaluates the specified file.
require_once(__ROOT__ . '/request.php');//includes and evaluates the specified file.

if (strlen($login) == 0 || strlen($pass) == 0) {
    echo '{ "ok": false}';
} else {
    // insert data in database table
    $add_user = "INSERT INTO $db_table_users (`login`, `password`) VALUES('$login', '$pass') ";
    if ($mysql->query($add_user) == true) {
        echo '{ "ok": true }';
    } else {
        echo '{ "ok": false}';
    }
}

$mysql->close();