<?php
session_start();
//includes and evaluates the specified file
require_once('headers.php');
require_once('db_connection.php');//includes and evaluates the specified file.
$_current_user = $_SESSION['user'];
$result = $mysql->query("SELECT id, text, checked FROM $db_table_items WHERE login = '$_current_user'");
$array = $result->fetch_all(MYSQLI_ASSOC);

for ($i = 0; $i < count($array); $i++) {
    $array[$i]['checked'] = $array[$i]['checked']== '1' ? true : false;
}

$result = array('items' => $array);

echo json_encode($result);

$mysql->close();