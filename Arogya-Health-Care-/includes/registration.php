<?php
//error_reporting(0);
include('config.php');
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['email']; 
$mobile=$_POST['mobileno'];
$password=$_POST['password']; 
$address = $_POST['address'];
$blood = $_POST['blood'];
$cat = $_POST['cat'];
$city = $_POST['city'];
$dob = $_POST['dob'];
$sql="INSERT INTO  users(Full_Name, Address, City,dob, Mobile, Email, Blood, Category, Password) 
VALUES('$fname','$address','$city','$dob', '$mobile', '$email', '$blood', '$cat','$password')";
$t = mysqli_query($conn, $sql);

// $query = $dbh->prepare($sql);
// $query->bindParam(':fname',$fname,PDO::PARAM_STR);
// $query->bindParam(':email',$email,PDO::PARAM_STR);
// $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
// $query->bindParam(':password',$password,PDO::PARAM_STR);
// $query->execute();
// $lastInsertId = $dbh->lastInsertId();
if($t)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again later');</script>";
}
}

?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="address" placeholder="Address " required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="city" placeholder="City" required="required">
                </div>
                      <div class="form-group">
                  <input type="number" class="form-control" name="mobileno" placeholder="Mobile Number"  pattern="(.){10,10}" maxlength="15" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                </div>
                <div class="form-group">
                  <input type="date" class="form-control" name="dob" placeholder="Date Of birth" required="required">
                </div>
                <div class="form-group">
                Blood Group
                <select name="blood" id="select2">
           <option value="">Select</option>
          <?php
		  $arr = array("A+","A-","B+","B-","O+","O-","AB+","AB-");
		  foreach($arr as $val)
		  {
			  if($val == $rsedit['bloodgroup'])
			  {
			  echo "<option value='$val' selected>$val</option>";
			  }
			  else
			  {
				  echo "<option value='$val'>$val</option>";			  
			  }
		  }
		  ?>
          </select>
                   <!-- <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>

                <div class="form-group"> -->
                Category
                <select name="cat" id="select3">
           <option value="">Select</option>
          <?php
		  $arr = array("Male","Female","Children");
		  foreach($arr as $val)
		  {
			  if($val == $rsedit['gender'])
			  {
			  echo "<option value='$val' selected>$val</option>";
			  }
			  else
			  {
				  echo "<option value='$val'>$val</option>";			  
			  }
		  }
		  ?>                </div>

                <div class="form-group">
				<input name="password" placeholder="Password" class="form-control" required="required" type="password" id="password" />

				<input name="password_confirm" class="form-control" placeholder="Confirm Password" required="required" type="password" id="password_confirm" oninput="check(this)" />
				<script language='javascript' type='text/javascript'>
   				 function check(input) {
        		if (input.value != document.getElementById('password').value) {
            	input.setCustomValidity('Password Must be Matching.');
        		} else {
            	// input is valid -- reset the error message
            	input.setCustomValidity('');
        		}
    			}
</script>
				
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>