<?php 
session_start();
if(isset($_POST['submitbtn'])){
require_once 'config.php'; 

$uname=mysqli_real_escape_string($con,$_POST['username']);
$pass=mysqli_real_escape_string($con,$_POST['password']);
$conpass=$_POST['conpassword'];
$hash=password_hash($pass,PASSWORD_BCRYPT);
$token=bin2hex(random_bytes(15));
$sql= "select * from logininfo where username='$uname'";
$result=mysqli_query($con,$sql);
$num =mysqli_num_rows($result);
if($num >0 ){
     echo '<script>alert("You have already registered!Check your details or login")</script>';
     $_SESSION['info']="Please login!!";
     header("Location:index.php");
}
else{
  
    $s= "insert into logininfo (username,password,token,status) values ('$uname','$hash','$token','inactive')";
    $fire=mysqli_query($con,$s);
    if($fire){
        $subject="Email Activation";
       $body="Hi .$uname .Please click below link to activate your account and verify your account successfully.Thank you! \n
       http://localhost:81/php1/activate.php?token=$token";
       $header="From : amazedking2@gmail.com";
       if(mail($uname,$subject,$body,$header)){
          $_SESSION['info']="Please check your email for activation to $uname";
          header("Location:index.php");
       }
       else{
        echo '<script>
        alert("Failed to send");
        </script>';
       }
       
    }
    else{
        echo '<script>
    
    alert("You cannot register!!");
    window.location.href="index.php";
    
    </script>';
    }
    
}

}




?>