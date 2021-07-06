
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
         <div class="box-header">
 <button class="popup" onclick="myFunction()" type="button" ><i class="fa fa-plus-square"></i> Add New patient</button>
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
<th>Patient id</th>
  <th>Name</th>
  <th>Phone</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php 
     foreach ($row1 as $row)
      {

?> <tr>
 
<td><?php echo $row['id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['phone'];?></td>
<td><a href="editpatient1.php?id=<?php echo $row['id']; ?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a>

 <a href="info.php?id=<?php echo $row['id']; ?>"><span class="btn btn-primary bg-orange"><i class="fa fa-info"></i> Info</span>&nbsp;&nbsp;

  <a href="casehistory.php"> <span class="btn  btn-primary disabled"><i class="fa fa-history"></i> History</span>&nbsp;&nbsp;

  <a class="popup" onclick="myFunction()"><span class="btn btn-primary"><i class="fa fa-money"></i> Payment<span class="popuptext" id="myPopup">Get full version at mayuri.infospace@gmail.com</span></span></a>&nbsp;&nbsp;

  <a href="delete.php?id=<?php echo $row['id']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
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