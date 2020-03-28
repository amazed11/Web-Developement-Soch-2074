<?php
session_start();
if($_SESSION['username']==null){
header("location:index.php");
}
?>


<?php


 echo '<h1>Hello ! Welcome</h1>'.$_SESSION['username'];
echo '<h3><a href="logout.php">Logout</a></h3>'
?>