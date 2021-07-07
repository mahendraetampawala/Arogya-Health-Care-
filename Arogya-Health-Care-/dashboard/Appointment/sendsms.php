<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;

$p_query=mysqli_query($conn,"SELECT phone FROM patientregister WHERE id='".$_GET['id']."'")or die (mysqli_error($db_connect));
$p_numrows=mysqli_num_rows($p_query)or die (mysqli_error($db_connect));
$p_row1=mysqli_fetch_array($p_query);
if (isset($_POST['send'])) 
{
 $recipient=$_POST['recipient'];
 $message=$_POST['message'];
 send_sms($message,$recipient);
}
function send_sms($message = '' , $reciever_phone = '')
    {
        $authKey       = '5295A0uYqutLt9598ad24e';
        $senderId      = 'UPTURN';

        //Multiple mobiles numbers separated by comma
        $mobileNumber = $reciever_phone;

        //Your message to send, Add URL encoding here.
        $message = urlencode($message);

        //Define route
        $route = "6";
        //Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );
        //API URL
    $url="http://sms.upturnit.com/api/sendhttp.php";
   
        

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);

        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);
        return true;
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Send SMS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Send SMS</li>
      </ol>
    </section>
     <section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-md-12">
<div class="box box-primary">
<div class="box-header with-border">
   <h1>Send SMS</h1>
   <form method=post>
   
    Recipient:
<input type="text" name="recipient" value="<?php echo $p_row1['phone'];?>" readonly>
<br><br>
    Message:
<textarea  rows=4 cols=40 name='message'></textarea><br><br>
<input type="submit" name="send" value="Send" style="width: 100px;">

<a href="./upcomming.php"><button type="button" name="message" value="Cancel" style="width: 100px;height: 25px">Cancel</button></a>
   </form>
 </div>
</div>
</div>
</div>
</section>
 </div>
 
<?php include "../Include/footer.php";?>
