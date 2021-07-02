<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;
//echo "string"; exit();
//session_start();
if(isset($_POST['submit']))
{//print_r($_POST); exit();
    $id=$_POST['id'];
		$mainservicename=$_POST['mainservicename'];
		
 $write =mysqli_query($conn,"INSERT INTO mainservices(`mainservicename`) VALUES ('$mainservicename')") or die(mysqli_error($db_connect));
echo " <script>setTimeout(\"location.href='../Services/addservices.php';\",100);</script>";
   // echo "<script>alert('Records Successfully Inserted..');</script>";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Main Services
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Main Services</li>
      </ol>
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      	<div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
            	<form method="POST">
            	<label>Main Service Name</label><br>
            <input type="name" class="form-control" name="mainservicename" id="exampleInputEmail1" placeholder="" required="">
            <br><br>
            	<button type="submit" name="submit" class="btn btn-primary">Submit</button><br>
            	</form>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<?php include "../Include/footer.php";?>