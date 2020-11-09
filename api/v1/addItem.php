<?php
// https://www.geeksforgeeks.org/how-to-receive-json-post-with-php/

$json = file_get_contents('php://input');// Takes raw data from the request
$text = trim(json_decode($json, true)['text']);// Converts it into a PHP object

if (strlen($text)>0) {
    $id = file_get_contents("id_counter.txt");
    file_put_contents("id_counter.txt", ($id + 1));
    $checked = false;

    $new_item = array(
        'id' => $id,
        'text' => $text,
        'checked' => $checked
    );
    /**
     * https://www.delay-delo.com/content/rabota-php-c-json-dobavlenie-udalenie-i-obnovlenie-v-fayle
     */

    $file = file_get_contents('items.json'); // get data from items.json
    $itemsList = json_decode($file, TRUE);      // decoding data into array
    unset($file);                                    // empty variable $file
    $itemsList[] = $new_item;               // add new item
    file_put_contents('items.json', json_encode($itemsList)); // encode data and write into items.json
    unset($itemsList);                                // empty variable $itemsList

    /**
     * https://stackoverflow.com/questions/4064444/returning-json-from-a-php-script
     * Returning JSON from a PHP Script
     */
    header('Content-Type: application/json');
    echo (json_encode(array('id' => $id)));
}
