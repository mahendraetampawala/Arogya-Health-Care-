<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;

$query=mysqli_query($conn,"SELECT * FROM addnewpres")or die (mysqli_error());
$numrows=mysqli_num_rows($query)or die (mysqli_error());
$row1=mysqli_fetch_all1($query);
function mysqli_fetch_all1($query) {
$all = array();
while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
return $temp;
}
//print_r($row1); exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error());
?>

<div class="content-wrapper">
<section class="content-header">
<h1>
Prescription
<small></small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Prescription</li>
</ol>
</section>
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-xs-12">
<div class="box box-primary">
<div class="box-header with-border">
<i class="fa fa-user"></i> <h3 class="box-title"> Prescription</h3>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="./addnew.php"><button type="submit" name="submit" class="btn btn-success bg-blue"><i class="fa fa-plus-square"></i> Add New</button></a><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--    <td>
<button type="button" class="btn btn-default">Copy</button>
</td> -->
<td>
<a href="./ExcelPrescription.php"><button type="button" class="btn btn-default">Exel</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="./csvprescription.php"><button type="button" class="btn btn-default">CSV</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="./PDF/pres_pdf.php"><button type="button" class="btn btn-default">PDF</button></a>
</td>&nbsp;&nbsp;
<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Date</th>
<th>Patient</th>
<th>Options</th>

</tr>
</thead>
<tbody>
<?php
foreach ($row1 as $row)
{
  $s1=" SELECT name FROM patientregister WHERE id='".$row['patient']."'";
  $w1 =mysqli_query($conn,$s1) or die(mysqli_error($db_connect));
  //print_r($s1); exit;
    $row1=mysqli_fetch_array($w1)or die (mysqli_error($db_connect));
//print_r($row1); exit;
 //echo $row1; exit();

?> <tr>
<td><?php echo $row['date'];?></td>
<td><?php echo $row1['name'];?></td>  
  <td>
  <a href="viewprescription.php?id=<?php echo $row['id'];?>"><span class="btn btn-success "><i class="fa fa-eye"></i>View Prescription</span></a>&nbsp;&nbsp;
  <a href="editprescription.php?id=<?php echo $row['id'];?>"><span class="btn btn-success"><i class="fa fa-edit"></i> Edit Prescription</span></a>&nbsp;&nbsp;
  <a href="delete.php?id=<?php echo $row['id'];?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</span></a></td>
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
 