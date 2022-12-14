<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/Shared.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$shared = new Shared($db);

// set ID property of record to read
$shared->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of product to be edited
$shared->readOne();

if($shared->id!=null){
    // create array
    $shared_arr = array(
        "id" =>  $shared->id,
        "users_id" => $shared->users_id,
        "wishlist_id" => $shared->wishlist_id
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($shared_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user product does not exist
    echo json_encode(array("message" => "Share does not exist."));
}
?>
