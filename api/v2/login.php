<?php
session_start();

//includes and evaluates the specified file
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once('headers.php');
require_once('db_connection.php');//includes and evaluates the specified file.
require_once(__ROOT__ . '/request.php');//includes and evaluates the specified file.

if (strlen($login) == 0 || strlen($pass) == 0) {
    echo '{ "ok": false }';
} else {
    // insert data in database table
    $check_user = "SELECT * FROM $db_table_users WHERE login = '$login' AND password = '$pass'";
    if (mysqli_num_rows($mysql->query($check_user)) != 0) {
        $_SESSION['user'] = $login;
        echo '{ "ok": true }';
    } else {
        echo '{ "ok": false }';
    }
}