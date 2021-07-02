<?php
include("../inc/connect.php") ;
if(isset($_POST['submit']))
      {
      	$set=$_POST['box'];
     //print_r($set); exit();
     foreach ($set as $k) {
     	$s="DELETE FROM patientregister WHERE  id='".$k."'";
     	//echo "string"; exit;
     	mysqli_query($conn,$s)or die (mysqli_error($db_connect));
     	
     }
       
      //print_r($sql);
       // $write=mysqli_fetch_array($sql) or die(mysqli_error($db_connect));
            
              header("location:patient.php");
      }
      else
        if(isset($_POST['active']))
      {
        $set=$_POST['box'];
     //print_r($set); exit();
     foreach ($set as $k) 
     {
      $s="UPDATE patientregister SET status='1' WHERE id='".$k."'";
  //echo $s; exit;
      mysqli_query($conn,$s)or die (mysqli_error($db_connect));
      
     }
       
      //print_r($sql);
       // $write=mysqli_fetch_array($sql) or die(mysqli_error($db_connect));
            
              header("location:patient.php");
      }
      else
        if(isset($_POST['inactive']))
      {
        $set=$_POST['box'];
     //print_r($set); exit();
     foreach ($set as $k) 
     {
      $s="UPDATE patientregister SET status='0' WHERE id='".$k."'";
  //echo $s; exit;
      mysqli_query($conn,$s)or die (mysqli_error($db_connect));
      
     }
       
      //print_r($sql);
       // $write=mysqli_fetch_array($sql) or die(mysqli_error($db_connect));
            
              header("location:patient.php");
      }
      else
        echo "Not Sucess";
?>