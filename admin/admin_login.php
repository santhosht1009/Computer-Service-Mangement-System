<?php
session_start();
include('includes/header.php'); 
?>




<div class="container">
<div class="mb-3 text-center mt-5" style="font-size: 30px;">
<i class="fas fa-user-secret text-danger"></i>
    <span>Computer Service Managment System</span>
  </div>
  <p class="text-center" style="font-size: 20px;">  <span>Admin Login
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
                <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
               
              </div>

                <form class="user" action="adminlogin.php" method="POST">

                    <div class="form-group">
                    <input type="text" name="admin_name" class="form-control form-control-user" placeholder="Enter Username..." required="">
                    </div>
                    <div class="form-group">
                    <input type="password" name="admin_password" class="form-control form-control-user" placeholder="Password" required="">
                    </div>
            <div class="text-right">
            <a href="#" data-toggle="modal" data-target="#forgotpass" >Forgot Password</a></div>
                    <button type="submit" name="adminlogin_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                </form>

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


<!-- Modal -->
<div class="modal fade" id="forgotpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">admin Password reset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="forget.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Email </label>
                <input type="email" name="resetemail" class="form-control" placeholder="Enter your Email">
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="resetpassword" class="form-control" placeholder="Enter your new Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="passresetbtn" class="btn btn-primary">RESET</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- end modal -->


<?php
include('includes/scripts.php'); 
?>