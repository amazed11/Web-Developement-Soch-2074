<?php 

require_once 'config.php';
session_start();
if(isset($_POST['query'])){
  $output ='';
  $searchvalue=$_POST['query'];
  $sql="select * from productinfo where pname like '%".$searchvalue."%' or pprice like '%".$searchvalue."%' ";
}
else{
  $sql="select * from productinfo";
}
$fire=mysqli_query($con,$sql);
if(mysqli_num_rows($fire) > 0){
$output =
'<thead class="bg-dark text-white">
<tr>
  <th>ID</th>
  <th>Product Name</th>
  <th>Price</th>
  <th>Quantity</th>
  <th>Description</th>
  <th>Update</th>
  <th>Delete</th>
</tr>
</thead> <tbody>';
while($row=mysqli_fetch_array($fire)){
$output .='
<tr>
      <td>'.$row['id'].'</td>
      <td>'.$row['pname'].'</td>
      <td>'.$row['pprice'].'</td>
      <td>'.$row['pqty'].'</td>
      <td>'.$row['pdesc'].'</td>
      <td><a href="update.php?id='.$row['id'].'" class="btn btn-primary">Update</a></td>
      <td><a onclick=" return confirm("Are you sure want to delete?")" href="delete.php?id='.$row['id'].'" class="btn btn-danger">Delete</a></td>
</tr>

';

}
$output .="</tbody>";
echo "$output";
}

else{
  echo "<h1 class='bg-dark text-white text-center'>No records found</h1>";
}


?>