
<?php
  session_start(); 
 ?>
<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php

include("../inc/connect.php") ;
$query=mysqli_query($conn,"SELECT `NIC`,`patientname`,`mobileno`,`gender` FROM patient")or die (mysqli_error($db_connect));
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
        Patients
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient - List</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Patient list</h3>
      </div>
         
  

 

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
<!--    <td>
<button type="button" class="btn btn-default">Copy</button>
</td> -->
<td>

<a class="popup" onclick="myFunction()"> <button type="button" class="btn btn-default">Excel</button></a>
</td>&nbsp;&nbsp;&nbsp;
<td>
<a class="popup" onclick="myFunction()"><button type="button" class="btn btn-default">CSV</button></a>
</td>&nbsp;&nbsp;&nbsp;
<td>
<a class="popup" onclick="myFunction()"><button type="submit" class="btn btn-default">PDF</button></a>
</td>&nbsp;&nbsp;
<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>
<div class="box-body">
<table id="example1" class="table table-bordered table-hover">
<thead>
 <tr>
<th>Patient NIC</th>
  <th>Patient Name</th>
  <th>Patient Phone</th>
  <th>Patient Gender</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php 
     foreach ($row1 as $row)
      {

?> <tr>
 
<td><?php echo $row['NIC'];?></td>
<td><?php echo $row['patientname'];?></td>
<td><?php echo $row['mobileno'];?></td>
<td><?php echo $row['gender'];?></td>
<td><a href="editpatient1.php?NIC=<?php echo $row['NIC']; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a>

 <a href="info.php?NIC=<?php echo $row['NIC']; ?>"><span class="btn btn-primary bg-orange"><i class="fa fa-info"></i> Info</span>&nbsp;&nbsp;

  <a href="casehistory.php?NIC=<?php echo $row['NIC']; ?>"> <span class="btn btn-primary bg-orange"><i class="fa fa-history"></i> History</span>&nbsp;&nbsp;

   <a href="casehistory.php?NIC=<?php echo $row['NIC']; ?>"> <span class="btn btn-primary bg-orange"><i class="fa fa-money"></i> Payment</span>&nbsp;&nbsp;

  <a href="delete.php?id=<?php echo $row['NIC']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
</tr>
<?php }  ?>
  </tbody>
</table>
</div>
        
        </div>
      </div>       
      </div>
    </section>
  </div>
  
 <?php include"../Include/footer.php";?>