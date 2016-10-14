<?php
$currentPage = "Contact";
include "header.php";
if (isset($_SESSION['login_user'])) header('Location: contactMe.php');
    else header('Location: login.php');
?>
