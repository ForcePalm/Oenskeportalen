<?php
// inkludere database forbindelsen
require_once "dbcon.php";

$crud = new Crud($db);

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$birthday = $_POST["birthday"];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

  $sqlArray = array(
    'name' => $name,
    'email' => $email,
    'password' => $hashed_password,
    'birthday' => $birthday
  );

$id = $crud->Save('Users', $sqlArray);

if($id > 0){
	echo 1;
  
  session_start();
  $_SESSION['loggedin'] = true;
  $_SESSION['login_id'] = $id;
  $_SESSION['login_name'] = $name;
}else{
  echo 0;
}