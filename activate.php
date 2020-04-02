<?php 

session_start();
require_once 'config.php';
if(isset($_GET['token'])){
$tokenget=$_GET['token'];

$updatestatus="update logininfo set status='active' where token='$tokenget'";
$fire=mysqli_query($con,$updatestatus);
if($fire){
    if(isset($_SESSION['info'])){
        $_SESSION['info']="Successfully activated your account!login now";
        header("Location:index.php");
    }
    else{
        $_SESSION['info']="You are log out successfully!Login Again!";
        header("Location:index.php");
    }
}
else{
    $_SESSION['info']="Couldnot activate your account please check";
    header("Location:index.php");
}

}

?>