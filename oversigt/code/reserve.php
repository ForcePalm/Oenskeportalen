<?php
session_start();
// inkludere database forbindelsen
require_once "../../code/dbcon.php";

$crud = new Crud($db);

$rid = $_POST["rid"];

$row = $crud->Select('Reserved', 'id', $rid);

if(empty($row)){
  $sqlArray = array(
    'Users_id' => $_SESSION['login_id'],
    'Wish_id' => $rid,
  );
  $crud->Save('Reserved', $sqlArray);
}
