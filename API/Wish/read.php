<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/Wish.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$wish = new Wish($db);

// query products
$stmt = $wish->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // products array
    $wish_arr=array();
    $wish_arr["Wishes"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $wish_item=array(
            "id" => $id,
            "link" => $link,
            "title" => $title,
            "description" => $description,
            "price" => $price,
            "image" => $image,
            "wishlist_id" => $wishlist_id,
            "listtitle" => $listtitle

        );

        array_push($wish_arr["Wishes"], $wish_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($wish_arr);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No wishes found.")
    );
}
