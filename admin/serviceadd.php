<?php 
session_start();
include('dbconnection.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>




<!-- DataTales Example -->


  

 


<div class="container">
  <div class="row">
    <div class="col-lg-3">
      




   <div >

      <?php 
$fs="SELECT * FROM services";
$fs_run=mysqli_query($conn,$fs);
if (mysqli_num_rows($fs_run)>0)
 { 
       while ($row_services=mysqli_fetch_array($fs_run)) 
    { 
    ?>

            <form  action="manage_serviceadd.php" method="POST">


             <div class="w3-card-4">

            <header class="w3-container">
               <h3><?php echo $row_services['ser_name'] ?></h3>
                  </header>

                      <div class="w3-container">
                <hr>
                
                <?php echo '<img src="serviceimages/'.$row_services['ser_image'].'" width="100px;" height="100px;" alt="Avatar"  class="w3-left w3-circle">' ?>
                      <p><?php echo $row_services['ser_description'] ?></p>
                </div>
                  <input type="hidden" name="hidden_name" value="<?php echo $row_services['ser_name']; ?>" />
 
                 <input type="hidden" name="hidden_price" value="<?php echo $row_services['ser_price']; ?>" />


                   <input type="submit" name="add_to_cart"  class="w3-button w3-block w3-dark-grey" value="Add to Cart" />
                   </div>



                    </div>
  </div>
</div>

 <?php
   }
  }
?>




   
  

</form>
     
</div>




<!-- /.container-fluid -->




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>