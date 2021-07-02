<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
include("../inc/connect.php") ;

//session_start();
$sql="SELECT * FROM addpayment WHERE id='".$_GET['id']."'";
//SELECT `id`, `invoice`,`depositammount`,`date` FROM addpayment
$write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
// print_r($sql); exit;
$row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
$date=$row['date'];
$invoice =$row['invoice'];
$subtotal=$row['subtotal'];
$depositammount =$row['depositammount'];

//print_r($row1); exit;
//echo "$depositammount"; exit();
?>
<?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['submit']))
{	
$invoice=$_POST['invoice'];
$subtotal=$_POST['subtotal'];
$depositammount=$_POST['depositammount'];
$d1=date('Y-m-d');
//$date=$_POST['date'];
//$id=$_GET['id'];

$query=mysqli_query($conn,"UPDATE addpayment SET invoice='$invoice',subtotal='$subtotal',depositammount='$depositammount',date='$d1' WHERE id='".$_GET['id']."'") or die(mysqli_error($db_connect));
 	echo "<script>alert('Records Successfully Updated..');</script>";
	 //  	$fetch="SELECT * FROM addpayment WHERE id=".$_GET['id']."";
  //     	$q=mysqli_query($conn,$fetch) or die(mysqli_error($db_connect));
		// $result=mysqli_fetch_array($q);
		// header("location:paymenthistory.php?id=".$result['patient']);
}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Edit Deposit<small> </small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit deposit</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-md-12">	
<div class="box box-primary">
<div class="box-header with-border">
<i class=""></i> <h3 class="box-title">Edit Deposit</h3><br><br>

	<form method="POST" >
		<div class="form-group">
<label for="exampleInputPassword1">Date</label>
<input type="date" name="date" value="<?php echo $date;?>" class="form-control" >
</div>
	
<div class="form-group">
<label for="exampleInputPassword1">Invoice</label>
<input type="text" name="invoice" value="<?php echo $invoice;?>"  class="form-control">
</div>

<div class="form-group">
<label for="exampleInputPassword1">Bill Ammount</label>
<input type="text" name="subtotal" value="<?php echo $subtotal;?>"  class="form-control">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Deposit Amount</label>

<input type="text" name="depositammount" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $depositammount; ?>" >
</div>
<div class="form-group">
<button type="submit" name="submit" class="btn btn-primary">update</button>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
</div>

<?php include "../Include/footer.php";?>