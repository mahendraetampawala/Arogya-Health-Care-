<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;
$p_query=mysqli_query($conn,"SELECT * FROM addpayment WHERE id='".$_GET['id']."'")or die (mysqli_error($db_connect));
$p_numrows=mysqli_num_rows($p_query)or die (mysqli_error($db_connect));
$p_row1=mysqli_fetch_array($p_query);
//print_r($p_row1); exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error());
?>
<?php
    //  $subtotal=0;
          if(isset($_POST['submit']))
          { //print_r($_POST);
            
           //$subtotal=''; 
            $subtotal=$_POST['subtotal'];
            $vatper=$_POST['vatper'];
            $discount=$_POST['discount'];
            $total= $subtotal * $vatper/100 ;
            //echo $gt=$total+$subtotal;
            //echo $total;              
          $cal_discount= $subtotal * $discount/100 ;
          $GrandTotal=$subtotal+$total-$discount; 
           // $dis= $subtotal*(100-$discount)/100;
          }
          else
          {
            $subtotal=0;
            $vatper=0;
            $discount=0;
            $total=0;
            $cal_discount=0;
            $GrandTotal=0;
          }
          ?>
<?php
//include("../inc/connect.php") ;
//echo "string"; exit();
//session_start();
if(isset($_POST['submit']))
{ //echo "string"; exit();
  $vatper=$_POST['vatper'];
 $discount=$_POST['discount'];

 
  $write =mysqli_query($conn,"UPDATE addpayment SET vatper='$vatper',discount='$discount' WHERE id='".$_GET['id']."'") or die(mysqli_error($db_connect));

      //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
      //$numrows=mysqli_num_rows($query)or die (mysqli_error());
 //echo " <script>alert('Records Successfully Updated..');</script>";

    }
?>
 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Invoice
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class=""></i><b>&nbsp;&nbsp;&nbsp; Hospital Management System</b>
            <small class="pull-right">Date: <?php echo $d1=date('Y-m-d'); ?></small>
          </h2>
        </div>
       </div>
	<div class="row invoice-info">
 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 		<img src="396d647172a127fc92e2e59f5f77ef6d.jpg" width="120" height="120" alt="Stethoscope free icon" title="Stethoscope free icon">
    
		 <div class="col-sm-4 invoice-col" style="float: right;">
          <b>Invoice Number: <?php echo $p_row1['invoice'];?></b><br>
          <br>
          <b>Issue Date:</b> <?php echo $p_row1['date'];?><br>
          <b>Due Date:</b> <?php echo $p_row1['date'];?><br>
          <b>Status:</b> Paid
        </div>
    </div><br>
	<section class="invoice">
     	<div class="row">
     	 <div class="row invoice-info">
     	 <div class="col-sm-4 invoice-col" style="float: left;">
     	 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <b> Bill From</b>
          <address>
            <strong></strong>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  XYZ Hospital ,<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Nashik .
          </address>
        </div>
        <div class="col-sm-4 invoice-col" style="float: right;">
         <b>Bill To</b>
          <address>
            <strong></strong>
            <?php
			$sql="SELECT name,address,phone FROM patientregister WHERE id='".$p_row1['patient']."'";
			//echo "$sql";
			$query=mysqli_query($conn,$sql)or die (mysqli_error($db_connect));
			$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
			$row1=mysqli_fetch_array($query);
			?>
            <?php echo $row1['name'];?> ,<br>
           	<?php echo $row1['address'];?> ,<br>
           	<?php echo $row1['phone'];?> .
          </address>
        </div>
 		</div>
      </div>
  </section>
   <div class="row">
	<div class="col-xs-12 table-responsive">
        	<h3>Invoice Entries </h3>
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Entry</th>
              <th>Price</th>
             </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Test Charges</td>
              <td><?php echo $p_row1['subtotal'];?></td>
            </tr>
           </tbody>
          </table>
        </div>
      </div>
	 <div class="row">
	<div class="col-xs-6" style="float: right;">
	<form method="POST">
       <div class="table-responsive">
          <table class="table">
             <tr>
              <th style="width:50%">Subtotal:<input type="hidden" name="subtotal" value="<?php echo $p_row1['subtotal'];?>"></th>
           		 <td><?php echo $p_row1['subtotal'];?></td> 
             </tr>
             <tr>
                <th>Vat<br>Percentage:<input type="percentage" name="vatper"></th>
			<td><?php  echo $total;?>
				</td>
				</td>
              </tr>
              <tr>
                <th>Discount:<input type="percentage" name="discount" ><br><br>
                	<input type="submit" name="submit" value="submit">
                </th>
                <td><?php  echo $cal_discount;?></td>
              </tr>
            </table>
          </div>
          </form>
        </div>
      </div>
	 <section class="invoice">
     	<div class="row">
     	 <div class="row invoice-info">
       		 <a href="./PDF/invoicepdf.php?id=<?php echo $p_row1['id'];?>"><button type="button" class="btn btn-success"><i class="fa fa-print"></i>    Generate PDF</button></a>
       		  <div class="col-xs-6" style="float: right;">
				<lable>Grand Total:</lable>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       		<?php echo  $GrandTotal; ?>
 				</div>
		</div>
	 </div>
  </section>
  </section>
    <div class="clearfix">
   </div>
  </div>
 

<?php include "../Include/footer.php";?>