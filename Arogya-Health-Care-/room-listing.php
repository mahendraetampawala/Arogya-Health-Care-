<?php 
session_start();
include('includes/config.php');
// error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Rooms || Arogya Hospitals</title>
<!-- responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- master stylesheet -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Responsive stylesheet -->
  <link rel="stylesheet" href="css/responsive.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">







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

       


</head>
<body>
<div class="boxed_wrapper">

<!--Start Preloader -->
<div class="preloader"></div>
<!--End Preloader --> 

<!--Start header area-->

<!--Start top bar area-->
<section class="top-bar-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <div class="top-left">
                    <p><span class="flaticon-phone"></span>24 hours emergency & ambulance Service: +11 313 13 422</p> 
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <div class="top-right clearfix">
                    <ul class="social-links">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End top bar area-->  

<!--Start header area--> 
<section class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="index.html">
                        <img src="images/resources/logo.png" alt="Awesome Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="header-right">
                    <ul>
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-technology"></span>
                            </div>
                            <div class="text-holder">
                                <h4>Call us now</h4>
                                <span>+11 433 43 224</span>    
                            </div>
                        </li>
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-pin"></span>
                            </div>
                            <div class="text-holder">
                                <h4>121 Park Drive</h4>
                                <span>Regent Street, Colombo 10</span>    
                            </div>
                        </li>
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-agenda"></span>
                            </div>
                            <div class="text-holder">
                                <h4>Mon - Satday</h4>
                                <span>09.00am to 18.00pm</span>    
                            </div>
                        </li>        
                    </ul>
                    <div class="search-button pull-right">
                        <div class="toggle-search">
                            <button><i class="fa fa-search" aria-hidden="true"></i></button>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>   
<!--End header area-->  

<!--Start header-search  area-->
<section class="header-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="search-form pull-right">
                    <form action="#">
                        <div class="search">
                            <input type="search" name="search" value="" placeholder="Search">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End header-search  area-->        

<!--Start mainmenu area-->
<section class="mainmenu-area stricky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--Start mainmenu-->
                <nav class="main-menu pull-left">
                    <div class="navbar-header">     
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li><a href="index.html">Home</a></li>
                            <li class="dropdown current"><a href="about.html">About Us</a>
                                <ul>
                                    <li><a href="about.html">About Hospitals</a></li>
                                    <li><a href="doctors.html">Meet Our Doctors</a></li>
                                    <li><a href="faq.html">FAQ’s</a></li>
                                    <li><a href="testimonials.html">Testimonials</a></li>
                                    <li><a href="project.html">Our Gallery</a></li>
                                    <li><a href="project-single.html">Gallery Single</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="departments.html">Departments</a>
                                <ul>
                                    <li><a href="cardiac-clinic.html">Cardiac Clinic</a></li>
                                    <li><a href="pulmonology.html">Pulmonology</a></li>
                                    <li><a href="gynecology.html">Gynecology</a></li>
                                    <li><a href="neurology.html">Neurology</a></li>
                                    <li><a href="urology.html">Urology</a></li>
                                    <li><a href="gastrology.html">Gastrology</a></li>
                                    <li><a href="pediatrician.html">Pediatrician</a></li>
                                    <li><a href="laborotory.html">Laborotory</a></li>
                                </ul>
                            </li>
                            <li><a href="time-table.html">Time Table</a></li>
                        
                           <li><a href="time-table.html">Rooms</a></li>

                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
                <!--End mainmenu-->
               <!--Start mainmenu right box-->
                <div class="mainmenu-right-box pull-right">
                    
                    <div class="consultation-button">
                        <a href="Arogya/registration.php">Patient Registration</a>    
                    </div>
                </div>  
            </div>
        </div>
    </div>
</section>
<!--End mainmenu area-->

<!--Start breadcrumb area-->     
<section class="breadcrumb-area" style="background-image: url(images/resources/breadcrumb-bg.jpg);">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="breadcrumbs">
                  <h1>Rooms</h1>
              </div>
          </div>
      </div>
  </div>
  <div class="breadcrumb-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="left pull-left">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="active">Rooms</li>
                        </ul>
                    </div>
                    <div class="right pull-right">
                        <a href="#">
                            <span><i class="fa fa-share-alt" aria-hidden="true"></i>Share</span> 
                        </a>   
                    </div>    
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->



 <div class="mainmenu-right-box pull-right">
                    
                    <div class="consultation-button">
                        <a href="admin/index.php">Room Administrator Login</a>    
                    </div>
                </div>  








<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php 

$sql = "SELECT DISTINCT bed.*,room.Room as bid, bedding.Status as status from bed 
INNER join room on room.ID = bed.Bed_Id 
INNER JOIN bedding ON bedding.room = room.ID WHERE status = '1' OR status = '8' ";
// $sql = "SELECT bed.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands 
//on tblbrands.id=tblvehicles.VehiclesBrand";

$t = mysqli_query($conn, $sql);

$sq = "SELECT DISTINCT bed.*,room.Room as bid,COUNT(*) as count, bedding.Status as status from bed 
          INNER join room on room.ID = bed.Bed_Id 
    INNER JOIN bedding ON bedding.room = room.ID WHERE status = '1' OR status = '8'";
    $ok = mysqli_query($conn, $sq);
    $re = mysqli_fetch_array($ok);
?>

<p><span><h3 style = "color:red"><?php echo htmlentities($re['count']);?></h3> Rooms Available for Listing</span></p>
</div>
</div>


