
<?php
  session_start(); 
 ?>
<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php

include("../inc/connect.php") ;
$query=mysqli_query($conn,"SELECT `loginid`,`patientname`,`mobileno` FROM patient")or die (mysqli_error($db_connect));
$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
//echo $numrows; exit;
    $data = array();
    while ($row = mysqli_fetch_assoc($query)) {
      $data[]=$row;
       
    }
$row1=$data;  

//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error());
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Staff
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Staff ID's</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">New Staff Member ID's</h3>
      </div>
        
      <style>
.idform input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.idform input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.idform input[type=submit]:hover {
  background-color: #45a049;
}

.idform {
  border-radius: 5px;
  
  padding: 20px;
}
</style>
 
<div class="idform">
  <form class="myform" action="staffid.php" method="post" enctype="multipart/form-data">
    <label for="ID">ID</label>
    <input type="text" id="ID" name="ID" placeholder="WorkID" required>
  
    <input type="submit" value="Submit" name="submit_btn">
  </form>
</div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  


        
        </div>
      </div>       
      </div>
    </section>
  </div>
    <?php
      if(isset($_POST['submit_btn']))
      {
       
        $id = $_POST['ID'];
       

       
        
        
          $query= "select * from workid WHERE Workid='$id'";
          $query_run = mysqli_query($conn,$query);
          
          if(mysqli_num_rows($query_run)>0)
          {
            echo '<script type="text/javascript"> alert("ID Already Exists...Try another Email")</script>';
          }
          else
          {

            $logininfor=mysqli_query($conn,"INSERT INTO workid(`Workid`)VALUES('$id')");
        


            if($logininfor)
            {
              echo '<script type="text/javascript"> alert(" Id added.."); </script>';
             
            }
            else
            {
              echo '<script type="text/javascript"> alert("Error!") </script>';
            }
          } 
            
         
        }  
    ?>


 <?php include"../Include/footer.php";?>