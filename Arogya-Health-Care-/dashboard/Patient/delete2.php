
<?php 
include("../inc/connect.php") ;
if(isset($_GET['id']))
      {
      	$fetch="SELECT * FROM addpayment WHERE id=".$_GET['id']."";
      	$q=mysqli_query($conn,$fetch) or die(mysqli_error($db_connect));
		$result=mysqli_fetch_array($q);
     //print_r($result['patient']); exit();
      	$sql="DELETE FROM addpayment WHERE  id=".$_GET['id']."";
      	//exit;
      	$write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));

     
header("location:paymenthistory.php?id=".$result['patient']);
      }
      else
      	echo "Not Sucess";
   ?>