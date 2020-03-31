<?php 
require_once 'config.php';
$id=$_GET['id'];
 $sql="delete from productinfo where id='$id'" ;
mysqli_query($con,$sql);
header("location:maindashboard.php");

?>