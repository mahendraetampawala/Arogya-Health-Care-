<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;

$s="SELECT * FROM addappointment WHERE `app_date` = '".date('Y-m-d')."'";
$query=mysqli_query($conn,$s)or die (mysqli_error($db_connect));

$row1=mysqli_fetch_all1($query);
function mysqli_fetch_all1($query) 
{
  $temp='';
$all = array();
while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
return $temp;
// print_r($numrows);echo "string"; exit();
}
?>

<div class="content-wrapper">
<section class="content-header">
<h1>
Today's Appointment
<small></small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Today's Appointment
</li>
</ol>
</section>
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-md-12">
<div class="box box-primary">
<div class="box-header with-border">
<i class="fa fa-user"></i> <h3 class="box-title">  Today's Appointment</h3>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="./addappointment.php"><button type="submit"   name="submit" class="btn btn-success bg-blue"><i class="fa fa-plus-square"></i> Add Appointment</button></a><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--    <td>
<button type="button" class="btn btn-default">Copy</button>
</td> -->
<td>
<a href="./Exceltoday.php"><button type="button" class="btn btn-default">Excel</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="./csvtoday.php"><button type="button" class="btn btn-default">CSV</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="./PDF/today_pdf.php"><button type="button" class="btn btn-default">PDF</button></a>
</td>&nbsp;&nbsp;
<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th> id </th>
<th> Patient </th>
<th> Date </th>
<th> Start Time </th>
<th> End Time </th>
<th> Remark </th>
<th> Option </th>
</tr>
</thead>
<tbody>
<?php
foreach ($row1 as $row)
{ 
$sql1=" SELECT name FROM patientregister WHERE id='".$row['patient']."'";
$write1 =mysqli_query($conn,$sql1) or die(mysqli_error($db_connect));
//print_r($sql); exit;
$row2=mysqli_fetch_array($write1)or die (mysqli_error($db_connect));
//print_r($row2); echo $row2['name']; exit;
//echo "$description"; exit();
//print_r($row1); exit;
//echo "$description"; exit();


?> <tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row2['name'];?></td>
<td><?php echo $row['app_date'];?></td>
<td><?php echo $row['starttime'];?></td>
<td><?php echo $row['endtime'];?></td> 
<td><?php echo $row['remark'];?></td>
<td><a href="deletet.php?id=<?php echo $row['id']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</span></a></td> 
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
 
