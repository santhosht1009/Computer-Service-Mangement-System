<?php 
include('dbconnection.php'); 
session_start();


?>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{


	if (isset($_POST["add_to_cart"])) 
	{
		if (isset($_SESSION['cart'])) 
		{
			$myitems=array_column($_SESSION['cart'],'service_name');
			if (!in_array($_POST['hidden_name'],$myitems)) {


				$count=count($_SESSION['cart']);
			$_SESSION['cart'][$count]=array('service_name' =>$_POST['hidden_name'] ,'service_price' =>$_POST['hidden_price']);
			print_r($_SESSION['cart']);
				
			}

			else
			{
				echo "<script>alert('Service already Added');
				window.location.href='serviceadd.php';
				</script>";
			}



			
			
		}
		else
		{
			$_SESSION['cart'][0]=array('service_name' =>$_POST['hidden_name'] ,'service_price' =>$_POST['hidden_price']);
			print_r($_SESSION['cart']);
		}


	}

}




	?>