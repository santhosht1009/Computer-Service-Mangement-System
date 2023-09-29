<?php 
session_start();
include('dbconnection.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>



<?php 
if (isset($_GET['GetID']) && $_GET['GetID']!=""){
  
$in_id = $_GET['GetID'];
$result = mysqli_query($conn,"SELECT * FROM invoice WHERE inv_id='$in_id'");
$row = mysqli_fetch_assoc($result);
$inno=$row['inv_no'];
$name = $row['inv_cname'];
$indt = $row['inv_date'];
$stts = $row['inv_status'];
$ttl=$row['inv_total'];

$ins_id = $_GET['GetID'];
$results = mysqli_query($conn,"SELECT * FROM invoice_services WHERE inv_id='$ins_id'");
$rows = mysqli_fetch_assoc($results);
$insnm=$rows['serv_name'];
$insprc=$rows['serv_price'];

}

 ?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Customer Details

    </h6>

  </div>


  <div class="card-body">


<form action="status_editcode.php" method="POST">

<div class="form-row font-weight-bold">



    <div class="form-group col-md-4">
      <label>Name</label>
<input type="hidden" name="inid" value="<?php echo $in_id ?>">
  <input type="text" class="form-control" name="invoicename" value="<?php echo $name ?> " readonly>
       </div>
    <div class="form-group col-md-3">
      <label>Date</label>
      <input type="text" class="form-control" name="invoicedate" value="<?php echo $indt ?>" readonly>
    </div>
  </div>

<strong><h3 class="text-danger text-center">Service Details</h3></strong>

    <div class="table-responsive">

     <?php 
    
$fs="SELECT * FROM invoice_services WHERE inv_id='$ins_id'";
$fs_run=mysqli_query($conn,$fs);
if (mysqli_num_rows($fs_run)>0)
 { ?>

  

      <table class="table table-bordered"   width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> # </th>
            <th>Name</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?php
       while ($row_service=mysqli_fetch_assoc($fs_run)) 
  { 
    ?>
   <tr>
            <td width="10%"><?php echo $row_service['serv_id'] ?></td>
            <td width="15%"><?php echo $row_service['serv_name'] ?></td>
            <td width="20%"> <?php echo $row_service['serv_price'] ?> </td>
      
          </tr>

       <?php   
  }
  
  ?> 
        </tbody>
        <tfoot>
           <tr class="bg-foot" >
            <th class="text-right" colspan="4" width="10%">Total</th>
            <th class="text-right" id="sub_total" width="10%"><?php echo number_format($ttl) ?></th>
          </tr>

        </tfoot>
      
      </table>
     
 <?php
}

else
  {
    echo "No record found";
  }
?>

    </div>



<div class="form-row font-weight-bold">
    <div class="form-group col-md-3">
      <label>Status</label>

      <select name="instts" class="form-control">

<?php if ($stts=="Pending") { ?>
<option>Pending</option>
 <option value="Checking">Checking</option>
        

    <?php } else{ ?>

     <option value="">Checking</option>
        <option value="Done">Done</option> 
 <?php    }


     ?>  
       
      </select>
    </div>
    
  </div>


  </div>
   

 
</div>

<input type="submit" name="invoiceeditsubmit" class="btn btn-success">

  </form>
 
 <a href="customer.php"><button class="btn btn-danger">CLOSE</button></a>

</div>
<!-- /.container-fluid -->













<?php
include('includes/scripts.php');
include('includes/footer.php');
?>