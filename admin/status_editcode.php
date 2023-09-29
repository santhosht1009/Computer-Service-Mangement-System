<?php 
include('dbconnection.php'); 
session_start();

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