<?php 

if(isset($_POST['submitbtn'])){
require_once 'config.php'; 

$uname=$_POST['username'];
$pass=$_POST['password'];
$conpass=$_POST['conpassword'];
$sql= "select * from logininfo where username='$uname' and password='$password'";
$result=mysqli_query($con,$sql);
$num =mysqli_num_rows($result);
if($num >0 ){
     echo "you have already registered";
}
else{
    $s= "insert into logininfo (username,password) values ('$uname','$pass')";
    mysqli_query($con,$s);
    echo "successfully registerd";
}

}




?>