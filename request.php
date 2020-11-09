<?php

// https://www.geeksforgeeks.org/how-to-receive-json-post-with-php/
$json = file_get_contents('php://input');// Takes raw data from the request
$input = (json_decode($json, TRUE));// Converts it into a PHP object
/**
 * trim - > Strip whitespace (or other characters) from the beginning and end of a string
 * filter_var(str, FILTER_SANITIZE_STRING) -> Strip tags, optionally strip or encode special characters.
 */
$id = filter_var(trim($input['id']), FILTER_SANITIZE_STRING);
$text = filter_var(trim($input['text']), FILTER_SANITIZE_STRING);
$checked = filter_var(trim($input['checked']), FILTER_SANITIZE_STRING);
$login = filter_var(trim($input['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($input['pass']), FILTER_SANITIZE_STRING);