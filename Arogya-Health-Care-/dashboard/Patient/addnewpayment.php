<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;
//echo "string"; exit();
//session_start();
if(isset($_POST['b1']))
{ //echo "string"; exit();
  $invoice=$_POST['invoice'];
  $patient=$_POST['patient'];
  //$refdbydoctor=$_POST['refdbydoctor'];
  $a=$_POST['categoryselect'];
  //print_r($a)
  //print_r(implode(",",(array)$a));
  $categoryselect=$_POST['service'];
    $subtotal=$_POST['subtotal'];
    $addp_discount=$_POST['addp_discount'];
    $grosstotal=$_POST['grosstotal'];
    $amountreceived =$_POST['amountreceived'];
    //$date=$_POST['date'];
  $write =mysqli_query($conn,"INSERT INTO addpayment(`invoice`,`patient`,`categoryselect`,`subtotal`,`addp_discount`,`grosstotal`,`amountreceived`) VALUES ('$invoice','$patient','$categoryselect','$subtotal','$addp_discount','$grosstotal','$amountreceived')") or die(mysqli_error($db_connect));
      //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
      //$numrows=mysqli_num_rows($query)or die (mysqli_error());
       echo " <script>alert('Records Successfully Inserted..');</script>";
//header("location:paymenthistory.php?id=".$p_row1['id']);
  //  header("location:./Patient/paymenthistory.php");
    }
?>
<?php
//include("../inc/connect.php") ;
$q1=mysqli_query($conn,"SELECT * FROM mainservices")or die (mysqli_error());
$p_numrows=mysqli_num_rows($q1)or die (mysqli_error());
$m_row=mysqli_fetch_all1($q1);

$p_query=mysqli_query($conn,"SELECT * FROM patientregister WHERE  id='".$_GET['id']."'")or die (mysqli_error());
$p_numrows=mysqli_num_rows($p_query)or die (mysqli_error());
$p_row1=mysqli_fetch_array($p_query);

// $sql="SELECT * FROM addpayment ";
// //SELECT `id`, `invoice`,`depositammount`,`date` FROM addpayment
// $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
// // print_r($sql); exit;
// $a_row=mysqli_fetch_all1($write)or die (mysqli_error($db_connect));

function mysqli_fetch_all1($query)
 {
  $temp='';
    $all = array();
    while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
    return $temp;
}
//print_r($a_row); exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error());
?>
<?php
//include("../inc/connect.php") ;
//session_start();
if(isset($_POST['submit']))
{
  // $doctor=$_POST['doctor'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $birthdate=$_POST['birthdate'];
    $bloodgroup=$_POST['bloodgroup'];
    
  $target_dir="../Upload/";
   $imgname=$_FILES["imageupload"]["name"];
   $type = $_FILES["imageupload"]["type"];
   $size = $_FILES["imageupload"]["size"];

   $temp = $_FILES["imageupload"]["tmp_name"]; 
   $error = $_FILES["imageupload"]["error"];//size
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
    { move_uploaded_file($temp,"../Upload/".$imgname);//move upload file  
      echo"Upload Complete";
    }
  }
      $imageupload=$_FILES["imageupload"]["name"];

   $write =mysqli_query($conn,"INSERT INTO patientregister(`doctor`,`name`,`email`,`password`,`address`,`phone`,`gender`,`birthdate`,`bloodgroup`,`imageupload`) VALUES ('$doctor','$name','$email','$password','$address','$phone', '$gender','$birthdate','$bloodgroup','$imageupload')") or die(mysqli_error($db_connect));
      //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
     //$numrows=mysqli_num_rows($query)or die (mysqli_error());
      echo " <script>alert('Records Successfully Inserted..');</script>";
    }
    ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
       Add New Payment
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
             <i class="fa fa-plus-circle"></i> <h3 class="box-title">Add New Payment </h3>
            </div>
                
<div class="container">
  
  <!-- Trigger the modal with a button -->
   <!-- <a href="./patientregister.php"> --><button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="height: 40px;"><i class="fa fa-plus-square"></i> Register Patient</button><!-- </a> --><br><br>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Patient Register</h4>
        </div>
        <div class="modal-body">
                 <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
               <!--  <div class="form-group">
                  <label for="exampleInputEmail1">Doctor</label>
                  <input type="name" class="form-control" name="doctor" id="exampleInputEmail1" placeholder="">
                </div> -->
                <div class="form-group">
                  <label for="exampleInputEmail1">Full Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="">
                 
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="Email" name="email" class="form-control" id="exampleInputPassword1" placeholder="">
                 
                </div>
          <!--       <div class="form-group">
                  <label for="exampleInputFile">Password</label>
                  <input type="Password" name="password" class="form-control" id="exampleInputPassword1" placeholder="">
                  
                </div> -->
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone</label>
                  <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Gender</label>
                 <select name="gender" class="form-control" id="exampleInputPassword1" placeholder="">
                                    <option value="" disabled selected="selected"> Select Category</option>
                          <option value="Male">Male</option> <option value="Female">Female</option>
                           <option value="Other">Other</option>
                                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Birthdate</label>
                  <input type="date" name="birthdate" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Bloodgroup</label>
