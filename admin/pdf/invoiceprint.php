<?php 
$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'csms');

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


$results1 = mysqli_query($conn,"SELECT * FROM user WHERE name='$name'");
$rows1 = mysqli_fetch_assoc($results1);
$inscad=$rows1['address'];
$insemail=$rows1['email'];
$insphone=$rows1['phone'];


}

require("fpdf184/fpdf.php");
$pdf=new FPDF('P','mm','A4');
$pdf->Addpage();




$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'CSMS',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'[Bangalore University,Jnanabharathi Campus]',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'[Bangalore, India, 560056]',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,$indt,0,1);//end of line

$pdf->Cell(130	,5,'Phone [+12345678]',0,0);
$pdf->Cell(25	,5,'Invoice #',0,0);
$pdf->Cell(34	,5,$inno,0,1);//end of line

$pdf->Cell(130	,5,'Fax [+12345678]',0,0);
$pdf->Cell(25	,5,'Customer ID',0,0);
$pdf->Cell(34	,5,$in_id,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$name,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$insemail,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$inscad,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$insphone,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Taxable',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query=mysqli_query($conn,"select * from invoice_services where inv_id = '".$_GET['GetID']."'");
$tax=0;
$amount=0;
while($item=mysqli_fetch_array($query)){
	$pdf->Cell(130	,5,$item['serv_name'],1,0);
	$pdf->Cell(25	,5,"0",1,0);
	$pdf->Cell(34	,5,number_format($item['serv_price']),1,1,'R');//end of line
	$amount+=$item['serv_price'];
}

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Subtotal',0,0);
$pdf->Cell(4	,5,"Rs",1,0);
$pdf->Cell(30	,5,number_format($amount),1,1,'R');//end of line




$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(4	,5,'Rs',1,0);
$pdf->Cell(30	,5,number_format($amount),1,1,'R');//end of line




















$pdf->output();


?>