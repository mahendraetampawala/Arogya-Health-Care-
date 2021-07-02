<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;


//session_start();
if(isset($_POST['submit']))
{
  //$doctor=$_POST['doctor'];
    $name=$_POST['name'];
    $email=$_POST['email'];
   // $password=$_POST['password'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $birthdate=$_POST['birthdate'];
     $bloodgroup=$_POST['bloodgroup'];

     $target_dir="../Upload/";
   $imgname=$_FILES["imageupload"]["name"];
   $type = $_FILES["imageupload"]["type"];
   $size = $_FILES["imageupload"]["size"];

   $temp = $_FILES["imageupload"]["tmp_name"]; 
   $error = $_FILES["imageupload"]["error"];//size
  if($error>0)
  {
    die("Error uploading file! Code $error.");
  }
  else
  { 
    if ($type=="images/" || $size > 5000000)
    {
      die("that format is not allowed or file size is too big!");
    }
    else
    { move_uploaded_file($temp,"../Upload/".$imgname);//move upload file  
      //echo"Upload Complete";
    }
  }
      $imageupload=$_FILES["imageupload"]["name"];
   
    
      
      $write =mysqli_query($conn,"INSERT INTO patientregister(`name`,`email`,`address`,`phone`,`gender`,`birthdate`,`bloodgroup`,`imageupload`) VALUES ('$name','$email','$address','$phone', '$gender','$birthdate','$bloodgroup','$imageupload')") or die(mysqli_error($db_connect));
      $last_id = mysqli_insert_id();
      $deposit =mysqli_query($conn,"INSERT INTO `addpayment`(`patient`,`invoice`) VALUES ('$last_id','')") or die(mysqli_error($db_connect));
      
     // echo " <script>alert('Records Successfully Inserted..');</script>";
    }

?>
<?php

include("../inc/connect.php") ;


$query=mysqli_query($conn,"SELECT `id`,`name`,`phone` FROM patientregister")or die (mysqli_error());
$numrows=mysqli_num_rows($query)or die (mysqli_error());
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
        Patient Payments 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient Payments </li>
      </ol>
    </section>
    <section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-xs-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<i class="fa fa-user"></i> <h3 class="box-title">Patient Payments</h3>
		</div>
 		<div class="box-header">
 			<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="height: 50px;"><i class="fa fa-plus-square"></i> Register Patient</button>
 <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Patient Register</h4>
	</div>
	<div class="modal-body">
		<form method="POST" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label for="exampleInputEmail1">Doctor</label>
					<input type="name" class="form-control" name="doctor" id="exampleInputEmail1" placeholder="">
				</div> -->
				<div class="form-group">
					<label for="exampleInputEmail1">Full Name</label>
					<input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="" required="">

				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="Email" name="email" class="form-control" id="exampleInputPassword1" placeholder="" required="">

				</div>
		<!-- 		<div class="form-group">
					<label for="exampleInputFile">Password</label>
					<input type="Password" name="password" class="form-control" id="exampleInputPassword1" placeholder="">

				</div> -->
				<div class="form-group">
					<label for="exampleInputPassword1">Address</label>
					<input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="" required="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Phone</label>
					<input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="" required="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Gender</label>
					<select name="gender" class="form-control" id="exampleInputPassword1" placeholder="">
					<option value="" disabled selected="selected"> Select Category	</option>
					<option value="Male">Male</option> <option value="Female">Female</option>
					<option value="Other">Other</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Birthdate</label>
					<input type="date" name="birthdate" class="form-control" id="exampleInputPassword1" placeholder="" required="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Bloodgroup</label>
					<select name="bloodgroup" class="form-control" id="c" placeholder="">
					<option value="" disabled selected="selected"> Select Category</option>
					<option value="A+">A+</option> <option value="A-">A-</option>
					<option value="B+">B+</option><option value="B-">B-</option> <option value="AB+">AB+</option> <option value="AB-">AB-</option> <option value="O+">O+</option><option value="O-">O-</option>
					</select>
				</div>
					<td><b>Image Upload</b></font>
					<input type="file" name="imageupload" id="fileToUpload" required=""></td>
				<div class="box-footer">
              	  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
       </form>
    </div>
  <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
     </div>    
</div>
</div>
</div>	
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--    <td>
 <button type="button" class="btn btn-default">Copy</button>
</td> -->
<td>
   <a href="./Excelpayment.php"> <button type="button" class="btn btn-default">Excel</button></a>
</td>&nbsp;&nbsp;
<td>
   <a href="csvpayment.php"><button type="button" class="btn btn-default">CSV</button></a>
</td>&nbsp;&nbsp;
<td>
   <a href="./PDF/payments_pdf.php"><button type="button" class="btn btn-default">PDF</button></a>
</td>&nbsp;&nbsp;
<td>
   <button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>

       <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
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
<td><a href="paymenthistory.php?id=<?php echo $row['id'];?>"><span class="btn btn-primary"><i class="fa fa-money"></i> Payment History</a></span></td>
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
