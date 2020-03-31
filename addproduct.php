<?php 
require_once 'config.php';
$pname=$_GET['name'];
$pprice=$_GET['price'];
$pqty=$_GET['quantity'];
$pdesc=$_GET['description'];
$sql ="insert into productinfo (pname,pprice,pqty,pdesc) values('$pname','$pprice','$pqty','$pdesc')";
$fire=mysqli_query($con,$sql);
  echo '<script>
    alert("Successfully added!!");
    window.location.href="maindashboard.php";
    </script>';
?>