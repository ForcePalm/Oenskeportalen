<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/Shared.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$shared = new Shared($db);

// query products
$stmt = $shared->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // products array
    $shared_arr=array();
    $shared_arr["Shares"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $shared_item=array(
			"id" => $id,
            "users_id" => $users_id,
            "wishlist_id" => $wishlist_id
        );

        array_push($shared_arr["Shares"], $shared_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($shared_arr);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No readings found.")
    );
}
