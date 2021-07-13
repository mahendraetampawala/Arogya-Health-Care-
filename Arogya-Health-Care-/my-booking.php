<?php
session_start();
// error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Adebayo Medinah Gbemisola</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">

<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">

<link href="assets/css/slick.css" rel="stylesheet">

<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">

<link href="assets/css/font-awesome.min.css" rel="stylesheet">


        

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

</head>
<body>


        

<?php include('includes/header.php');?>

<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Room</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>My Room</li>
      </ul>
    </div>
  </div>
  
  <div class="dark-overlay"></div>
</section>


<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from users where Email='$useremail' ";
// $query = $dbh -> prepare($sql);
// $query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
$t = mysqli_query($conn, $sql);
$cnt=1;

while($result = mysqli_fetch_array($t))
{ ?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo htmlentities($result['Full_Name']);?></h5>
     <p> <b> City :</b> <?php echo htmlentities($result['City']);?><br>
       <b> Address : </b> <?php echo htmlentities($result['Address']);?><br>
    <b>  Mobile : </b> <?php echo htmlentities($result['Mobile']);?><br>
     <b>   Blood Group :</b> <?php echo htmlentities($result['Blood']);?><br>
      <b>  Category : </b><?php echo htmlentities($result['Category']);?><br>
         
        <b> Date Register :</b> <?php echo htmlentities($result['Date Register']); }}?><br>
          
          
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include('includes/sidebar.php');?>
   
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Bookings </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
<?php 
$useremail=$_SESSION['login'];
 $sql = "SELECT bed.image1 as image, bed.Bed_Name, bed.Bed_No AS bid, room.Room, bedding.Status, bedding.room
 FROM bedding JOIN bed ON bedding.room = bed.Bed_Id 
 JOIN room ON room.ID = bed.Bed_Id WHERE bedding.patient_id ='$useremail'";
$t = mysqli_query($conn, $sql);
$cnt=1;

while($result = mysqli_fetch_array($t))
{  ?>

<li>
                <div class="vehicle_img"> <a href="vehical-details.php?vhid=<?php 
                $vd = $result['image'];
                echo htmlentities($vd);?>"><img src="admin/img/vehicleimages/<?php 
                echo htmlentities($result['image']);?>" alt="image"></a> </div>
                
                 <h5 style = "color:red; float : right">Current Room</h5><br><br>
                <?php if($result['Status']==1)
                { ?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xl active-btn">Cancel Admission</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($result['Status']==2) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xl">Male</a>
            <div class="clearfix"></div>
        </div>
        <?php } else if($result['Status']==3) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xl">Female</a>
            <div class="clearfix"></div>
        </div>
        <?php } else if($result['Status']==4) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xl">Emergency </a>
            <div class="clearfix"></div>
        </div>
        <?php } else if($result['Status']==5) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xl">Intensive</a>
            <div class="clearfix"></div>
        </div>
        <?php } else if($result['Status']==6) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xl">Self Contain</a>
            <div class="clearfix"></div>
        </div>
        <?php } else if($result['Status']==7) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xl">Reception</a>
            <div class="clearfix"></div>
        </div>
        <?php } else if($result['Status']==8) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xl">You Have Discharged</a>
            <div class="clearfix"></div>
        </div>

                <?php } else { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xl">Not Admitted yet</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?>

              </li>
              <?php } ?>
             
         
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('includes/footer.php');?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>  
<script src="assets/js/interface.js"></script>   

</body>
</html>
<?php //} ?>