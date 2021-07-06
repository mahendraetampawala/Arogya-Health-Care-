<?php 
include("../inc/connect.php") ;
if(isset($_GET['Workid']))
      {
      	$sql="DELETE FROM patientregister WHERE Workid=".$_GET['Workid']."";
      	//exit;
      	$write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
            
              header("location:staff.php");
      }
      else
      	echo "Deleting Unsucessfull";
   ?>