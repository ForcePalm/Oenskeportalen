<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/Wishlist.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$wishlist = new Wishlist($db);

// set ID property of record to read
$wishlist->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of product to be edited
$wishlist->readOne();

if($wishlist->id!=null){
    // create array
    $wishlist_arr = array(
        "id" =>  $wishlist->id,
        "title" => $wishlist->title,
        "description" => $wishlist->description,
        "wishcount" => $wishlist->wishcount,
        "users_id" => $wishlist->users_id,
        "name" => $wishlist->name
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($wishlist_arr);
}

else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user product does not exist
    echo json_encode(array("message" => "Wishlist does not exist."));
}
?>
