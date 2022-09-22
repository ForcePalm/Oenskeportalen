<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/Wishlist.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$wishlist = new Wishlist($db);

// set ID property of record to read
$wishlist->id = isset($_GET['id']) ? $_GET['id'] : die();

// query products
$stmt = $wishlist->readAllWhere();
$num = $stmt->rowCount();

// check if more than 0 record found
if($wishlist->id!=null && $num>0){

    // products array
    $wishlist_arr=array();
    $wishlist_arr["wishlists"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $wishlist_item=array(
            "id" => $id,
            "title" => $title,
            "description" => $description,
            "wishcount" => $wishcount,
            "users_id" => $users_id,
            "name" => $name
        );

        array_push($wishlist_arr["wishlists"], $wishlist_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($wishlist_arr);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No Wishlists found.")
    );
}