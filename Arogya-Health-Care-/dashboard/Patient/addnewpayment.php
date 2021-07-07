<?php
  session_start();
?>
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

$p_query=mysqli_query($conn,"SELECT * FROM patient WHERE  NIC='".$_GET['NIC']."'")or die (mysqli_error());
$p_numrows=mysqli_num_rows($p_query)or die (mysqli_error());
$p_row1=mysqli_fetch_array($p_query);



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