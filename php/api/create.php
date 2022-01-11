<?php

//Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../models/SubscriberModel.php';

//Database and connection innitiation
$db = new Database;
$subscriber = new SubscriberModel($db->connection());

// Incoming json data decoding
$data = json_decode(file_get_contents('php://input'));

//Setting email received from post request
$subscriber->setEmail($data->email);

//If email is set then create a new row in the database
if ($subscriber->email) {
    if ($subscriber->create()) {
        echo json_encode([
            'message' => 'Subscriber was successfully added'
        ]);
    } else {
        echo json_encode([
            'message' => 'Subscriber was not added'
        ]);
    }
} else {
    echo json_encode([
        'message' => "Request wasn't completed"
    ]);
}
