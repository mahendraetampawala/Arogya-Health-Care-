<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;


// $query=mysqli_query($conn,"SELECT * FROM addappointment  WHERE patient='".$_GET['id']."'")or die (mysqli_error($db_connect));
// $numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
// $row1=mysqli_fetch_all1($query);

$query1=mysqli_query($conn,"SELECT * FROM addnewpres WHERE patient='".$_GET['id']."'")or die (mysqli_error());
$numrows1=mysqli_num_rows($query1)or die (mysqli_error($db_connect));
$p_row=mysqli_fetch_all1($query1);

$query2=mysqli_query($conn,"SELECT * FROM patientregister WHERE id='".$_GET['id']."'")or die (mysqli_error());
$numrows2=mysqli_num_rows($query2)or die (mysqli_error($db_connect));
$p_row1=mysqli_fetch_all1($query2);


/*$file_query=mysqli_query($conn,"SELECT * FROM addfiles")or die (mysqli_error());
$file_numrows=mysqli_num_rows($file_query)or die (mysqli_error());
$file_row1=mysqli_fetch_all1($file_query);*/

function mysqli_fetch_all1($query) {
    $all = array();
    while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
    return $temp;
}
//print_r($p_row); exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error());
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Prescription
<small></small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Dashboard</li>
</ol>
</section>

<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
<div class="col-xs-12">
    <div class="box box-primary">
            <div class="box-header with-border">
             <i class="fa fa-book"></i> <h3 class="box-title">Prescription</h3>
            </div>
             <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
            <div class="col-md-12"><div class="col-md-4">
         
             <td>Patient</td>
           
         </div><!-- 
         <div class="col-md-4"><td>Doctor</td></div> -->
         <div class="col-md-4"><td>Prescription Info</td>

         </div>
       </div>
       <?php
         // print_r($p_row1[0]['name']);exit;
     foreach ($p_row as $row)
      {

?> <tr>
  <td>Name: <?php echo $p_row1[0]['name'];  ?><br>
    Phone: <?php echo $p_row1[0]['phone']; ?>
  </td>
<!--    <td>Name: <?php echo $p_row1[0]['doctor']; ?> -->
</td>
<td>Date: <?php echo $row['date']; ?>
</td>
 </tr>
<?php } ?> 

<?php
     foreach ($p_row as $row)
      {
?>
<tr>
  
<th>
<div style="height: 100px;">
  History </div>
</th>
<td><?php echo $row['history'];  ?></td>
</tr> 
<tr>
 <tr>
<th>
    <div style="height: 100px;">
  Medication</div></th>
<td> <?php echo $row['medication']; ?>
</td></tr>
  <tr>
<th>
    <div style="height: 100px;">
Note</div></th>
<td> <?php echo $row['note']; ?>
</td></tr> 
  </tr>
<?php } ?>
</table>
<center>
<button type="button" onclick=" window.print();" name="name" class="btn btn-success"><i class="fa  fa-print"></i>  Print</button></center>
           </div>
          

              </div>
    </div>
  </div>
   
    </section>
    
  </div>
<?php include "../Include/footer.php";?>