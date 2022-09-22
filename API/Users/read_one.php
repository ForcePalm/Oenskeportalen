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

// set ID property of record to read
$users->email = isset($_GET['email']) ? $_GET['email'] : die();
$password = isset($_GET['password']) ? $_GET['password'] : die();
// read the details of product to be edited
$users->readOne();

if($users->id!=null){
  if(password_verify($password, $users->password)){
          // set response code - 200 ok
  http_response_code(200);
  
  $users_item=array(
        "id" => $users->id,
        "name" => $users->name,
        "email" => $users->email,
        "password" => $users->password,
        "birthday" => $users->birthday
    );
  // tell the user
  echo json_encode($users_item);
  }else{
          // set response code - 503 service unavailable
  http_response_code(400);

  // tell the user
  echo json_encode(array("message" => "wrong credentials"));
  }
}else{
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user product does not exist
    echo json_encode(array("message" => "User does not exist."));
}
