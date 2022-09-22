<?php
session_start();
// inkludere database forbindelsen
require_once "../../code/dbcon.php";

$crud = new Crud($db);

$cid = $_POST["cid"];

$row = $crud->Select('Reserved', 'id', $cid);

if($row->Users_id == $_SESSION['login_id']){
  $crud->Delete('Reserved', 'id', $cid);
}
