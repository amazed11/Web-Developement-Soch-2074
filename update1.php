<?php

if(isset($_POST['submit'])){
    require_once 'config.php';
    $ids=$_GET['id'];
    $pname=$_POST['pname'];
    $pprice=$_POST['pprice'];
    $pqty=$_POST['pqty'];
    $pdesc=$_POST['pdesc'];
    $sqls="UPDATE `productinfo` SET `pname`='$pname',`pprice`=$pprice,`pqty`=$pqty,`pdesc`='$pdesc' WHERE id=$ids";
    mysqli_query($con,$sqls);
    echo '<script>alert("Successfully edited");
    window.location.href="maindashboard.php";
    </script>';
    } 
?>