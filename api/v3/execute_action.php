<?php
session_start();
require_once('pdo_config.php');
require_once('status_codes.php');
require_once('C:\MAMP\htdocs\back\level2\request.php');
require_once('actions.php');


if ($_SERVER['REQUEST_METHOD'] == $actions[$action]['method']) {
    if (isset($actions[$action]['statement'])) {
        $stmt = $pdo->prepare($actions[$action]['statement']);
        $stmt->execute($actions[$action]['input_parameters']);
    }

    switch ($action) {
        case "changeItem":
        case "deleteItem":
        case "register":
            $response['ok'] = $stmt->rowCount() != 0;
            break;
        case "login":
            if ($response['ok'] = ($stmt->fetch() != 0))
                $_SESSION['user'] = $login;
            break;
        case "logout":
            unset($_SESSION['user']);
            $response['ok'] = $_SESSION['user'] == null;
            break;
        case "getItems":
            $response['items'] = $stmt->fetchAll();
            break;
        case "addItem":
            $response['id'] = $stmt->insert_id;
            break;
        default:
            header_status('500');
            $response['error'] = 'some dumb error on the server';

    }

} elseif ($_SERVER['REQUEST_METHOD'] = 'OPTION') {
    header_status('200');
} else {
    header_status('400');
    $response['error'] = 'the user made a mistake and sent some garbage';
}


