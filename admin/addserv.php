<?php 
include('dbconnection.php'); 
session_start();
?>



<!--Add police -->
 <?php
if(isset($_POST['servadd_btn']))
{
$sn=$_POST['serv_nam'];
$sd=$_POST['ser_des'];
$si=$_FILES['serv_img']['name'];
$sp=$_POST['serv_prices'];



if(file_exists("serviceimages/".$_FILES["serv_img"]['name']))
{
   $_SESSION['status']="Image Already Exists";
    $_SESSION['status_code']="error";
header('location:service.php'); 
}
else  { 
$s="INSERT INTO `services`(`ser_name`, `ser_description`, `ser_image`, `ser_price`) VALUES ('$sn','$sd','$si','$sp')";

$s_run=mysqli_query($conn,$s);
if($s_run)
{
    move_uploaded_file($_FILES["serv_img"]["tmp_name"],"serviceimages/".$_FILES["serv_img"]["name"]);
    $_SESSION['status']="Service Added Successfully";
    $_SESSION['status_code']="success";
header('location:service.php');
}
else
{
    $_SESSION['status']="Service Not Added";
    $_SESSION['status_code']="error";
header('location:service.php');
} 

}
}
?>