<?php
session_start();
include('dbconnection.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="user" action="addserv.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="serv_nam" class="form-control" placeholder="Enter Service Name">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="ser_des" rows="5" cols="40" class="form-control"></textarea>
            </div>
           <div class="form-group">
                <label>Image</label>
                <input type="file" name="serv_img" class="form-control">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="serv_prices" class="form-control" placeholder="Enter Service Price">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="servadd_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Service Details 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addps">
              Add Services
            </button>
    </h6>
  </div>

  <div class="card-body">


  <div class="table-responsive">

      <?php 
$serv="SELECT * FROM services";
$serv_run=mysqli_query($conn,$serv);
if (mysqli_num_rows($serv_run)>0)
 { ?>

  

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Name </th>
            <th>Description </th>
            <th>Image </th>
            <th>Price </th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php
       while ($row_serv=mysqli_fetch_assoc($serv_run)) 
  { ?>
   <tr>
            <td><?php echo $row_serv['ser_name'] ?></td>
            <td><?php echo $row_serv['ser_description'] ?></td>
            <td> <?php echo '<img src="serviceimages/'.$row_serv['ser_image'].'" width="100px;" height="100px;" alt="Image">' ?></td>
           <td> <?php echo $row_serv['ser_price'] ?> </td> 
           
            <td>
          <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value=""><button type="submit" class="btn btn-danger" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>
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


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>