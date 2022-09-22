<?php
// inkludere database forbindelsen
require_once "../../code/dbcon.php";

$crud = new Crud($db);

$users_id = $_POST['users_id'];

$reserved = $crud->Delete('Reserved', 'users_id', $users_id);

$shared = $crud->Delete('Shared', 'users_id', $users_id);

$wish = $crud->Delete('Wish', 'users_id', $users_id);

$wishlist = $crud->Delete('Wishlist', 'users_id', $users_id);

$user = $crud->Delete('Users', 'id', $users_id);

session_start();
session_destroy();

echo 1;
