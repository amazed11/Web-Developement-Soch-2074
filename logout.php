<?php

session_start();

unset($_SESSION['username']);
header("location:index.php");
$_SESSION['info']="Logout Successfully! Please login";
?>