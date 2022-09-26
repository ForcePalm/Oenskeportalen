<?php
session_start();
// inkludere database forbindelsen
require_once "../../code/dbcon.php";

$crud = new Crud($db);

$delid = $_POST["delid"];

$result = $crud->SelectAll('Wish', 'wishlist_id', $delid);

while ($row = $result->fetch_object()) {
  $crud->Delete('Reserved', 'Wish_id', $row->id);
  if($row->image != "nopic.jpg"){
    unlink("../../wishimgs/".$row->image);
  }
}

$crud->Delete('Shared', 'wishlist_id', $delid);
$crud->Delete('Wish', 'wishlist_id', $delid);
$crud->Delete('Wishlist', 'id', $delid);
