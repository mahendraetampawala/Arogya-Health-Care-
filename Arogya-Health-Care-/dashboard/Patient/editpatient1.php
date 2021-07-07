<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
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
<?php
//include("../inc/connect.php") ;

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
      @unlink('../Upload/profile/'.$_POST['old_profile']);
    }
  }
}
 else
    {
      $imgname=$_POST['old_profile'];
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
   
      $write =mysqli_query($conn,"UPDATE patientregister SET name=' $name',email='$email',address='$address',phone='$phone',gender='$gender',birthdate='$birthdate',bloodgroup='$bloodgroup',imageupload='$imgname',status='$status' WHERE  id='".$_GET['id']."'") or die(mysqli_error($db_connect));
      //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
      //$numrows=mysqli_num_rows($query)or die (mysqli_error());
      echo " <script>setTimeout(\"location.href='../Patient/patientlist.php';\",150);</script>";
    }
    

?>
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Edit Patient Personal Info
        <small> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Patient Personal Info
        </li>
      </ol>
    </section>
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border ">
        <i class="fa fa-user"></i> <h3 class="box-title">Edit Patient Personal Info</h3>
      <form method="POST" enctype="multipart/form-data" >
    
   <td>
      <!-- <span style="color:red;">*</span><b>Patient_id</b> -->
        <div class="form-group">
           <input type ="hidden" name="id" value="<?php echo  $id;?>">
        </div>      
      </td>
      
          <div class="form-group">&nbsp;&nbsp;&nbsp;
            <span style="color:red;">*</span><b>Full Name</b><br>&nbsp;&nbsp;&nbsp;
            <input type ="text" name="name" value="<?php echo  $name;?>">
        </div>
        <div class="col-md-3" style="float: right;">
           <input type="hidden" name="old_profile" value="<?php echo $imageupload; ?>" >
    <img class="profile-img " name="imageupload" src="../Upload/profile/<?php  echo  $imageupload; ?>" alt="profile picture" style="height:150px;width:150px;" class="form-control">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="file" name="profile_pic" >
           
         </div>   
   
<div class="col-md-2">
<span style="color:red;">*</span><b>Gender</b>
  
 <select type="text" name="gender" class="form-control" >
  <option value="<?php echo  $gender;?>" disabled selected="selected"><?php echo  $gender;?></option>
<option value="Male" <?php if($gender=='Male'){ echo "selected"; } ?>>Male</option> 
<option value="Female" <?php if($gender=='Female'){ echo "selected"; } ?>>Female</option>
<option value="Other">Other</option>
  </select>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

     <div class="col-md-2">
   <b>Blood Group</b>
   
<select type="text" name="bloodgroup" class="form-control" id="bloodgroup" value="<?php echo  $bloodgroup;?>">
<!-- <option value="<?php echo  $bloodgroup;?>" disabled selected="selected"> ...Select Blood Group...</option>
 --><option value="A+" <?php if($bloodgroup=='A+'){ echo "selected"; } ?> >A+</option> 
<option value="A-" <?php if($bloodgroup=='A-'){ echo "selected"; } ?> >A-</option>
 <option value="B+" <?php if($bloodgroup=='B+'){ echo "selected"; } ?> >B+</option>
 <option value="B-"<?php if($bloodgroup=='B-'){ echo "selected"; } ?> >B-</option> 
 <option value="AB+ " <?php if($bloodgroup=='AB+'){ echo "selected"; } ?> ">AB+</option>
  <option value="AB-" <?php if($bloodgroup=='AB-'){ echo "selected"; } ?> ">AB-</option> 
  <option value="O+" <?php if($bloodgroup=='o+'){ echo "selected"; } ?> >O+</option>
  <option value="O-" <?php if($bloodgroup=='o-'){ echo "selected"; } ?> ">O-</option>
          </select>
        </div>
 
     <div class="col-md-2">
    <b>Birthdate</b>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type ="date" name="birthdate" value="<?php echo  $birthdate;?>" class="form-control">
  </div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
 <div class="col-md-2" >
    <span style="color:red;">*</span><b>Phone</b><br>
<input type ="text" name="phone" value="<?php echo  $phone;?>" class="form-control">
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <div class="col-md-2" >
<b>Address</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type ="text" name="address" value="<?php echo  $address;?>" class="form-control">
  </div><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
 <div class="col-md-2" >
   <span style="color:red;">*</span><b>Email(User Name)</b><br>
   <input type ="email" name="email" value="<?php echo  $email;?>" class="form-control">
 </div>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <span style="color:red;">*</span><b>Status</b><br>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

   <input type ="radio" name="active" value="1" <?php if($row['status']=='1') { echo 'checked'; } ?>><b> Active</b>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type ="radio" name="active" value="0" <?php if($row['status']=='0'){ echo 'checked'; } ?>><b> Inactive</b>
  <br><br><br>
<div class="box-footer">
           <button type="submit"  name="Save" class="btn btn-success bg-green" ><i class="fa fa-file-text"></i> Save</button>
          <!--  <button type="reset"  name="reset" class="btn btn-primary" value="reset"><i class="f fa fa-undo"></i> Reset</button> -->
          <a href="./patientlist.php"><button type="button" name="cancel" class="btn btn-primary"><i class="fa fa-times"></i> Cancel</button></a>
              </div>
  </form>
      </div>
    </div>
  </div>
</div>
  </div>
<?php include "../Include/footer.php";?>