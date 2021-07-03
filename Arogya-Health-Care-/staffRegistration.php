<?php
	include("connect.php");
?>
<?php 
	include("home/homeheader.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
  <!-- CSS icon Libraries -->
      <link rel="stylesheet" href="css/registration/style.css">
        <link href="css/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/css/prettyPhoto.css" rel="stylesheet">
    <link href="css/css/price-range.css" rel="stylesheet">
    <link href="css/css/animate.css" rel="stylesheet">
	<link href="css/css/main.css" rel="stylesheet">
	<link href="css/css/responsive.css" rel="stylesheet">

</head><!--/head-->


<body>
		
	

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>





	<div id="main-wrapper" class="form-popup">
		<form class="myform" action="register.php" method="post" enctype="multipart/form-data">
			<center>
				<h2>Registration Form</h2>
				<img id="uploadPreview" src="imgs/avatar.png" class="avatar"/><br>
				
				<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
			</center>
			
			<label><b>Email:</b></label><br>
			<input name="email" type="text" class="inputvalues" placeholder="Enter Your Email" required/><br><br>
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Enter Your Username" required/><br><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Enter Your Password" required/><br><br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm Your Password" required/><br><br>
			<label><b>Contact:</b></label><br>
			<input name="Contact" type="text" class="inputvalues" placeholder="Enter Your Contact number" required/><br><br>
			<label><b>Address:</b></label><br>
			<input name="Address" type="text" class="inputvalues" placeholder="Enter Your permenent address" required/><br><br>
			<label><b>WorkID:</b></label><br>
			<input name="WorkID" type="text" class="inputvalues" placeholder="Enter Your Workid" required/><br><br>
			 

			<label><b>Type:</b></label><br>
					<select name="Type" class="inputvalues" id="exampleInputPassword1" placeholder="Enter Your Type" required="">
					<option value="" disabled selected="selected"> Select Category	</option>
					<option value="Male">Doctor</option>
					<option value="Male">Nurse</option>
					<option value="Male">Management Officer</option>
					<option value="Male">laboror</option>
					 <option value="Female">attendent</option>
					<option value="Other">Other</option>
					</select>





			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button CLICKED")</script>';
				$email = $_POST['email'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				$contact = $_POST['Contact'];
				$address=$_POST['Address'];
				$workid=$_POST['WorkID'];
				$type=$_POST['Type'];
				
				$img_name = $_FILES["imglink"]["name"];
				$img_size =$_FILES["imglink"]["size"];
			    $img_tmp =$_FILES["imglink"]["tmp_name"];
				
				$directory = 'dashboard/uploads/';
				$target_file = $directory.$img_name;
				
				 $temp = $_FILES["imglink"]["tmp_name"]; 
 				 $error = $_FILES["imglink"]["error"];//size

				if($password==$cpassword)
				{
					$query= "select * from staffmember WHERE workid='$email'";
					$query_run = mysqli_query($conn,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						//there is already a user with the same username
						//echo '<script type="text/javascript"> alert("User Already Exists...Try another Username")</script>';
						echo '<script type="text/javascript"> alert("Email Already Exists...Try another Email")</script>';
					}
					
					/*//else if(file_exists($target_file))
					else if($target_file)
					{
						if(file_exists)
						{
						echo '<script type="text/javascript"> alert("Image file already exists.. Try another image file") </script>';
						}
						else
						{
						echo '<script type="text/javascript"> alert("Upload Image File") </script>';	
						}
						
					}*/
					
					else if($img_size>2097152)
					{
						echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
					}
					
					else
					{
						move_uploaded_file($img_tmp,$target_file); 	
						$img_upload = $_FILES["imglink"]["name"];


						$write=mysqli_query($conn,"INSERT INTO staffmember(`username`,`workid`,`contact`,`email`,`address`,`password`,`type`,`img`) VALUES('$username','$workid','$contact','$email','$address','$password','$type','$img_upload')");




						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login"); location.href ="../index.php" </script>';
							//header("Location:index.php");
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}	
						
					
					/*else
					{
						$query= "insert into user values('$username','$password')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered..Go To Login Page To Login")</script>';	
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!")</script>';
						}	
					}*/
				}	
				else
				{
					echo '<script type="text/javascript"> alert("Password and Confirm Password Does not Match!")</script>';
				}	
				
				
			}	
		?>
		
	</div>






	<!--End of insertion section-->
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>A</span>-Arogya Health care</h2>
							<p>Always we care about you.</p>
						</div>
					</div>
				
				
				</div>
			</div>
		</div>
		
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2021 Arogya Health Care Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.Arogya.com">Arogya hospitality</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	 
  
</body>
</html>