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
include_once '../objects/Wish.php';

$database = new Database();
$db = $database->getConnection();

$wish = new Wish($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->title) &&
    !empty($data->wishlist_id)
){

    // set product property values
    $wish->link = $data->link;
    $wish->title = $data->title;
    $wish->wishlist_id = $data->wishlist_id;

    if(!empty($data->description)){
        $wish->description = $data->description;
    }
    if(!empty($data->price)){
        $wish->price = $data->price;
    }
    if(!empty($data->image)){
        $wish->image = $data->image;
    }

    // create the product
    if($wish->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Wish was created."));
    }

    // if unable to create the product, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create Wish."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create Wish. Data is incomplete."));
}
?>
