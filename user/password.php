<?php
session_start();
include('dbconnection.php'); 

?>
<?php

if(isset($_POST['change_password']))

    $email=$_POST['useremail'];
$pass=$_POST['apassword'];
$cpass=$_POST['confirmpassword'];
{

 if($pass === $cpass)
 {
 $query1 = "UPDATE user SET password='$pass' WHERE email='".$email."'";
        $query1_run = mysqli_query($conn, $query1);
if ($query1_run)
  
  { 

 $_SESSION['status']="Password changed successfully";
    $_SESSION['status_code']="success";
header('location:index.php');
}
else

{ 
      $_SESSION['status']="Password changed not successfully";
    $_SESSION['status_code']="error";
header('location:index.php');

}
}
else
 {
    $_SESSION['status']="Password not matching";
    $_SESSION['status_code']="error";
header('location:index.php');
 }   
}

?>
