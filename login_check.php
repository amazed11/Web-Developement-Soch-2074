<?php 

if(isset($_POST['submitbtn'])){
session_start();
require_once 'config.php';
$user=$_POST['username'];
$pass=$_POST['password'];
$sql= "select * from logininfo where username ='$user' and status='active'";
$run=mysqli_query($con,$sql);
if(mysqli_num_rows($run) > 0){
while($row=mysqli_fetch_array($run)){
$rehash=$row['password'];
if(password_verify($pass,$rehash)){
    $_SESSION['username']=$user;
    echo '<script>alert("Successfully logged in!");
    window.location.href="maindashboard.php";
    </script>';
}
else{
    echo
'<script>

alert("Login denied!Please check");
window.location.href="index.php";
</script>';
}
}
}
else{
echo
'<script>

alert("Login denied!Please check");
window.location.href="index.php";
</script>';
}
}


?>