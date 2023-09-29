<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Complaint Details
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

     <?php 
     $policelog_ps=$_SESSION['username'];
$fpuc="SELECT * FROM complaint WHERE applicant_email='$policelog_ps'";
$fpuc_run=mysqli_query($conn,$fpuc);
if (mysqli_num_rows($fpuc_run)>0)
 { ?>

  

      <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> # </th>
            <th>Complaint No</th>
            <th> Crime type </th>
            <th>Name(s)</th>
            <th>Email</th>
            <th>Complaint Date</th>
            <th>Status</th>
           
          </tr>
        </thead>
        <tbody>
          <?php
       while ($row_complaint=mysqli_fetch_assoc($fpuc_run)) 
  { 
if ($row_complaint['case_status']=="Approved") {
  


    ?>
   <tr>
            <td width="10%"><?php echo $row_complaint['id'] ?></td>
            <td width="15%"><?php echo $row_complaint['complaint_id'] ?></td>
            <td width="20%"> <?php echo $row_complaint['crime_type'] ?> </td>
            <td width="15%"> <?php echo $row_complaint['name'] ?> </td>
           <td width="15%"> <?php echo $row_complaint['applicant_email'] ?> </td>
           <td width="15%"> <?php echo $row_complaint['date_complaint'] ?> </td>
           <td width="15%" class="font-weight-bold"> <?php echo $row_complaint['chargesheet_status'] ?> </td>
      
          </tr>

       <?php   
  }}
  
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