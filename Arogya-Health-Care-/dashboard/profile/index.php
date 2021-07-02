<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
include("../inc/connect.php") ;

//session_start();
$sql="SELECT * FROM login";

$w =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
// print_r($sql); exit;
$row=mysqli_fetch_array($w)or die (mysqli_error($db_connect));
$fname=$row['fname'];
$lname=$row['lname'];
$password=$row['password'];
$username=$row['username'];

//echo $row;
//print_r($row); exit

?>
<?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['submit']))
{ 
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $password=$_POST['password'];
    $passwordP=md5("$password");
    $username=$_POST['username'];
   
      $write =mysqli_query($conn,"UPDATE login SET fname='$fname',lname='$lname',username='$username',password='$passwordP'") or die(mysqli_error());
      //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
      //$numrows=mysqli_num_rows($query)or die (mysqli_error());
      echo " <script>alert('Records Successfully Updated..');</script>";
    
}

?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Manage Profile
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>
      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
             <i class="fa fa-user"></i> <h3 class="box-title">Profile</h3>
            </div>
                <form method="POST" >
                  <div class="box-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text"  name="fname" placeholder="" class="form-control" value="<?php echo $fname;?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" name="lname" placeholder="" value="<?php echo $lname;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Change Password</label>
                    <input type="password" name="password" class="form-control" placeholder="" value="<?php echo $password;?>" >
                    <input type="hidden" name="pswd" class="form-control" value="<?php echo $password;?>" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Email</label>
                    <input type="email" name="username" class="form-control" placeholder="" value="<?php echo $username;?>">
                  
                  </div>
                
              </div>
    <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form> 
        </div>
    </div>
    </div>
     </section> 
  </div>
<?php include "../Include/footer.php";?>