
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="#"><img src ="  images/favicon/favicon-32x32.png" alt="image"/></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <p class="uppercase_text">E-Mail us : </p>
              <a href="#" >infoarogyahealth@gmail.com</a> </div>
            <div class="header_widgets">
              
              <p class="uppercase_text">Call Us: </p>
              <a href="tel:61-1234-5678-09">+11 24 424 42</a> </div>
            <div class="social-follow">
              
            </div>
   <?php   
   $login = isset($_SESSION['login'])?$_SESSION['login']:"";
   if(strlen($login) ==0)
	{	
?>
  <a href="#loginform" data-toggle="modal"><b>Login / Register <b/> </a> 
<?php }
else{ 

echo isset($_SESSION['login'])?$_SESSION['login'].",":""." You are welcome To Hummu Hospital";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
 
  <nav id="navigation_br" class="navbar navbar-default">
    <div class="container">
      
  <?php   if(strlen($login) > 0)
  { 
?>      
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" style="color: red;" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
$email=$_SESSION['login'];
$sql ="SELECT Full_Name FROM users WHERE Email='$email' ";
$t = mysqli_query($conn, $sql);
$cnt=1;
$result = mysqli_fetch_array($t);
//   if($result)
// {  

	 echo htmlentities($result['Full_Name']); //}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php" style="color: red;">Profile Settings</a></li>
  
            <li><a href="my-booking.php" style="color: red;">My Current Room</a></li>
            <li><a href="logout.php" style="color: red;">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal" style="color: red;">Profile Settings</a></li>

            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal" style="color: red;">My current Room</a></li> 
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal" style="color: red;">Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>

      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
        
          	
          <li><a href="room-listing.php" style="color: red;">Reguest for Room</a>
     

        </ul>
      </div>
    </div>
 <?php }
else{ 
?>
      <div class="header_wrap">
         

      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
        
            
          <li><a href="room-listing.php" style="color: red;">Available Room Listing</a>
          <li><a href="search-roomresult.php"></a>
         

        </ul>
      </div>
    </div>
 <?php }

  ?>
  </nav>
  
</header>