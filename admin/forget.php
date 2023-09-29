

<?php 
session_start();
$connection = mysqli_connect("localhost","root","","crms");
    
     $email = $_POST['resetemail'];
    $password = $_POST['resetpassword'];
    $confirm_password = $_POST['confirmpassword'];
    $query = " select * from admin_login where email='".$email."'";
    $result = mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($result))
    {
      $id=$row['id'];
        $applicant_email= $row['email'];
        $applicant_name = $row['name'];
       

    }

if(isset($_POST['passresetbtn']))
{

if($email===$applicant_email)
{
 if($password === $confirm_password)
 {
 $query1 = "UPDATE admin_login SET password='$password' WHERE email='".$email."'";
        $query1_run = mysqli_query($connection, $query1);
if ($query1_run)
  
  { 

 $_SESSION['status']="Password changed successfully";
    $_SESSION['status_code']="success";
header('location:admin_login.php');
}
else

{ 
      $_SESSION['status']="Password changed not successfully";
    $_SESSION['status_code']="error";
header('location:admin_login.php');

}

 }
  else 
    {
            $_SESSION['status']="Password & Confirm Password is not matching";
    $_SESSION['status_code']="error";
header('location:admin_login.php');
    }
}
else
{
  
      $_SESSION['status']="Email is Invalid";
    $_SESSION['status_code']="error";
header('location:admin_login.php');
}

}

?>