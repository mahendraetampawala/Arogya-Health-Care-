<?php 
  include("../inc/connect.php") ;
  
    //session_start();
  $sql="SELECT * FROM patientregister WHERE id='".$_GET['id']."'";
  $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
 // print_r($sql); exit;
    $row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $address =$row['address'];
    $phone =$row['phone'];
    $gender=$row['gender'];
    $birthdate=$row['birthdate'];
    $bloodgroup=$row['bloodgroup'];
    $imageupload=$row['imageupload'];
    $status=$row['status'];
   //print_r($row); exit;
   //echo "$firstname"; exit();
?>

<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Patient Personal Info
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient Personal Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

<div class="container">
  <div class="box box-primary">
    <h3 >&nbsp;&nbsp;&nbsp;Patient Personal Info</h3>
   <div class="box-body box-profile" >
    <form method="POST" enctype="multipart/form-data" >
         <div class="col-md-8">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="color:red;"></span><b>Full Name</b>
    <div class="form-group">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $name;?></div>

     <div class="col-md-3" style="float: right;">
    <img class="profile-img " name="imageupload" src="../Upload/profile/<?php  echo  $imageupload; ?>" alt="profile picture" style="height:200px;width:200px;" class="form-control">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
  </div>
    <div class="col-md-2">
<span style="color:red;"></span><b>Gender</b><br>
<?php echo  $gender;?>
</div>
 <div class="col-md-2">
<b>Blood Group</b>
   
<?php echo  $bloodgroup;?></div>
   <div class="col-md-2">
       <b>Birthdate</b>
  <?php echo  $birthdate;?>
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
  <div class="col-md-2" >
    <span style="color:red;"></span><b>Phone</b><br>
 <?php echo  $phone;?>
</div>
     <div class="col-md-2" >
<b>Address</b><br>
<?php echo  $address;?>
</div><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
 <div class="col-md-2" >
<span style="color:red;"></span><b>Email</b><br><b>(User Name)</b>
   <?php echo  $email;?>
 </div>
 <div class="col-md-2" >
   <span style="color:red;"></span><b>Status</b><br>
  <?php if($row['status']=='1'){ echo 'Active'; } ?>
 <?php if($row['status']=='0'){ echo 'Inactive'; } ?>
</div><br><br><br><br>
<div class="box-footer">
    <a href="./patientlist.php"><button type="button" name="cancel" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</button></a>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
</div>
 <?php include "../Include/footer.php";?>