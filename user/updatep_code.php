<?php 
include('dbconnection.php'); 
session_start();
?>


<?php

if (isset($_POST['update_profilebtn'])) {
	
$uid=$_POST['uid'];
$un=$_POST['username'];
$ui=$_FILES['user_images']['name'];
$ue=$_POST['useremail'];
$upn=$_POST['userphone'];
$ua=$_POST['usera'];
$user_query="SELECT * FROM user WHERE id='$uid'";
$user_query_run=mysqli_query($conn,$user_query);
foreach ($user_query_run as $edit_row)
{
	if ($ui==NULL)
	{
		$image_data=$edit_row['image'];
	}
	else
	{
		if ($img_path="uploads/".$edit_row['image']) {
			unlink($img_path);
			$image_data=$ui;
		}
	}
}


 
 $p = "UPDATE user SET name='$un',email='$ue',phone='$upn',image='$image_data',address='$ua' WHERE id='$uid'";
$p_run=mysqli_query($conn,$p);
if($p_run)
{
 if ($ui==NULL)
 {
 	 $_SESSION['status']="User profile updated with same image";
   $_SESSION['status_code']="success";
header('location:index.php');
   
}
else
{ 
move_uploaded_file($_FILES["user_images"]["tmp_name"],"uploads/".$_FILES["user_images"]["name"]);
    $_SESSION['status']="User Profile updated";
    $_SESSION['status_code']="success";
header('location:index.php');

   
} }
else
{
	$_SESSION['status']="User profile not updated";
    $_SESSION['status_code']="error";
header('location:index.php');
} 
}



 ?>