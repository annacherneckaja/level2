<?php
// https://www.geeksforgeeks.org/how-to-receive-json-post-with-php/
$json = file_get_contents('php://input');// Takes raw data from the request
$new_item = (json_decode($json, TRUE));// Converts it into a PHP object

$response = array('ok' => false);

$file = file_get_contents('items.json');     // get data from items.json
$itemsList = json_decode($file, TRUE);         // decoding data into array
unset($file);                                    // empty variable $file

// search item with id = $new_item['id'] and unset data of this item
if (isset($itemsList)) {
    for ($i = 0; $i < count($itemsList); $i++) {
        if ($itemsList[$i]['id'] == $new_item['id']) {
            unset($itemsList[$i]);
            $response['ok'] = true;
            break;
        }
    }
}
file_put_contents('items.json', json_encode($itemsList)); // encode data and write into items.json
unset($itemsList);  // empty variable

/**
 * https://stackoverflow.com/questions/4064444/returning-json-from-a-php-script
 * Returning JSON from a PHP Script
 */
header('Content-Type: application/json');
echo json_encode($response);