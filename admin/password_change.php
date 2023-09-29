<?php 
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<?php
require_once("dbconnection.php"); 
$id=$_GET['GetID'];
 ?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Change Password
    </h6>
  </div>
</div>
  <div class="card-body">
<form action="edit.php" method="POST">

<input type="hidden" name="adminname" class="form-control" value="<?php echo $id ?>">
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="apassword" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
<div class="text-center">
<a href="completed_chargesheet.php" class="btn btn-danger">CLOSE</a>
<button type="submit" name="change_password" class="btn btn-primary">UPDATE</button>
</div>
</form>
  	 
</div>

</div>
<!-- /.container-fluid -->





<?php
include('includes/scripts.php');
include('includes/footer.php');
?>