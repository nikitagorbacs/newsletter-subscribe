<?php
//Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../models/SubscriberModel.php';

//Database and connection innitiation
$db = new Database;
$subscriber = new SubscriberModel($db->connection());

// Raw posted data
$data = json_decode(file_get_contents('php://input'));
$json = file_get_contents('php://input');

// Set ID that should be deleted from database
$subscriber->setId($data->id);

// If id is set then delete a row with a specified id
if ($subscriber->id) {
    if ($subscriber->delete()) {
        echo json_encode([
            'message' => 'Subscriber was deleted'
        ]);
    } else {
        echo json_encode([
            'message' => 'Subscriber was not deleted'
        ]);
    }
} else {
    echo json_encode([
        'message' => "Subscriber wasn't deleted"
    ]);
}
