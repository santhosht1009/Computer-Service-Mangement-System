<?php
session_start();
include('includes/header.php'); 

?>




<div class="container">
<div class="mb-3 text-center mt-5" style="font-size: 30px;">
<i class="fas fa-user-secret text-danger"></i>
    <span>Online Crime Managment System</span>
  </div>
  <p class="text-center" style="font-size: 20px;">  <span>User Registration
      Area</span>
  </p>
<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register Here!</h1>
              
              </div>

                <form class="user" action="ureg.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                    <input type="text" name="reg_name" class="form-control form-control-user" placeholder="Enter Username..." required="required">
                    </div>
                    <div class="form-group">
                    <input type="email" name="reg_email" class="form-control form-control-user" placeholder="Enter Email..." required="required">
                    </div>
                    <div class="form-group">
                    <input type="text" name="reg_phone" class="form-control form-control-user" placeholder="Enter phone number..." required="required">
                    </div>
                   
<div class="form-group">
                <label> Upload Image </label>
                <input type="file" name="reg_image"  class="form-control">
            </div>


                    <div class="form-group">
                    <input type="text" name="reg_address" class="form-control form-control-user" placeholder="Enter Your Address..." required="required">
                    </div>

                    <div class="form-group">
                    <input type="password" name="reg_password" class="form-control form-control-user" placeholder="Password" required="required">
                    </div>
            
                    <button type="submit" name="userreg_btn" class="btn btn-primary btn-user btn-block"> Sign Up </button>
                    <hr>
                </form>
                <p>Already have an account<a href="user_login.php">Login</a></p>
                <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
            to Home</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
</div>




<?php
include('includes/scripts.php'); 
?>