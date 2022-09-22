<?php
session_start();
if(!$_SESSION['loggedin']){
  header('Location: /login');
}

// inkludere database forbindelsen
require_once "../code/dbcon.php";

$crud = new Crud($db);

$sharedid = $_GET['id'];

$row = $crud->SelectWhere('Shared', 'users_id', $_SESSION['login_id'], 'wishlist_id', $sharedid);
if(empty($row)){
  $val = $crud->SelectWhere('Wishlist', 'id', $sharedid, 'users_id', $_SESSION['login_id']);
  if(empty($val)){
    $sqlArray = array(
      'users_id' => $_SESSION['login_id'],
      'wishlist_id' => $sharedid,
    );

    $crud->Save('Shared', $sqlArray);
  }
}

header('Location: /oversigt/delt');
