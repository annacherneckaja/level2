<?php
$actions = array(
    'register' => [
        'method' => "POST",
        'statement' => "INSERT INTO $db_table_users (login, password) VALUES(?, ?) ",
        'input_parameters' => [$login, $pass]
    ],
    'login' => [
        'method' => "POST",
        'statement' => "SELECT * FROM $db_table_users WHERE login = ? AND password = ?",
        'input_parameters' => [$login, $pass]
    ],
    'logout' => [
        'method' => "POST"
    ],
    'getItems' => [
        'method' => "GET",
        'statement' => "SELECT id, text, checked FROM $db_table_items WHERE login = ?",
        'input_parameters' => [$_SESSION['user']]
    ],
    'addItem' => [
        'method' => "POST",
        'statement' => "INSERT INTO $db_table_items (text, login) VALUES(?, ?)",
        'input_parameters' => [$text, $_SESSION['user']]
    ],
    'changeItem' => [
        'method' => "PUT",
        'statement' => "UPDATE $db_table_items SET text = ?, checked = ? WHERE id = ?",
        'input_parameters' => [$text, $checked, $id]
    ],
    'deleteItem' => [
        'method' => "DELETE",
        'statement' => "DELETE FROM $db_table_items WHERE `id` =?",
        'input_parameters' => [$id]
    ]);