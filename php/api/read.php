<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/SubscriberModel.php';

//Database and connection innitiation
$db = new Database;
$subscriber = new SubscriberModel($db->connection());

//Fetch data from the database
$result = $subscriber->getAll();

$num = $result->rowCount();

//Check if database is not empty
if ($num > 0) {
    $subs_arr = [];

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $sub = [
            'id' => $id,
            'email' => $email
        ];

        //Push data to an array
        array_push($subs_arr, $sub);
    }

    //Display array in json
    echo json_encode($subs_arr);
} else {
    echo json_encode([
        'message' => 'No data found'
    ]);
}
