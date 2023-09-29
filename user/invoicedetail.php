<?php
session_start();
include('dbconnection.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

$user=$_SESSION['name'];
?>





<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Invoice Details      
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php 
$fc="SELECT * FROM invoice WHERE inv_cname='$user'";
$fc_run=mysqli_query($conn,$fc);
if (mysqli_num_rows($fc_run)>0)
 { ?>

  

      <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Invoice ID </th>
            <th>Name</th>
            
            <th>Total</th>
            <th>Status</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php
       while ($row_invoice=mysqli_fetch_assoc($fc_run)) 
  { 



    ?>
   <tr>
            <td width="10%"><?php echo $row_invoice['inv_no'] ?></td>
            <td width="15%"><?php echo $row_invoice['inv_cname'] ?></td>
            <td width="15%"><?php echo $row_invoice['inv_total'] ?></td>

            <?php
if ($row_invoice['inv_status']=="Pending") {
  # code...?>

            <td width="15%" > 
<span class="rounded-pill badge badge-danger ml-4"><?php echo $row_invoice['inv_status'] ?></span>
            </td>
<?php } else if ($row_invoice['inv_status']=="Checking")
{ ?>
  <td width="15%" ><span class="rounded-pill badge badge-primary ml-4"><?php echo $row_invoice['inv_status'] ?></span></td>
<?php }

        else {  ?>

        <td width="15%" ><span class="rounded-pill badge badge-success ml-4"><?php echo $row_invoice['inv_status'] ?></span></td>
<?php }   ?>



       <td width="5%">    
<!-- Button trigger modal -->
<?php if ($row_invoice['inv_status']=="Done") { ?>

  <a href="pdf/invoiceprint.php?GetID=<?php echo $row_invoice['inv_id'] ?> ">  <i class="fas fa-eye"></i> </a>
 
 <?php
}  else { ?>

<a href="invoicependingview.php?GetID=<?php echo $row_invoice['inv_id'] ?> ">  <i class="fas fa-eye"></i> </a>
<?php }  ?>



 

            </td>
          </tr>

       <?php   
  }
  
  ?> 
        </tbody>
      </table>
 <?php
}

else
  {
    echo "No record found";
  }
?>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->







<?php
include('includes/scripts.php');
include('includes/footer.php');
?>