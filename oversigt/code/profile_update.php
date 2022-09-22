<?php
// inkludere database forbindelsen
require_once "../../code/dbcon.php";

$crud = new Crud($db);

$name = $_POST["name"];
$email = $_POST["email"];
$birthday = $_POST["birthday"];
if(!empty($_POST["password"])){
  $password = $_POST["password"];
  $hashed_password = password_hash($password, PASSWORD_BCRYPT);
}else{
  $user = $crud->Select('Users', 'id', $_POST["users_id"]);
  $hashed_password = $user->password;
}
$users_id = $_POST["users_id"];

  $sqlArray = array(
    'name' => $name,
    'email' => $email,
    'birthday' => $birthday,
    'password' => $hashed_password
  );

  $identifyArray = array(
    'id' => $users_id
  );

$id = $crud->Update('Users', $sqlArray, $identifyArray);

if($id > 0){
  echo 1;
}else{
  echo 0;
}
