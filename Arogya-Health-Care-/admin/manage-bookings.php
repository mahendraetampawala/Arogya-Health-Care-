<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
// let status 0 be cancel
// let status 1 be male
// let status 2 be female
// let status 3 be emergency
// let status 4 be intentive
// let status 5 be selfcon
// let status 6 be recepption


	else{
		if(isset($_REQUEST['cancel']))
	{
$cancel=intval($_GET['cancel']);
$status=1;

$sql = "UPDATE bedding SET Status='$status' WHERE  ID='$cancel' ";
$t = mysqli_query($conn, $sql);

$msg="Booking Successfully Confirmed";
}
		if(isset($_REQUEST['male']))
			{
		$male=intval($_GET['male']);
		$status=2;
		$sql = "UPDATE bedding SET Status='$status' WHERE  ID='$male' ";
		$t = mysqli_query($conn, $sql);
		
		$msg="Booking Male Room Successfully Confirmed ";
		}


if(isset($_REQUEST['female']))
	{
$female=intval($_GET['female']);
$status=3;

$sql = "UPDATE bedding SET Status='$status' WHERE  ID='$female' ";
$t = mysqli_query($conn, $sql);

$msg="Booking Female Room Successfully Confirmed";
}


if(isset($_REQUEST['emergency']))
	{
$emergence=intval($_GET['emergency']);
$status=4;

$sql = "UPDATE bedding SET Status='$status' WHERE  ID='$emergence' ";
$t = mysqli_query($conn, $sql);

$msg="Booking Emergence Room Successfully Confirmed";
}

if(isset($_REQUEST['intensive']))
	{
$intensive=intval($_GET['intensive']);
$status=5;

$sql = "UPDATE bedding SET Status='$status' WHERE  ID='$intensive' ";
$t = mysqli_query($conn, $sql);

$msg="Booking Intensive Room Successfully Confirmed";
}

if(isset($_REQUEST['selfcon']))
	{
$selfcon=intval($_GET['selfcon']);
$status=6;

$sql = "UPDATE bedding SET Status='$status' WHERE  ID='$selfcon' ";
$t = mysqli_query($conn, $sql);

$msg="Booking Self Container Successfully Confirmed";
}

if(isset($_REQUEST['reception']))
	{
$reception=intval($_GET['reception']);
$status=7;

$sql = "UPDATE bedding SET Status='$status' WHERE  ID='$reception' ";
$t = mysqli_query($conn, $sql);

$msg=" Reception Booking Successfully Confirmed";
}
if(isset($_REQUEST['discharged']))
	{
$discharged=intval($_GET['discharged']);
$status=8;

$sql = "UPDATE bedding SET Status='$status' WHERE  ID='$discharged' ";
$t = mysqli_query($conn, $sql);

$msg=" You have  Successfully discharged";
}
 

 ?>



<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Arogya Health Care</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/headerr.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Room  Bookings</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Booking Info</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>S/N</th>
										    <th>Room ID</th>
											<th>Name</th>
											
											<!-- <th></th>
											<th>From Date</th> -->
											
											<th>Address</th>
											<th>Status</th>
											<th> Date Booked</th>
											<th>Admission Action</th>
										</tr>
									</thead>
									<tbody>

	<?php $sql = "SELECT users.Full_Name,users.Address,  bedding.ID, bedding.patient_id  as bid, 
						bedding.Status, bedding.Date , room.Room FROM bedding 
					JOIN users on users.Email = bedding.patient_id
                    JOIN room on room.Room = users.Category";
	
									$t = mysqli_query($conn, $sql);
									//$r = mysqli_fetch_array($t);
									//echo $r['FullName'];
									$cnt=1;
									while($result = mysqli_fetch_array($t))
									{			?>	
										<tr>
											<td><?php echo ($cnt);?></td>
											<td><?php echo $result['Room'].$result['bid'];?></td>
											<td><a href="edit-vehicle.php?id=<?php echo $result['bid'];?>">
											<?php echo htmlentities($result['Full_Name']);?> </a></td>
											<td> <?php echo htmlentities($result['Address']);?></td>
											<td><?php if($result['Status']==1)
										{
										echo ('Request Cancel');
										} 
										else if ($result['Status']==2) {
											echo htmlentities('Male Room ');
											}
											else if ($result['Status']==3) {
												echo htmlentities('Female Room');
											}
											else if ($result['Status']==4) {
												echo htmlentities('Emergency Room');
												}
												 else if ($result['Status']==5) {
										echo htmlentities('Intensive Room');
										}
										else if ($result['Status']==6) {
											echo htmlentities('Self Container Room');
											}
											else if ($result['Status']==7) {
												echo htmlentities('Reception Room');
												}
												else if ($result['Status']==8) {
													echo htmlentities('Yo have Successfully Discharged From this Hospital');
													}
										else{
											echo htmlentities('Cancelled');
										}//echo $result['Status'];?></td>
											<td><?php echo $result['Date'];?></td>
											<td>
											<ul>
											<li><a href="manage-bookings.php?male=<?php echo $result['ID'];?>" onclick="return confirm('Do you really want to  Admit this patient to Male Room')">Male</a> </li>
										<li><a href="manage-bookings.php?female=<?php echo $result['ID'];?>" onclick="return confirm('Do you really want to  Admit this patient Female Room')"> Female</a></li>
										<li><a href="manage-bookings.php?emergency=<?php echo $result['ID'];?>" onclick="return confirm('Do you really want to  Admit this patient to Emergency Room')">Emergence</a> </li>
										<li><a href="manage-bookings.php?intensive=<?php echo $result['ID'];?>" onclick="return confirm('Do you really want to  Admit this patient  to  Intensive Room')">Intensive</a> </li>
										<li><a href="manage-bookings.php?selfcon=<?php echo $result['ID'];?>" onclick="return confirm('Do you really want to  Admit this patient to Self Container Room')">Self Container</a></li>
										<li><a href="manage-bookings.php?reception=<?php echo $result['ID'];?>" onclick="return confirm('Do you really want to  Admit this patient to Recemption Room')">Reception</a> </li>
										<li><a href="manage-bookings.php?discharged=<?php echo $result['ID'];?>" onclick="return confirm('Do you really want to  Admit this patient to Discharge')">Discharged</a> </li>
									<li><a href="manage-bookings.php?cancel=<?php echo $result['ID'];?>" onclick="return confirm('Do you really want to Cancel this cancel this patient')"> Cancel</a></li>
									</ul></td>
											<?php 
																																// let status 0 be cancel
																					// let status 1 be male
																					// let status 2 be female
																					// let status 3 be emergency
																					// let status 4 be intentive
																					// let status 5 be selfcon
																					// let status 6 be recepption
										
										?>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php  ?>
