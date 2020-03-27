<?php 
$username="root";
$password="";
$hostname= "localhost";
$dbname="phpcode";
$con=mysqli_connect($hostname,$username,$password,$dbname);
if(mysqli_connect_errno()){
    echo "failed to established the db connection".mysqli_connect_error();
}


?>