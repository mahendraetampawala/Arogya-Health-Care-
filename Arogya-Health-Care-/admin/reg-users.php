<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from tblbrands  WHERE id=$id";
// $query = $dbh->prepare($sql);
// $query -> bindParam(':id',$id, PDO::PARAM_STR);
// $query -> execute();
$t = mysqli_query($conn, $sql1);
		// $cnt=1;
		// $query = mysqli_fetch_array($t);
$msg="Page data updated  successfully";

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
	
	<title>Olanrewaju Rahamat Tractor Leasing System</title>

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
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Registered Users</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Reg Users</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>S/N</th>
												<th> Name</th>
											<th>Email </th>
											<th>Contact no</th>
										<th>DOB</th>
										<th>Address</th>
										<th>City</th>
										<th>Blood</th>
										<th>Category</th>
										<th>Reg Date</th>
										
										</tr>
									</thead>
									<tbody>

									<?php $sql = "SELECT * from users ";
// $query = $dbh -> prepare($sql);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
								
										//$cnt=1;
										// $row = mysqli_fetch_array($t);
								
										$t = mysqli_query($conn, $sql);		// echo $row['FullName'];
								$cnt=1;
								while($result = mysqli_fetch_array($t))
								{				?>	

										<tr>
											<td><?php echo $cnt;?></td>
											<td><?php echo $result['Full_Name'];?></td>
											<td><?php echo $result['Email'];?></td>
											<td><?php echo $result['Mobile'];?></td>
											<td><?php echo $result['dob'];?></td>
											<td><?php echo $result ['Address'];?></td>
											<td><?php echo $result['City'];?></td>
											<td><?php echo $result['Blood'];?></td>
											<td><?php echo $result['Category'];?></td>
											<td><?php echo $result['Date Register'];?></td>
										</tr>
										<?php $cnt=$cnt+1; }
										} ?>
										
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
<?php //} ?>
