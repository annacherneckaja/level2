<?php
//includes and evaluates the specified file.
require_once('api/v3/headers.php');

// get action from REQUEST_URI
$requestUrl = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
$query = parse_url($requestUrl, PHP_URL_QUERY);
parse_str($query);

//execute action
require_once('api/v3/execute_action.php');

//Returning JSON response from a PHP Script
echo json_encode($response);