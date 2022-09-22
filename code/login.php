<?php
// inkludere database forbindelsen
require_once "dbcon.php";

$crud = new Crud($db);

$login = false;
$showError = false;

$myemail = $_POST["email"];
$mypassword = $_POST["password"];

$logins = $crud->SelectString('Users', 'email', $myemail);
if(password_verify($mypassword, $logins->password)){

  $login = true;
  session_start();

  $_SESSION['loggedin'] = true;
  $_SESSION['login_id'] = $logins->id;
  $_SESSION['login_name'] = $logins->name;
    echo 1;
}else{
  $showError = "Invalid Credentials";
  echo 0;
}