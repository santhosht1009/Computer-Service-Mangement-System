<?php 
include('dbconnection.php'); 
session_start();
?>





<!-- admin login -->
<?php
if(isset($_POST['adminlogin_btn']))
{
    $admin_name=$_POST['admin_name'];
    $pass=$_POST['admin_password'];
    $al="SELECT * FROM admin WHERE admin_name='$admin_name' AND admin_password='$pass' ";
    $al_run=mysqli_query($conn,$al);
    if(mysqli_fetch_array($al_run))
    {
        $_SESSION['username']=$admin_name;
        header('location:index.php');
    }
    else
    {
        $_SESSION['status']="Username/Password is Invalid";
    $_SESSION['status_code']="error";
header('location:admin_login.php');
    }
}

?>