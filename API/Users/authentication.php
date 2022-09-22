<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/Users.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$users = new Users($db);
  
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
  
// set ID property of product to be edited
$users->email = $data->email;

$password = $data->password;

$users->authentication();

// update the product
if($users->password!=null){
  
    if(password_verify($password, $users->password)){
            // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "login ok."));
    }else{
            // set response code - 503 service unavailable
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "wrong credentials"));
    }

}
  
// if unable to update the product, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(404);
  
    // tell the user
    echo json_encode(array("message" => "Unable to find User."));
}
