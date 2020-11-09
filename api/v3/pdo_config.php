<?php
$host = 'localhost';
$db = 'todo';
$user = 'root';
$pass = 'root';
$charset = 'utf8';
$db_table_items = 'todo_items';
$db_table_users = 'todo_users';

$dsn = "mysql:host=$host;dbname=$db; charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);


$pdo->exec("CREATE DATABASE IF NOT EXISTS $db");

$table_items = "CREATE TABLE IF NOT EXISTS $db_table_items
           (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
           login VARCHAR(50) NOT NULL,
           text VARCHAR(50) NOT NULL,
           checked TINYINT(1) NOT NULL DEFAULT 0)";
$pdo->exec($table_items);

$table_users = "CREATE TABLE IF NOT EXISTS $db_table_users
           (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
           login VARCHAR(50) NOT NULL,
           password VARCHAR(50) NOT NULL)";
$pdo->exec($table_users);