<select name="bloodgroup" class="form-control" id="c" placeholder="">
<option value="" disabled selected="selected"> Select Category</option>
<option value="A+">A+</option> <option value="A-">A-</option>
<option value="B+">B+</option><option value="B-">B-</option> <option value="AB+">AB+</option> <option value="AB-">AB-</option> <option value="O+">O+</option><option value="O-">O-</option>
</select>
                </div>
                <td><b>Image Upload</b></font>
    <input type="file" name="imageupload" id="fileToUpload"></td>
              </div>
      <div class="box-footer">
                <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <form method="POST" >
  <div class="col-md-4">
<label>Invoice Number</label>
  <?php 
$query = "SELECT * FROM addpayment ORDER BY id DESC LIMIT 1";
$w4=mysqli_query($conn,$query) or die(mysqli_error($db_connect));
$r4=mysqli_fetch_array($w4)or die (mysqli_error($db_connect));
// $result = mysqli_query($conn,$query);
// mysqli_num_rows($result);
$no=$r4['id'];
        ?>
         <input type="text" name="invoice" class="form-control" placeholder="" value="INV-<?php echo sprintf("%'.08d",$no);?>">
<br>
  <label >Patient</label><br>
  <input type="text" name="p_name" value="<?php echo $p_row1['name'];?>" class='form-control' placeholder='' readonly>
  <input type="hidden" name="patient" value="<?php echo $p_row1['id'];?>">
  <br>
   
 <label> Select</label>
<select name="categoryselect[]" id="categoryselect" placeholder="" class='form-control'>
  <option>--Select One--</option>
  <?php foreach ($m_row as $p) {?>
  <option value="<?php echo $p['id'];?>"><?php echo $p['mainservicename'];?></option>
<?php } ?>  
</select>
<input type ="hidden" name="service" id="service" value="">
<select name="subservice" id="subservice" size="10" style="width: 100px;" multiple="multiple">

</select>
</div>  
 <div class="col-md-2">
<div class="box" style="height: 100px;">
  
  <div id="sub"></div>
  </div>
</div>
<div class="col-md-6"  style="float:right;">
  <br>
 <label> Sub Total</lable>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  <input type ="text" name="subtotal" id="subtotal" value="0"><br><br>
  <input type ="hidden" name="temp" id="temp" value="">
<label> Discount %</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type ="number" name="addp_discount" id="chDiscount" ><br><br>
   <label> Gross Total</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  <input type ="text" name="grosstotal" id="result" value="0"><br><br>
   <label> Amount  Recieved</label>
 <input type ="text" name="amountreceived" ><br><br>
 <button type="submit" name="b1" class="btn btn-success" >Submit</button>
            </div>
           </form>
       </div>
   </div>
</div>
</div>
</section>
</div>
<?php include "../Include/footer.php";?>
<script type="text/javascript">
$('#categoryselect').on('change', function()
 {
  var id=this.value;
  $.ajax({
    url:'ajax.php',
    type:'POST',
    data:{ajax_id:id}
  }).done(function(result)
  {
    $('#subservice').html(result);
  })
  
})
var a=0;
var b='';
$('#subservice').on('change', function()
 {
  
  var service_id=this.value;
  $.ajax({
    url:'ajaxsub.php',
    type:'POST',
    data:{sub_id:service_id}
  }).done(function(result)
  {
    //$('#sub').append(result);
    $('#sub').append("<br> Fee: " + result);
    var temp=$('#temp').val(result); 
    //$('#subtotal')=a+result;
    //alert(sum)
    submit(temp);
    list(service_id);
  })  
  function submit(temp)
  {
    var add=temp.val();
    a+=+add;
    $('#subtotal').val(a);
  }
  function list(service)
  {
    var add=service;
    b=b+','+add;
    //alert(b);
    $('#service').val(b);
  }
});
$(document).on("change keyup blur", "#chDiscount", function() {
var main = $('#subtotal').val();
var disc = $('#chDiscount').val();
var dec = (disc/100).toFixed(2); //its convert 10 into 0.10
var mult = main*dec; // gives the value for subtract from main value
var discont = main-mult;
$('#result').val(discont);
//alert(discont);
});
</script>