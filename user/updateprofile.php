<?php 
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<?php
  require_once("dbconnection.php");
    $id = $_GET['UpdateId'];
    $query = " select * from user where email='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
      $id=$row['id'];
       $uname=$row['name'];
       $uemail=$row['email'];
       $upn=$row['phone'];
       $ua=$row['address'];
    }

?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Update Profile
    </h6>
  </div>
</div>
  <div class="card-body">
<form action="updatep_code.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="uid" value="<?php echo $id ?>">

    <div class="form-group col-md-4 font-weight-bold"><label>Name</label>
      <input type="text" class="form-control" name="username" value="<?php echo $uname ?>" readonly>
    </div>
  
      

     <div class="form-group col-md-4 font-weight-bold">
      <label>Email</label>
      <input type="text" class="form-control" name="useremail" value="<?php echo $uemail ?>">
    </div>	
 
   
    <div class="form-group col-md-4 font-weight-bold">
      <label>Phone Number</label>
      <input type="text" class="form-control" name="userphone" value="<?php echo $upn ?>">
    </div>
    
    <div class="form-group col-md-4 font-weight-bold">
      <label>Address</label>
      <input type="text" class="form-control" name="usera" value="<?php echo $ua ?>">
  </div>
  
    <div class="form-row font-weight-bold">
   <div class="form-group col-md-3">
                <label> Upload Image </label>
                <input type="file" name="user_images"  class="form-control">
            </div> 
          </div>
 
 
<div class="text-center">
<a href="index.php" class="btn btn-danger">CLOSE</a>
	<button type="submit" name="update_profilebtn" class="btn btn-primary">UPDATE</button>
</div>
</form>
  	 
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>