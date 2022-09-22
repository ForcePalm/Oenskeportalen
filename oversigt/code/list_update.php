<?php
// inkludere database forbindelsen
require_once "../../code/dbcon.php";

$crud = new Crud($db);

$title = $_POST["title"];
$description = $_POST["description"];
$lid = $_POST["id"];

  $sqlArray = array(
    'title' => $title,
    'description' => $description
  );

  $identifyArray = array(
    'id' => $lid
  );

$id = $crud->Update('Wishlist', $sqlArray, $identifyArray);

if($id > 0){
  echo 1;
}else{
  echo 0;
}
