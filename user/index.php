<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<?php
$id=$_SESSION['id'];
 $sql = "SELECT * FROM user WHERE id='$id'";
 $result = $conn->query($sql);
$row_complaint=mysqli_fetch_assoc($result);
  $totalnew =$result->num_rows;
  ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   
  </div>

  <!-- Content Row -->
  <div class="row">

<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total COMPLAINTS</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">


               <h4><?php echo $totalnew ?></h4>

              </div>
            </div>
            <div class="col-auto">
              
              <i class="fas fa-fw fa-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>