<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;


$s="SELECT * FROM addappointment WHERE  `app_date`>'".date('Y-m-d')."'";
$query=mysqli_query($conn,$s)or die (mysqli_error($db_connect));
//$numrows=mysqli_num_rows($query)or die (mysqli_error());
$row1=mysqli_fetch_all1($query);

$p_query=mysqli_query($conn,"SELECT * FROM patientregister")or die (mysqli_error($db_connect));
$p_numrows=mysqli_num_rows($p_query)or die (mysqli_error($db_connect));
$p_row1=mysqli_fetch_all1($p_query);
function mysqli_fetch_all1($query)
{
    $all = array();
    while ($all[] = mysqli_fetch_assoc($query))
     {$temp=$all;}
    return $temp;
}
//print_r($row1); exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error());
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upcomming Appointment
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Upcomming Appointment</li>
      </ol>
    </section>
    <section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-md-12">
<div class="box box-primary">
<div class="box-header with-border">
<i class="fa fa-user"></i> <h3 class="box-title">  Upcomming Appointment</h3>
</div>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="./addappointment.php"><button type="submit"   name="submit" class="btn btn-success bg-blue"><i class="fa fa-plus-square"></i> Add Appointment</button></a><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--    <td>
<button type="button" class="btn btn-default">Copy</button>
</td> -->
<td>
<a href="Excelupcomming.php"> <button type="button" class="btn btn-default">Excel</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="csvupcomming.php"><button type="button" class="btn btn-default">CSV</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="./PDF/upcomming_pdf.php"><button type="button" class="btn btn-default">PDF</button></a>
</td>&nbsp;&nbsp;
<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>
 <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Patient</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Remark</th>
                  <th>Option</th>
                 </tr>
                </thead>
                <tbody>
 <?php
//foreach ($row1 as $row)
     for ($i=0; $i <count($row1) ; $i++) 
      {

?> <tr>
<td><?php echo $row1[$i]['id'];?></td>
<td><?php 
foreach ($p_row1 as $p) 
{ 
  if($row1[$i]['patient']==$p['id'])
   { 
    echo $p['name']; 
    $mob=$p['phone'];
//echo $mob; 
  }
}

//if($row1[$i]['patient']==$p_row1[$i]['id']) { echo $p_row1[$i]['name']; } ?></td>
<td><?php echo $row1[$i]['app_date'];   ?></td>
<td><?php echo $row1[$i]['starttime'];?></td>
<td><?php echo $row1[$i]['endtime'];?></td> 
<td><?php echo $row1[$i]['remark'];?></td>
<td><a href="sendsms.php?id=<?php echo $row1[$i]['id'];?>"><input type="button" name="submit" value="SMS" class="btn btn-success"></a>
<!-- <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php $row1[$i]['id'];?>" style="height: 30px;"><i class="fa fa-plus-square"></i> SMS</button> &nbsp; -->
  <a href="deleteu.php?id=<?php echo $row1[$i]['id'];?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</span></a></td>

<!--  <div class="modal fade" id="myModal<?php $row1[$i]['id'];?>" role="dialog">
    <div class="modal-dialog"> -->
     
      <!-- <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">SMS</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="sendsms1.php" >
          Recipient:
          <input type="text" name="recipient" value="<?php echo $mob;?>">
           <br><br>
           Message:
            <textarea rows=4 cols=40 name='message'></textarea><br><br>
            <input type="submit" name="message" value="Send" style="width: 100px;">          
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div> 
      </div>
    </div>  -->
</tr>
<?php }   ?>
</tbody>
 </table>
</div>
</div>
</div>
</div>
</section>
</div>
<?php include "../Include/footer.php";?>

