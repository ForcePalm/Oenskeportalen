<?php
session_start();
// inkludere database forbindelsen
require_once "../../code/dbcon.php";

$crud = new Crud($db);

$id = $_POST["id"];

$result = $crud->SelectAll('Wish', 'wishlist_id', $id);

while($row = $result->fetch_object()) {
  $reserved = $crud->Select('Reserved', 'Wish_id', $row->id);
  if(!empty($reserved) && $reserved->Users_id == $_SESSION['login_id']){
    $crud->Delete('Reserved', 'id', $reserved->id);
  }
}
$crud->DeleteWhere('Shared', 'users_id', $_SESSION['login_id'], 'wishlist_id', $id);
