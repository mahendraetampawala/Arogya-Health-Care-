<?php
session_start();
include("./inc/connect.php") ;
 // echo "string"; exit();
$user= $_SESSION['username'];

	if(isset($_POST['submit']))
	{ //print_r($_POST); exit();
		$oldpassword=md5($_POST['oldpassword']);
		$newpassword=md5($_POST['newpassword']);
		$repeatnewpassword=md5($_POST['repeatnewpassword']);
		//echo"$oldpassword/$newpassword/$repeatnewpassword";
	// 	$connect=mysqli_connect("localhost","root","")or die("couldn't connect");
	// mysqli_select_db("hms") or die("Couldn't find db");
	
	$queryget=mysqli_query($conn,"SELECT password FROM login WHERE username='$user'")or die (mysqli_error($db_connect));
	$numrows=mysqli_num_rows($queryget);
	$row=mysqli_fetch_array($queryget);
	
	$oldpassworddb=$row['password'];
	
	//echo $oldpassworddb ."<br>";
	
//echo $oldpassword ."<br>";
	
	if($oldpassword==$oldpassworddb)
	{
		if($newpassword==$repeatnewpassword)
		{
			//echo"Success!";
			$querychange=mysqli_query($conn,"UPDATE login SET password='$newpassword' WHERE username='$user'");
		session_destroy();
		die("Your password has been changed.<a href='index.php'>Return</a>to the main page");
			// header("location:index.php");
			// echo "<script>alert('Your Password Has BEEN CHANGED...');</script>";
		}
	}
	else
	die("Old password doesn't match");
	}
		
	
else
	echo"You must be logged in to change your password";
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title> Login Form </title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel=stylesheet>
<link rel=stylesheet href=//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css>
<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
<div class="container">
  <div class="row">
    <form  method="POST" class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
      <div class="row">
        <h1><i class="fa fa-lock"></i> log-in</h1>
        <div class="form-group">
          <label class="col-sm-1 control-label" for="e-mail"><i class="fa fa-key"></i></label>
          <div class="col-sm-11">
            <input class="form-control" id="e-mail" name="oldpassword" type="password" placeholder="Old password"/>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-1 control-label" for="password"><i class="fa fa-key"></i></label>
          <div class="col-sm-11">
            <input class="form-control" id="password" name="newpassword" type="password" placeholder="New Password"/>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-1 control-label" for="password"><i class="fa fa-key"></i></label>
          <div class="col-sm-11">
            <input class="form-control" id="password" name="repeatnewpassword" type="password" placeholder=" Repeate New Password"/>
          </div>
        </div>
        <button type="submit"  class="btn btn-primary btn-lg" name="submit">Submit</button>
         </div>
    </form>
  </div>
</div>
  
  

</body>

</html>

