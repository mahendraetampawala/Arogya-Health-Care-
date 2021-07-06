<?php session_start();?>
<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
include("../inc/connect.php") ;
  
$sql="SELECT * FROM login WHERE username='".$_SESSION['username']."'";
//echo $sql;
  $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
//print_r($sql); exit;
$row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
//print_r($row); exit;
     $profile=$row['profile'];
      $fname =$row['fname'];
       $lname=$row['lname'];
    $username=$row['username'];
    $password=$row['password'];
       //print_r($row); exit;
   //echo "$firstname"; exit();
?>
<?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['submit']))
{ //print_r($_POST); exit;
  if ($_FILES["profileimg"]["name"]!='')
  {
    $target_dir="../Upload/Adminprofile/";
    $name=$_FILES["profileimg"]["name"];
    $type = $_FILES["profileimg"]["type"];
    $size = $_FILES["profileimg"]["size"];
    $temp = $_FILES["profileimg"]["tmp_name"]; 
    $error = $_FILES["profileimg"]["error"];//size
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
        move_uploaded_file($temp,"../Upload/Adminprofile/".$name);
     @unlink('../Upload/Adminprofile/'.$_POST['old_profile']);
       }
    }
  }
   else
    {
      $name=$_POST['old_profile'];
    }
    $flag=0;
  $pswd=$_POST['pswd'];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  //$password1=md5("$password");
  $Confirmpassword=$_POST['Confirmpassword'];
  if(!empty($password))
  {
    if($password==$Confirmpassword)
    {
      $write=mysqli_query($conn,"UPDATE login SET profile='$name',fname='$fname',lname='$lname',username='$username',password='$password' WHERE username='".$_SESSION['username']."'")or die(mysqli_error($db_connect));
      $_SESSION['username']=$username;
      echo " <script>alert('Records Successfully Updated..');</script>";
    }
    else
    {
      echo " <script>alert('Password Doesn't Match');</script>";
    }
  }
  else
  {
    $password=$pswd;
    $write=mysqli_query($conn,"UPDATE login SET profile='$name',fname='$fname',lname='$lname',username='$username',password='$password' WHERE username='".$_SESSION['username']."'")or die(mysqli_error($db_connect));
      $_SESSION['username']=$username;
      echo " <script>alert('Records Successfully Updated..');</script>";
  }

  }
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Admin Profile
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
   <section class="content">
      <div class="row">
        <div class="col-md-12">
       <div class="box box-primary">
          <div class="box-header with-border">
            <div class="col-md-4">
              <div style="float: right;" >
               <b> First Name:</b>&nbsp; 
         <?php echo $fname; ?><br>
         <b>Last Name:</b>&nbsp;
         <?php echo $lname; ?><br>
         <b> Email:</b>&nbsp; 
          <?php echo $username; ?><br>
       </div>

     <img class="profile-img " name="profile" src="../Upload/Adminprofile/<?php echo $profile;?>" style="height:100px;width:100px;" class="form-control" style="float: left;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       </div>
     </div>
     </div>
   </div>
 </div>
<div class="box box-primary">
  <div class="box-header with-border">
<i class="fa fa-user"></i> <h3 class="box-title">Profile</h3>
<form method="POST" enctype="multipart/form-data" >
   <div class="box-body">
      <div class="col-md-12">
        <label>Profile</label><br>
         <input type="hidden" name="old_profile" value="<?php echo $profile; ?>" >
        <img class="profile-img " name="profile" src="../Upload/Adminprofile/<?php echo $profile;?>" style="height:100px;width:100px;" class="form-control">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="file" name="profileimg" ><br><br>
          <label>First Name</label><br>
          <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>"><br>
          <label>Last Name</label><br>
          <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>"><br>
          <div class="form-group">
          <label for="exampleInputEmail1">UserName</label>
          <input type="email" class="form-control" name="username" value="<?php echo $username;?>">
          </div>
          <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="hidden" name="pswd" class="form-control" value="<?php echo $password;?>" >
          <input type="password" name="password" class="form-control" >
          </div>
          <div class="form-group">
          <label for="exampleInputPassword1">Confirm Password</label>
          <input type="password" name="Confirmpassword" class="form-control">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form> 
   </div>
  </div>
</section>
</div>
<?php include "../Include/footer.php";?>