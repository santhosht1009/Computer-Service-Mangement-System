<?php 
include('dbconnection.php'); 
session_start();
?>

<?php 

$iid="SELECT inv_no FROM invoice ORDER BY inv_no desc";
$riid=mysqli_query($conn,$iid);
$data=mysqli_fetch_array($riid);
$lastid=$data['inv_no'];
if(empty($lastid))
{
  $invoiceid="CRSINVNO001";
}
else
{
$invoiceid=substr($lastid,11);
$invoiceid=intval($invoiceid);
$invoiceid="CRSINVNO00".($invoiceid++);
}

?>

<?php
if(isset($_POST['invoicesubmit']))
{
    $invid=$invoiceid;
$cname=$_POST['cname'];
$invdate=$_POST['invoicedate'];
$invstatus=$_POST['invoivestatus'];
$invtotal=$_POST['invoicetotal'];

$iiv="INSERT INTO `invoice`(`inv_no`, `inv_cname`, `inv_date`, `inv_status`, `inv_total`) VALUES ('$invid','$cname','$invdate','$invstatus','$invtotal')";

$iiv_run=mysqli_query($conn,$iiv);
if($iiv_run)
{
    $inv_id=mysqli_insert_id($conn);
$is="INSERT INTO `invoice_services`(`inv_id`, `serv_name`, `serv_id`, `serv_price`) VALUES (?,?,?,?)";
$stmt=mysqli_prepare($conn,$is);
if ($stmt) {
    mysqli_stmt_bind_param($stmt,"isii",$inv_id,$name,$ser_id,$price);
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        
        $name=$value['name'];

        $ser_id=$value['ser_id'];
        $price=$value['price'];

        mysqli_stmt_execute($stmt);
    }
    unset($_SESSION['shopping_cart']);
    $_SESSION['status']=" Invoice generates Successfully And Your Invoice no is $invid";
    $_SESSION['status_code']="success";
header('location:customer.php');
}

else
{
   $_SESSION['status']="SQL Query prepared error";
    $_SESSION['status_code']="error";
header('location:test3.php'); 
}



    $_SESSION['status']=" Invoice generates Successfully And Your Invoice no is $invid";
    $_SESSION['status_code']="success";
header('location:customer.php');
}
else
{

    $_SESSION['status']="Invoice Not generates Successfully";
    $_SESSION['status_code']="error";
header('location:test3.php');
}
}
?>






<!-- update status -->



<?php 


if(isset($_POST['invoiceeditsubmit']))

    $ivid=$_POST['inid'];
$ists=$_POST['instts'];
{

 $query1 = "UPDATE invoice SET inv_status='$ists' WHERE inv_id='".$ivid."'";
        $query1_run = mysqli_query($conn, $query1);
if ($query1_run)
  
  { 

echo "<script> alert('Status Updates Successfully!');
    window.location.href='customer.php'; </script>";
}
else

{ 
   echo "<script> alert('Status Not Updated successfully');
    window.location.href='invoice_edit.php'; </script>";

}
 
}

?>
