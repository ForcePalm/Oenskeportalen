<?php
// inkludere database forbindelsen
require_once "../../code/dbcon.php";

$crud = new Crud($db);

$list_id = $_POST['list_id'];

$wishes = $crud->SelectAll('Wish', 'wishlist_id', $list_id);

while($row = $wishes->fetch_object()){
$reserved = $crud->Delete('Reserved', 'Wish_id', $row->id);
}

$wish = $crud->Delete('Wish', 'wishlist_id', $list_id);

$shared = $crud->Delete('Shared', 'wishlist_id', $list_id);

$wishlist = $crud->Delete('Wishlist', 'id', $list_id);

echo 1;
