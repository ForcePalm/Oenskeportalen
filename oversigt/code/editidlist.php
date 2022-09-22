<?php
session_start();
$editid = $_POST['editid'];

$_SESSION['editid'] = $editid;

echo 1;
