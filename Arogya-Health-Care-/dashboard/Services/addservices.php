<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php

include("../inc/connect.php") ;


$query=mysqli_query($conn,"SELECT * FROM mainservices")or die (mysqli_error());
$numrows=mysqli_num_rows($query)or die (mysqli_error());
    $data = array();
    while ($row = mysqli_fetch_assoc($query)) {
      $data[]=$row;
       
    }
$row1=$data;  
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error());
?>
<?php
include("../inc/connect.php") ;
//echo "string"; exit();
//session_start();
if(isset($_POST['submit']))
{//print_r($_POST); exit();
    $id=$_POST['id'];
    $mainservicename=$_POST['mainservicename'];
    
 $write =mysqli_query($conn,"INSERT INTO mainservices(`mainservicename`) VALUES ('$mainservicename')") or die(mysqli_error($db_connect));

   // echo "<script>alert('Records Successfully Inserted..');</script>";
      echo " <script>setTimeout(\"location.href='../Services/addservices.php';\",150);</script>";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Main Services
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Main Services</li>
      </ol>
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <a href="mainservices.php">
              <button type="submit" name="submit" class="btn btn-primary">Add Services</button></a><br>
              </div>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <!--    <td>
  <button type="button" class="btn btn-default">Copy</button>
</td> -->
<td>
<a href="./exceladdscervice.php"> <button type="button" class="btn btn-default">Excel</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="csvaddservice.php"><button type="button" class="btn btn-default">CSV</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="./PDF/addmainser_pdf.php"><button type="button" class="btn btn-default">PDF</button></a>
 </td>&nbsp;&nbsp;
<td>
    <td>
                    <button type="button" onclick="window.print();" class="btn btn-default">Print</button>
                  </td>
            <div class="box-body">
<table id="example1" class="table table-bordered table-hover">
<thead>
 <tr>
<th>id</th>
  <th>Main Service Name</th>
  <th>Option</th>
                  
</tr>
</thead>
<tbody>
<?php
     foreach ($row1 as $row)
      {

?> <tr>
 
<td><?php echo $row['id'];?></td>
<td><?php echo $row['mainservicename'];?></td>
<td><a href="editmainservices.php?id=<?php echo $row['id'];?>"><span class="btn btn-success bg-green"><i class="fa fa-edit"></i> Edit </span></a>
<a href="delete.php?id=<?php echo $row['id'];?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </span></a></td>
</tr>
<?php } ?>

</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
  </div>
<?php include "../Include/footer.php";?>
