<?php 
include('dbconnection.php'); 
session_start();
?>



<!--Add police -->
 <?php
if(isset($_POST['userreg_btn']))
{
$un=$_POST['reg_name'];
$ue=$_POST['reg_email'];
$up=$_POST['reg_phone'];
$ui=$_FILES['reg_image']['name'];
$ua=$_POST['reg_address'];
$upass=$_POST['reg_password'];


if(file_exists("uploads/".$_FILES["reg_image"]['name']))
{
   $_SESSION['status']="Image Already Exists";
    $_SESSION['status_code']="error";
header('location:user_register.php'); 
}
else  { 
$u="INSERT INTO user( `name`, `email`, `phone`, `image`, `address`, `password`) VALUES ('$un','$ue','$up','$ui','$ua','$upass')";

$u_run=mysqli_query($conn,$u);
if($u_run)
{
    move_uploaded_file($_FILES["reg_image"]["tmp_name"],"upload/".$_FILES["reg_image"]["name"]);
    $_SESSION['status']="Registration Successfull Login to Your Account";
    $_SESSION['status_code']="success";
header('location:user_login.php');
}
else
{
    $_SESSION['status']="User Registration failed Try Again";
    $_SESSION['status_code']="error";
header('location:user_register.php');
} 

}
}
?>