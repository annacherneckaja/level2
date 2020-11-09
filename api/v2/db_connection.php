<?php
$host = 'localhost';
$user = 'root';
$password = 'root';

$database = 'todo';
$db_table_items = 'todo_items';
$db_table_users = 'todo_users';


// Create connection
$conn = new mysqli($host, $user, $password);

// This creates a new database only if there is no existing
// database
$db_sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($db_sql) === TRUE) {
    $table_items = "CREATE TABLE IF NOT EXISTS $database.$db_table_items 
            (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            login VARCHAR(50) NOT NULL, 
            text VARCHAR(50) NOT NULL, 
            checked TINYINT(1) NOT NULL DEFAULT 0)";
    $conn->query($table_items);

    $table_users = "CREATE TABLE IF NOT EXISTS $database.$db_table_users 
            (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
            login VARCHAR(50) NOT NULL, 
            password VARCHAR(50) NOT NULL)";
    $conn->query($table_users);
}


$mysql = new mysqli($host, $user, $password, $database);
$conn->close();