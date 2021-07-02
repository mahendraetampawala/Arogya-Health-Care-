<?php
include("../inc/connect.php") ;

//session_start();
if(isset($_POST['Save']))
{ 
    $id=$_POST['id'];
//print_r($_FILES["profile_pic"]["name"]); exit;
 if($_FILES["profile_pic"]["name"]!='')
  {
   
$target_dir="../Upload/profile/";
$imgname=$_FILES["profile_pic"]["name"];
$type = $_FILES["profile_pic"]["type"];
$size = $_FILES["profile_pic"]["size"];

$temp = $_FILES["profile_pic"]["tmp_name"]; 
$error = $_FILES["profile_pic"]["error"];//size
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
    { //echo "string"; exit;
     move_uploaded_file($temp,"../Upload/profile/".$imgname); 
     // echo"Upload Complete";  
    }
  }
    } 
    else
    {
      
    }
 //$profilepic=$_FILES["profilepic"]["name"];
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $birthdate=$_POST['birthdate'];
    $bloodgroup=$_POST['bloodgroup'];
    $status=$_POST['active'];
      
      $write =mysqli_query($conn,"INSERT INTO patientregister(`name`,`email`,`address`,`phone`,`gender`,`birthdate`,`bloodgroup`,`imageupload`,`status`) VALUES ('$name','$email','$address','$phone','$gender','$birthdate','$bloodgroup','$imgname',' $status')") or die(mysqli_error($db_connect));
      //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
      //$numrows=mysqli_num_rows($query)or die (mysqli_error());
           $last_id = mysqli_insert_id();
      $deposit =mysqli_query($conn,"INSERT INTO `addpayment`(`patient`,`invoice`) VALUES ('$last_id','')") or die(mysqli_error($db_connect));
     echo " <script>setTimeout(\"location.href='../Patient/patient.php';\",150);</script>";
    }
    

?>
<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add New Patient
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Patient</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="container">
          <div class="box box-primary">
           <h3>&nbsp;&nbsp;&nbsp;Patient Personal Info</h3>
            <div class="box-body box-profile" >
            <form method="POST" enctype="multipart/form-data" >
              <div class="col-md-4" style="float: right;">
    <img class="profile-img " name="imageupload" src="https://raw.githubusercontent.com/smartninja/wd1-exercises/master/lesson-3/img/anonymous.png" alt="profile picture" style="height:100px;width:100px;" class="form-control">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="file" name="profile_pic" >
        </div> 
         <div class="col-md-8">
   &nbsp;&nbsp;&nbsp;&nbsp;
    <span style="color:red;">*</span><b>Full Name</b><br>
  &nbsp;&nbsp;&nbsp;&nbsp;<input type ="text" name="name" required=""><br><br>


         <div class="col-md-3">
<span style="color:red;">*</span><b>Gender</b>
<select type="text" name="gender" class="form-control" required="">
  <option value="" disabled selected="selected"> ...Select..</option>
<option value="Male">Male</option> 
<option value="Female">Female</option>
<option value="Other">Other</option>
  </select>
</div>
 <div class="col-md-3">
<b>Blood Group</b>
<select type="text" name="bloodgroup" class="form-control" id="bloodgroup" required="">
<option value="" disabled selected="selected"> ...Select Blood Group...</option>
<option value="A+">A+</option> <option value="A-">A-</option>
 <option value="B+">B+</option><option value="B-">B-</option> <option value="AB+">AB+</option> <option value="AB-">AB-</option> <option value="O+">O+</option><option value="O-">O-</option>
 </select>
</div>
<div class="col-md-3">
    <b>Birthdate</b>
<input type ="date" name="birthdate" required="" class="form-control">
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
 <div class="col-md-3" >
    <span style="color:red;">*</span><b>Phone</b><br>
  <input type ="text" name="phone" required="" class="form-control">
</div>
<div class="col-md-3" >
<b>Address</b>
<input type ="text" name="address" required="" class="form-control"><br>
 </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
<div class="col-md-3" >
   <span style="color:red;">*</span><b>Email(User Name)</b><br>
   <input type ="email" name="email" required="" class="form-control">
  </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <span style="color:red;">*</span><b>Status</b><br>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type ="radio" name="active" value="1"><b> Active</b>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type ="radio" name="inactive" value="0"><b> Inactive</b>
 <br><br>
    <div class="box-footer">
           <button type="submit"  name="Save" class="btn btn-success bg-green" ><i class="fa fa-file-text"></i> Save</button>
           <button type="reset"  name="reset" class="btn btn-primary" value="reset"><i class="f fa fa-undo"></i> Reset</button>
          <a href="./patient.php"><button type="button" name="cancel" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</button></a>
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