<?php
include 'settings.php';
session_start();
$db_handle = mysqli_connect("localhost","guest","guest", $DBname);
$checkUsername = $_SESSION['login_user'];
$checkLogin = "UPDATE $DBtable SET loggedin = '0' WHERE username = '$checkUsername'";
mysqli_query($db_handle, $checkLogin);
session_destroy();
header ( 'Location: ' . $_SERVER['HTTP_REFERER'] );
header ('Location: login.php');
?>