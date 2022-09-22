<?php
// inkludere database forbindelsen
require_once "../../code/dbcon.php";

$crud = new Crud($db);

$title = $_POST["title"];
$description = $_POST["description"];
$user_id = $_POST["user_id"];

  $sqlArray = array(
    'title' => $title,
    'description' => $description,
    'users_id' => $user_id
  );

$id = $crud->Save('Wishlist', $sqlArray);

if($id > 0){
  echo 1;
}else{
  echo 0;
}