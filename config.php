<?php
// session_start();
// require_once 'API/vendor/autoload.php';
// $gClient=new Google_Client();

$username="root";
$password="";
$hostname= "localhost";
$dbname="phpcode";
$con=mysqli_connect($hostname,$username,$password,$dbname);
if(mysqli_connect_errno()){
    echo "failed to established the db connection".mysqli_connect_error();
}


?>