
<?php
require_once 'bootstrap/css.php';
require_once 'config.php';
$id=$_GET['id'];
$res=mysqli_query($con,"select * from productinfo where id='$id'");
while($row=mysqli_fetch_array($res)){

?>
<div class="col-md-8 m-auto jumbotron">
<form action="update1.php?id=<?php echo $id; ?>" method="post">

<h1>Update Products</h1>
<div class="form-group">
    
    <input type="hidden" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $row['id'];?>" name="id">
  <div class="form-group">
    <label for="exampleInputEmail">Product Name</label>
    <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $row['pname'];?>" name="pname">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmai">Product Price</label>
    <input type="text" class="form-control" id="exampleInputEmai" aria-describedby="emailHelp" value="<?php echo $row['pprice'];?>" name="pprice">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">product Quantity</label>
    <input type="text" class="form-control" id="exampleInputPassword" value="<?php echo $row['pqty'];?>" name="pqty">
  </div>
  <div class="form-group">
    <label for="exampleInputEma">Product description</label>
    <input type="text" class="form-control" id="exampleInputEma" aria-describedby="emailHelp" value="<?php echo $row['pdesc'];?>" name="pdesc">
   
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<?php } 
?>
</div>
<?php
require_once 'bootstrap/js.php';



?>
