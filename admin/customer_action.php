<?php 
session_start();
include('dbconnection.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>




<!-- DataTales Example -->


  

    <div >

      <?php 
$fs="SELECT * FROM services";
$fs_run=mysqli_query($conn,$fs);
if (mysqli_num_rows($fs_run)>0)
 { ?>

  <form >

      <table class="table table-bordered"   width="50%" cellspacing="0">
        <thead>
          <tr>
            <th># </th>
            <th>Service Name</th>
            <th>Price</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php
       while ($row_services=mysqli_fetch_array($fs_run)) 
  { 
    ?>
     <form method="post" action="customer_action.php?action=add&id=<?php echo $row_services["ser_id"]; ?>">

   <tr>
            <td width="10%"><?php echo $row_services['ser_id'] ?></td>
            <td width="15%"><?php echo $row_services['ser_name'] ?></td>
                 <td width="1%"><?php echo $row_services['ser_price'] ?></td>

            <input type="hidden" name="hidden_name" value="<?php echo $row_services['ser_name']; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $row_services['ser_price']; ?>" />

            
       <td width="5%">    
<!-- Button trigger modal -->
<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
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

</form>

<div style="clear:both"></div>
      <br />
      <h3>Order Details</h3>
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
          </tr>
          <?php
          if(!empty($_SESSION["shopping_cart"]))
          {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
          ?>
          <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td>$ <?php echo $values["item_price"]; ?></td>
            <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
            <td><a href="customer_action.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
          </tr>
          <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
          ?>
          <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right">$ <?php echo number_format($total, 2); ?></td>
            <td></td>
          </tr>
          <?php
          }
          ?>
            
        </table>
      </div>
    </div>


 
<div class="text-center">


 <input type="submit" name="submit[]" class="btn btn-success" value="submit">
<a href="customer.php" class="btn btn-danger">CLOSE</a>
</div>

</div>
  	 
</div>




<!-- /.container-fluid -->


<?php 


if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["ser_id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'     =>  $_GET["ser_id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    }
    else
    {
      echo '<script>alert("Item Already Added")</script>';
    }
  }
  else
  {
    $item_array = array(
      'item_id'     =>  $_GET["ser_id"],
      'item_name'     =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["item_id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="index.php"</script>';
      }
    }
  }
}

?>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>