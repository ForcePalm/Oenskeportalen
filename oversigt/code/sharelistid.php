<?php
session_start();
$sharelistid = $_POST['sharelistid'];

$_SESSION['sharelistid'] = $sharelistid;

echo 1;
