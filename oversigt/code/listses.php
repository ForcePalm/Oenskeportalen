<?php
session_start();
$listid = $_POST['listid'];

$_SESSION['listid'] = $listid;

echo 1;
