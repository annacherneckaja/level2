<?php

$file = file_get_contents('items.json');     // get data from items.json

/**
 * https://stackoverflow.com/questions/4064444/returning-json-from-a-php-script
 * Returning JSON from a PHP Script
 */
header('Content-Type: application/json');
echo $file;
unset($file);                                    // empty variable $file