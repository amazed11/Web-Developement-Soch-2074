
<?php
session_start();
if($_SESSION['username']==null){
header("location:index.php");
}
?>


<?php
//echo '<h1>Hello ! Welcome</h1>'.$_SESSION['username'];
//echo '<h3><a href="logout.php">Logout</a></h3>'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php require_once 'bootstrap/css.php'; ?>
    <title>dashboard</title>
</head>
<body>
    
<div class="container">
<!-- navbar top -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark t">
  <a class="navbar-brand text-white" href="maindashboard.php">Google Nepal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">
          <a class="dropdown-item " href="addproduct.php" data-target="#exampleModalCenter" data-toggle="modal">Add Products</a>
          <a class="dropdown-item " href="#">Update Products</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item " href="#">Delete Products</a>
        </div>
      </li>
    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0 text-white" type="submit">Search</button>
    </form>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <!-- dropdown  start -->
    <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Your Profile
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown--item" href="#">Details Profile</a>
    <a class="dropdown-item border-bottom" href="#">Edit Profiles</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
<!-- dropdown end -->
  </div>
</nav>
<!-- navbar end -->
<div class="jumbotron">
      <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
 Add Products
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form action="addproduct.php" method="get">
                <div class="form-group">
                    <label for="pname">Product Name</label>
                    <input type="text" name="name" placeholder="Enter product name here.." class="form-control">
                </div>
                <div class="form-group">
                    <label for="pname">Product Price</label>
                    <input type="text" name="price" placeholder="Enter product name here.." class="form-control">
                </div>
                <div class="form-group">
                    <label for="pname">Product Quantity</label>
                    <input type="text" name="quantity" placeholder="Enter product name here.." class="form-control">
                </div>
                <div class="form-group">
                    <label for="pname">Product Description</label>
                    <input type="text" name=" description" placeholder="Enter product name here.." class="form-control">
                </div>
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- table start -->
<div class="row mt-5">
  <div class="col-md-12">
    <table class="table table-bordered table-light table-striped shadow">
      <thead class="bg-dark text-white">
        <tr>
          <th>ID</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Description</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <?php 
    require_once 'config.php';
    $sql ="select * from productinfo";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res)){

     
      
      
      ?>
      
      <tbody>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['pname']; ?></td>
            <td><?php echo $row['pprice']; ?></td>
            <td><?php echo $row['pqty']; ?></td>
            <td><?php echo $row['pdesc']; ?></td>
            <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-primary" >Update</a></td>
            <td><a onclick ="return confirm('Are you sure want to delete')  " href="delete.php?id=<?php echo $row['id']; ?> "class="btn btn-danger">Delete</a></td>
          </tr>
      </tbody>
  <?php  } ?>
    </table>
  </div>
</div>
<!-- table end -->
</div>
<?php require_once 'bootstrap/js.php'; ?>
</body>
</html>
 