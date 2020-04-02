<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet"  href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
  
<div class="container-fluid " 
style="background:url('images/dd.gif') no-repeat">
<div class="row shadow">
    <div class="col-md-12 mt-3 p-3">
        <h1 class="text-center text-uppercase font-weight-bold animated bounce infinite delay-2s">Welcome to our Site</h1>
    </div>
  
</div> 
<!-- top row end -->

<div class="col-md-4 m-auto d-block">
<div class="jumbotron mt-3" style="background:linear-gradient(to right ,red,purple);">
<h1 class="text-white">Join us</h1>
        <!-- start--login -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active text-white" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Register</a>
  </li>
  
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="text-white bg-success text-center rounded">
        <?php
        session_start();
            echo $_SESSION['info'];
        
        ?>
    </div>
  <!-- form-start-login -->
  <form action="login_check.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-white">Username</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Enter your email...">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-white">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password...">
  </div>
 
  <button type="submit" class="btn btn-success" name="submitbtn">Submit</button>
</form>
  <!-- form-end-login -->
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <!-- form-start-register -->
      <form action="<?php  echo htmlentities("register.php");?>" method="post">
  <div class="form-group">
    <label for="user" class="text-white">Username</label>
    <input type="email" class="form-control" id="user" aria-describedby="emailHelp" name="username">
   <p id="user_err">
    
   </p>
  </div>
  <div class="form-group">
    <label for="pass" class="text-white">Password</label>
    <input type="password" class="form-control" id="pass" name="password">
    <p id="pass_err"></p>
  </div>
  <div class="form-group">
    <label for="conpass" class="text-white"> Confirm Password</label>
    <input type="password" class="form-control" id="conpass" name="conpassword">
    <p id="con_err"></p>
  </div>
 
  <button type="submit" class="btn btn-success" name="submitbtn" id="submitbtnid">Submit</button>
</form>
      <!-- form-end-register -->

  </div>

</div>
        <!-- end login -->
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#user_err').hide();
        $('#pass_err').hide();
        $('#con_err').hide();
        var user_err=true;

        var pass_err=true;
            
        var con_err=true;
        //user validation
        $('#user').keyup(function(){
                usercheck();
        });
        function usercheck(){
            var u=$('#user').val();
            if(u.trim().length == '' || u.length==null){
                $('#user_err').show();
                $('#user_err').html("**Username is empty");
                $('#user_err').css("color","yellow");
                $('#user').focus();
                user_err=false;
                return false;
            }
            else{
                $('#user_err').hide();
            }
        }

//password validation
$('#pass').keyup(function(){
            passcheck();
        });
        function passcheck(){
            var p=$('#pass').val();
            if(p.trim().length == '' || p.length==null){
                $('#pass_err').show();
                $('#pass_err').html("**password is empty");
                $('#pass_err').css("color","yellow");
                $('#pass').focus();
                user_err=false;
                return false;
            }
            else if(p.length<5 || p.length>10){
                $('#pass_err').show();
                $('#pass_err').html("**password must be greater than 5 and less than 10");
                $('#pass_err').css("color","yellow");
                $('#pass').focus();
                user_err=false;
                return false;
            }
            else{
                $('#pass_err').hide();
            }
        }
        
//confirm password validation
$('#conpass').keyup(function(){
            conpasscheck();
        });
        function conpasscheck(){
            var c=$('#conpass').val();
            var p=$('#pass').val();
            if(c.trim().length == '' || c.length==null){
                $('#con_err').show();
                $('#con_err').html("**password is empty");
                $('#con_err').css("color","yellow");
                $('#conpass').focus();
                user_err=false;
                return false;
            }
            else if(p!=c){
                $('#con_err').show();
                $('#con_err').html("**password doesnot match");
                $('#con_err').css("color","yellow");
                $('#conpass').focus();
                user_err=false;
                return false;
            }
            else{
                $('#con_err').hide();
            }
        }
$('#submitbtnid').click(function(){
user_err=true;
pass_err=true;
con_err=true;
usercheck();
passcheck();
conpasscheck();

if(user_err==true && pass_err==true && con_err==true){
    return true;
}
else{
    return false;
}
});
    });
</script>


</body>
</html>