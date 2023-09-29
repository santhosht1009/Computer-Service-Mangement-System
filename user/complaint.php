<?php

include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<?php
$host="localhost";
$user="root";
$pass="";
$database="crms";
$dbc=mysqli_connect($host,$user,$pass,$database); ?>
<?php
$ps_query="SELECT  psname FROM ps";
$rps_query=mysqli_query($dbc,$ps_query);
$options="";
while ($psrow=mysqli_fetch_array($rps_query)) {
  $options=$options."<option>".$psrow['psname']."</option>";
}
 ?>
<?php
$cc_query="SELECT  crimename FROM crime";
$rcc_query=mysqli_query($dbc,$cc_query);
$options1="";
while ($ccrow=mysqli_fetch_array($rcc_query)) {
  $options1=$options1."<option>".$ccrow['crimename']."</option>";
}
 ?>

<?php 

    $id = $_SESSION['id'];
    $query = " select * from user where id='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
      $id=$row['id'];
        $applicant_email= $row['email'];
        $applicant_name = $row['name'];
        $applicant_phn = $row['phone'];

    }

?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Complaint Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-row">
                  <div class="form-group col-md-6">
                   
         <label>Police Station</label>
          <select name="complaint_ps" class="form-control">
           <option hidden="true" disabled selected>Select Police Station</option>
          <?php 
          echo $options;
             ?>
            </select>
              </div>
                 <div class="form-group col-md-6">  
         <label>Crime Category</label>
          <select  name="complaint_crimetype" class="form-control">
           <option hidden="true" disabled selected>Select Crime type</option>
          <?php 
          echo $options1;
             ?>
            </select>
              </div>
                </div> 
                <div class="form-group">
                <label> Accused name </label>
                <input type="text" name="accused_name" class="form-control" placeholder="Enter Accused name" required="required">
            </div>
            <strong><h3 class="text-danger">Applicants Details(Victims)</h3></strong>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" name="victim_name" class="form-control" value="<?php echo $applicant_name ?>" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Phone No</label>
                    <input type="text" name="victim_pno" class="form-control" value="<?php echo $applicant_phn ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="victim_email" class="form-control" value="<?php echo $applicant_email ?>" readonly>
                  </div>
                 <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" name="complaint_address" id="address" rows="3" ></textarea>
  </div>     

  <div class="form-group">
                <label>Relation with accused</label>
                <input type="text" name="relation" class="form-control" placeholder="Enter relationship" required="required">
            </div>
           
             <div class="form-group">
                <label> Purpose of Fir </label>
                <input type="text" name="purpose" class="form-control" placeholder="Enter purpose" required="required">
            </div>

</div>
<input type="hidden" name="complaint_status" value="Not yet Updated">
 <input type="hidden" name="crime_id" value="<?php echo $_SESSION['id']; ?>">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="complaint_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Complaint Details
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add complaint
            </button>
    </h6>
  </div>

  <div class="card-body">

     <div class="table-responsive">

     <?php 
     $userlog_ig=$_SESSION['id'];
$fuc="SELECT * FROM complaint WHERE user_id='$userlog_ig'";
$fuc_run=mysqli_query($conn,$fuc);
if (mysqli_num_rows($fuc_run)>0)
 { ?>

  

      <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Id </th>
            <th> Crime type </th>
            <th>Name </th>
            <th>Complaint Date</th>
            <th>Complaint Status</th>
            <th>Charge sheet Status</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
       while ($row_complaint=mysqli_fetch_assoc($fuc_run)) 
  { ?>
   <tr>
            <td width="10%"><?php echo $row_complaint['id'] ?></td>
            <td width="15%"><?php echo $row_complaint['crime_type'] ?></td>
            <td width="20%"> <?php echo $row_complaint['name'] ?> </td>
            <td width="15%"> <?php echo $row_complaint['date_complaint'] ?> </td>
            <td width="15%" class="font-weight-bold"> <?php echo $row_complaint['case_status'] ?> </td>
            <td width="15%" class="font-weight-bold"> <?php echo $row_complaint['chargesheet_status'] ?> </td>
            <td width="5%">
           
     
          <form action="code.php" method="POST" class="d-inline">
            <input type="hidden" name="complaint_id" value="<?php echo $row_complaint['id'] ?>">
            <button type="submit" class="btn btn-danger" name="delete_complaint" ><i class="far fa-trash-alt"></i></button></form>
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