<?php
  while($result = mysqli_fetch_array($t))
{  
  $count += $count;
  ?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result['image1']);?>" class="img-responsive" alt="Image" /> </a> 
          </div>
          <div class="product-listing-content">
            <h5><a href="room-details.php?vhid=<?php echo htmlentities($result['Bed_No']);?>"
            ><?php echo htmlentities($result['bid']);?> , <?php echo htmlentities($result['Bed_Name']);?></a></h5>
           <ul>
           <i class="list-price">Description :</i> <p > <?php echo htmlentities($result['description']);?> </p>
            
              <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result['capacity']);?> Beds</li>

            </ul>
           
          </div>
        </div>
        
      <?php 
    } ?>
         </div>
     
              
            </ul>
          </div>
        </div>
      </aside>
    
    </div>
  </div>
</section>





<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>





















<!--Start footer area-->  
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <!--Start single footer widget-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="single-footer-widget pd-bottom50">
                    <div class="title">
                        <h3>About Hospitals</h3>
                        <span class="border"></span>
                    </div>
                    <div class="our-info">
                        <p>The relentless service of Hospitals in the past 25 years taken health care to the most modern levels in the region catering to urban & rural.</p>
                        <p class="mar-top">A Health Care Provider of Western Approach, Hospitals is the most trusted multispecialty hospital.</p>
                        <a href="#">Know More<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->
            <!--Start single footer widget-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="single-footer-widget pd-bottom50">
                    <div class="title">
                        <h3>Usefull Links</h3>
                        <span class="border"></span>
                    </div>
                    <ul class="usefull-links fl-lft">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Awards</a></li>
                        <li><a href="#">Consultants</a></li>
                        <li><a href="#">Working Hours</a></li>
                        <li><a href="#">Procedures</a></li>
                        <li><a href="#">Special Offers</a></li>
                        <li><a href="#">FAQ’s</a></li>
                    </ul>
                    <ul class="usefull-links">
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Healthy Foods</a></li>
                        <li><a href="#">Appointments</a></li>
                        <li><a href="#">Latest News</a></li>
                        <li><a href="#">Certificates</a></li>
                        <li><a href="#">Qualifications</a></li>
                    </ul>
                </div>
            </div>
            <!--End single footer widget-->
            <!--Start single footer widget-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="single-footer-widget mar-bottom">
                    <div class="title">
                        <h3>Contact Details</h3>
                        <span class="border"></span>
                    </div>
                    <ul class="footer-contact-info">
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-pin"></span>
                            </div>
                            <div class="text-holder">
                                <h5>Park Drive, Varick Str New York,<br> Regent Street, Colombo 10</h5>
                            </div>
                        </li>
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-interface"></span>
                            </div>
                            <div class="text-holder">
                                <h5>info@arogyahealth.com</h5>
                            </div>
                        </li>
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-technology-1"></span>
                            </div>
                            <div class="text-holder">
                                <h5>+11 433 43 224</h5>
                            </div>
                        </li>
                        <li>
                            <div class="icon-holder">
                                <span class="flaticon-clock"></span>
                            </div>
                            <div class="text-holder">
                                <h5>Mon-Satday: 9am to 18pm</h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Start single footer widget-->
            <!--Start single footer widget-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="single-footer-widget clearfix">
                    <div class="title">
                        <h3>Make an Appointment</h3>
                        <span class="border"></span>
                    </div>
                    <form class="appointment-form" action="#">
                        <div class="input-box">
                            <input type="text" name="form_name" value="" placeholder="Your Name" required="">
                            <div class="icon-box">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="input-box">
                            <input type="email" name="form_email" value="" placeholder="Your Email" required="">
                            <div class="icon-box">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="input-box">
                            <textarea name="form_message" placeholder="Your Message.." required="" aria-required="true"></textarea>
                        </div>
                        <button type="submit">submit</button>
                    </form>
                </div>
            </div>
            <!--End single footer widget-->
        </div>
    </div>
</footer>   
<!--End footer area-->

<!--Start footer bottom area-->
<section class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright-text">
                   <p>Copyrights © 2021 All Rights Reserved, Powered by <a href="#">Arogya Hospitals.</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="footer-social-links">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End footer bottom area-->

</div>

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-triangle-inside-circle"></span></div>

<!-- main jQuery -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- Wow Script -->
<script src="js/wow.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- bx slider -->
<script src="js/jquery.bxslider.min.js"></script>
<!-- count to -->
<script src="js/jquery.countTo.js"></script>
<!-- owl carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- validate -->
<script src="js/validation.js"></script>
<!-- mixit up -->
<script src="js/jquery.mixitup.min.js"></script>
<!-- easing -->
<script src="js/jquery.easing.min.js"></script>
<!-- gmap helper -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHzPSV2jshbjI8fqnC_C4L08ffnj5EN3A"></script>
<!--gmap script-->
<script src="js/gmaps.js"></script>
<script src="js/map-helper.js"></script>
<!-- fancy box -->
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.appear.js"></script>
<!-- isotope script-->
<script src="js/isotope.js"></script>
<script src="js/jquery.prettyPhoto.js"></script> 
<script src="js/jquery.bootstrap-touchspin.js"></script>
<!-- jQuery timepicker js -->
<script src="assets/timepicker/timePicker.js"></script>
<!-- Bootstrap select picker js -->
<script src="assets/bootstrap-sl-1.12.1/bootstrap-select.js"></script>                               
<!-- Bootstrap bootstrap touchspin js -->
<!-- jQuery ui js -->
<script src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>
<!-- Language Switche  -->
<script src="assets/language-switcher/jquery.polyglot.language.switcher.js"></script>
<!-- Html 5 light box script-->
<script src="assets/html5lightbox/html5lightbox.js"></script>


<!-- revolution slider js -->
<script src="assets/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="assets/revolution/js/extensions/revolution.extension.video.min.js"></script>



<!-- thm custom script -->
<script src="js/custom.js"></script>





</body>


</html>











