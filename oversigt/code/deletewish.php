<?php
session_start();
// inkludere database forbindelsen
require_once "../../code/dbcon.php";

$crud = new Crud($db);

$delid = $_POST["delid"];

$crud->Delete('Reserved', 'Wish_id', $delid);
$crud->Delete('Wish', 'id', $delid);
