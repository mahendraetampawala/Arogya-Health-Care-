<?php
session_start();
error_reporting(0);
//$_SESSION['login']=0;
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['updateprofile']))
  {
    $fname=$_POST['fullname'];
    $email=$_POST['email']; 
    $mobile=$_POST['mobileno'];
    //$password=$_POST['password']; 
    $address = $_POST['address'];
    $blood = $_POST['blood'];
    $cat = $_POST['cat'];
    $city = $_POST['city'];
    $dob = $_POST['dob'];
    $email=$_SESSION['login'];
    $update =date("Y-m-d h:i:s");

    //Full_Name, Address, City,dob, Mobile, Email, Blood, Category, Password) , Last update = '$update'  

$sql="update users set Full_Name='$fname', dob='$dob',Address='$address',City='$city',
Category='$cat', Blood ='$blood', Mobile='$mobile', Last_Update = '$update' where Email='$email' ";
$t = mysqli_query($conn, $sql);
if($t){
$msg="Profile Updated Successfully";
}
else {
  $msg=" Error in Profile Updated Successfully".mysqli_error($conn);
}
}
//echo $_SESSION['login'];
?>
  <!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Olanrewaju Rahamat Tractor Leasing System</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body>


<?php include('includes/header.php');?>

<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Your Profile</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Profile</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>



<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from users where Email='$useremail' ";
$t = mysqli_query($conn, $sql);
//$cnt=1;
$result = mysqli_fetch_array($t)
  ?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo ($result['FullName']);?></h5>
        <p><?php echo ($result['Address']);?><br>
          <?php echo ($result['City']);?>&nbsp;<?php echo ($result['Country']);?></p>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">Genral Settings for <?php echo $result['Full_Name']?></h5>
          <?php  
         if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo ($msg); ?> </div><?php }?>
          <form  method="post">
           <div class="form-group">
              <label class="control-label">Reg Date -</label>
             <?php echo ($result['Date Register']);?>
            </div>
             <?php if($result['Last_Update'] != ""){?>
            <div class="form-group">
              <label class="control-label">Last Update at - </label>
             <?php echo ($result['Last_Update']);?>
            </div>
            <?php } ?>
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control white_bg" name="fullname" value="<?php echo ($result['Full_Name']);?>" id="fullname" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="<?php echo ($result['Email']);?>" name="emailid" id="email" type="email" required readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="mobilenumber" value="<?php echo ($result['Mobile']);?>" id="phone-number" type="text" required>
            </div>
            <div class="form-group">
              <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
              <input class="form-control white_bg" value="<?php echo ($result['dob']);?>" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="date" >
            </div>
            <div class="form-group">
              <label class="control-label">Your Address</label>
              <textarea class="form-control white_bg" name="address" rows="4" ><?php echo ($result['Address']);?></textarea>
            </div>
            
            <div class="form-group">
              <label class="control-label">City</label>
              <input class="form-control white_bg" id="city" name="city" value="<?php echo ($result['City']);?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">Blood</label>
              <select name="blood" id="select2">
           <option value=""><?php echo ($result['Blood']);?></option>
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
              <!-- <input class="form-control white_bg"  id="country" name="country" value="<?php echo ($result['Blood']);?>" type="text"> -->
            </div>
            <div class="form-group">
              <label class="control-label">Category</label>
              <select name="cat" id="select3">
           <option value=""><?php echo ($result['Category']);?></option>
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
		  ?> </select> 
              <!-- <input class="form-control white_bg"  id="country" name="country" value="<?php echo ($result['Category']);?>" type="text"> -->
            </div>
            <?php } ?>
           
            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>



<?php include('includes/footer.php');?>



<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>



<?php include('includes/login.php');?>



<?php include('includes/registration.php');?>

> 

<?php include('includes/forgotpassword.php');?>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 

<script src="assets/switcher/js/switcher.js"></script>

<script src="assets/js/bootstrap-slider.min.js"></script> 

<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
<?php// } ?>