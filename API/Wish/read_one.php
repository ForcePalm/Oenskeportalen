<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/Wish.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$wish = new Wish($db);

// set ID property of record to read
$wish->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of product to be edited
$wish->readOne();

if($wish->id!=null){
    // create array
    $wish_arr = array(
        "id" =>  $wish->id,
        "link" => $wish->link,
        "title" => $wish->title,
        "description" => $wish->description,
        "price" => $wish->price,
        "image" => $wish->image,
        "wishlist_id" => $wish->wishlist_id
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($wish_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user product does not exist
    echo json_encode(array("message" => "Wish does not exist."));
}
