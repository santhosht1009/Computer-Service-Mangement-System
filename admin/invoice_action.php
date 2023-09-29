<?php 
session_start();
include('dbconnection.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<?php

if (isset($_GET['GetID']) && $_GET['GetID']!=""){
  
$ser_id = $_GET['GetID'];
$result = mysqli_query($conn,"SELECT * FROM services WHERE ser_id='$ser_id'");
$row = mysqli_fetch_assoc($result);
$name = $row['ser_name'];
$ser_id = $row['ser_id'];
$price = $row['ser_price'];


$cartArray = array(
  $ser_id=>array(
  'name'=>$name,
  'ser_id'=>$ser_id,
  'price'=>$price)

);

if(empty($_SESSION["shopping_cart"])) {
  $_SESSION["shopping_cart"] = $cartArray;
    //Product is not Added to Cart. It will Add to Cart and Prevent page from refereshing
 echo "<script>
 return false;
 </script>";

}else{
  $array_keys = array_keys($_SESSION["shopping_cart"]);
  if(in_array($ser_id,$array_keys)) {
    echo "<script> alert('Product is Already added to your cart!');
    window.location.href='test3.php'; </script>";
    

  } else {
  $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
  //Product is not Added to Cart. It will Add to Cart and Prevent page from refereshing
      echo "<script>
      return false;
      </script>";

  }

  }
}
?>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Cart List</h5>
 
      </div>
      <div class="modal-body">
        <?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>
       <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
            <th scope="col">NAME</th>
      <th scope="col">PRICE</th>
      <th scope="col">SUBTOTAL</th>
    </tr>
  </thead>

  <?php   
foreach ($_SESSION["shopping_cart"] as $product){

  ?>
  <tbody>
    <tr>
     
      <td><?php echo $product["ser_id"]; ?></td>
      <td><?php echo $product["name"]; ?><br>
      </td>
       <td>
 <?php echo "Rs".$product["price"]; ?>
      </td>
      <td> <?php echo "Rs".$product["price"]; ?></td>
    </tr>
<?php $total_price += ($product["price"]);
 } 
 ?> <tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Rs".$total_price; ?></strong>
</td>
</tr>
  </tbody>
</table>
      </div>
        <?php
}else{
  echo "<h4 style='color:red; text-align:center;'>Your cart is empty!</h4>";
  }
?>                

      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" style="float: left;" data-dismiss="modal">
          <strong>Close</strong></button>
          <?php 
          if (!empty($_SESSION['shopping_cart'])) {
            # ser_id...
            echo " 
            
             <a href='cart.php'><button type='button' class='btn btn-warning btn-sm' title='Add/Remove Products'>
    <strong>Edit Cart</strong></button></a>
            ";
          }
          ?>
                
 
      </div>
    </div>
  </div>
</div>
</div>

















<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Customer Details

<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"> 

<i class="fas fa-cart-plus"></i>
                              <?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
echo  $cart_count; 
}
else echo "0";
?>                                               
            </button>

    </h6>

  </div>


  <div class="card-body">


<form action="invoice_code.php" method="POST">

<div class="form-row font-weight-bold">



    <div class="form-group col-md-4">
      <label>Name</label>

      <select name="cname" class="form-control">
        <option value="">SELECT CUSTOMER</option>

        <?php
$cn = mysqli_query($conn,"SELECT * FROM user");
    while ($cn_run=mysqli_fetch_assoc($cn)) 
  { 
    ?> 
        <option value="<?php echo $cn_run['name']; ?>"><?php echo  $cn_run['name']; ?></option>
<?php 
}
?>   </select>
       </div>
    <div class="form-group col-md-3">
      <label>Date</label>
      <input type="date" class="form-control" name="invoicedate" >
    </div>
    <div class="form-group col-md-3">
      <input type="hidden" class="form-control" name="invoicetotal" value="<?php echo $total_price ?>" >
      <input type="hidden" class="form-control" name="invoivestatus" value="Pending" >
    </div>
  </div>

<strong><h3 class="text-danger text-center">Service Details</h3></strong>

    <div class="table-responsive">

     <?php 
    
$fs="SELECT * FROM services";
$fs_run=mysqli_query($conn,$fs);
if (mysqli_num_rows($fs_run)>0)
 { ?>

  

      <table class="table table-bordered"   width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> # </th>
            <th>Name</th>
            <th>Price</th>
           <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
       while ($row_service=mysqli_fetch_assoc($fs_run)) 
  { 
    ?>
   <tr>
            <td width="10%"><?php echo $row_service['ser_id'] ?></td>
            <td width="15%"><?php echo $row_service['ser_name'] ?></td>
            <td width="20%"> <?php echo $row_service['ser_price'] ?> </td>
      
       <td width="5%">
           
<!-- Button trigger modal -->
<a href="invoice_action.php?GetID=<?php echo $row_service['ser_id'] ?>">Add to cart</a>
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

    <div class="align-left">

 
<input type="submit" name="invoicesubmit" class="btn btn-success ">



  </form>
  


</div>
<div class="align-right">
 <a href="customer.php"><button class="btn btn-danger">CLOSE</button></a>
</div>


  </div>
 
</div>

</div>
<!-- /.container-fluid -->














<?php
include('includes/scripts.php');
include('includes/footer.php');
?>