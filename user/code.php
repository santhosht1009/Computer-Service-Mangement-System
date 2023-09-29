<?php 
include('dbconnection.php'); 
session_start();
?>


<!-- user login -->
<?php
if(isset($_POST['userlogin_btn']))
{
    $user_email=$_POST['user_email'];
    $loginpass=$_POST['user_password'];
    $ul="SELECT * FROM user WHERE email='$user_email' AND password='$loginpass' ";
    $ul_run=mysqli_query($conn,$ul);
    $num=mysqli_fetch_array($ul_run);
    if($num>0)
    {

        $_SESSION['username']=$user_email;
        $_SESSION['id']=$num['id'];
        $_SESSION['image']=$num['image'];
$_SESSION['name']=$num['name'];
        header('location:index.php');
    }
    else
    {
        $_SESSION['status']="Username/Password is Invalid";
    $_SESSION['status_code']="error";
header('location:user_login.php');
    }
}
?>
<!-- user Registration -->
<?php
if(isset($_POST['userreg_btn']))
{
$name=$_POST['reg_name'];
$email=$_POST['reg_email'];
$regphone=$_POST['reg_phone'];
$reg_password=$_POST['reg_password'];
$ru = "INSERT INTO user(`name`,`email`,`phone`,`password`) VALUES ('$name','$email','$regphone','$reg_password')";
$ru_run=mysqli_query($conn,$ru);
if($ru_run)
{
    $_SESSION['status']=" Registration Successfull Please Login to your Account";
    $_SESSION['status_code']="success";
header('location:user_login.php');
}
else
{
    $_SESSION['status']="Registration not Successfull";
    $_SESSION['status_code']="error";
header('location:user_register.php');
}
}
?>

<?php 

$cid="SELECT complaint_id FROM complaint ORDER BY complaint_id desc";
$rcid=mysqli_query($conn,$cid);
$data=mysqli_fetch_array($rcid);
$lastid=$data['complaint_id'];
if(empty($lastid))
{
  $complaintid="CID001";
}
else
{
$complaintid=substr($lastid,5);
$complaintid=intval($complaintid);
$complaintid="CID00".($complaintid+1);
}

?>

<?php 
$currentDateTime = date('Y-m-d H:i:s');

if (isset($_POST['complaint_btn'])) {
$cps=$_POST['complaint_ps'];
$cct=$_POST['complaint_crimetype'];
$can=$_POST['accused_name'];
$cn=$_POST['victim_name'];
$cpn=$_POST['victim_pno'];
$ce=$_POST['victim_email'];
$ca=$_POST['complaint_address'];
$cr=$_POST['relation'];
$cd=$currentDateTime;
$cp=$_POST['purpose'];
$uid=$_POST['crime_id'];
$c_id=$complaintid;
$c_status=$_POST['complaint_status'];

$crf = "INSERT INTO complaint(`ps`,`crime_type`,`accused_name`,`name`,`phone_no`,`applicant_email`,`address`,`relation`,`date_complaint`,`purpose`,`user_id`,`complaint_id`,`case_status`) VALUES ('$cps','$cct','$can','$cn','$cpn','$ce','$ca','$cr','$cd','$cp','$uid','$c_id','$c_status')";
$crf_run=mysqli_query($conn,$crf);
if($crf_run)
{
    $_SESSION['status']=" Your Complaint Request has been send to us  and your complaint id is $c_id We will Contact you Soon";
    $_SESSION['status_code']="success";
header('location:complaint.php');
}
else
{
    $_SESSION['status']="Complaint not registered Successfully";
    $_SESSION['status_code']="error";
header('location:complaint.php');
}


}


?>

<!--  delete complaint-->
<?php 
if (isset($_POST['delete_complaint'])) {
    $id=$_POST['complaint_id'];
    $cdq="DELETE FROM complaint WHERE id='$id'";
    $cdq_run=mysqli_query($conn,$cdq);
if($cdq_run){
    $_SESSION['status']="Deleted Successfully";
    $_SESSION['status_code']="success";
header('location:complaint.php');
}
else
{
    $_SESSION['status']="Police Data is not Deleted";
    $_SESSION['status_code']="error";
header('location:complaint.php');
}

}


?>