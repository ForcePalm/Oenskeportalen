<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/Wishlist.php';

$database = new Database();
$db = $database->getConnection();

$wishlist = new Wishlist($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

if(
  !empty($data->title) &&
  !empty($data->users_id)
){

    // set product property values
    $wishlist->title = $data->title;
    $wishlist->description = $data->description;
    $wishlist->users_id = $data->users_id;

    // create the product
    if($wishlist->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Wishlist was created."));
    }

    // if unable to create the product, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create Wishlist."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create Wishlist. Data is incomplete."));
}
