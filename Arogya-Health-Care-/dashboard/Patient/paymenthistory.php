<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;

//session_start();
if(isset($_POST['submit']))
{//print_r($_POST); exit();
$invoice=$_POST['invoice'];
$depositammount=$_POST['depositammount'];
$d1=date('Y-m-d');
//$id=$_GET['id'];

$query=mysqli_query($conn,"UPDATE addpayment SET depositammount='$depositammount',date='$d1' WHERE id='".$_POST['invoice']."'") or die(mysqli_error($db_connect));

//echo " <script>setTimeout(\"location.href='../Patient/paymenthistory.php';\",250);</script>";
//echo "<script>alert('Records Successfully Inserted..');</script>";
}
?>
<?php
//include("../inc/connect.php") ;
$id=$_GET['id'];
$p_query=mysqli_query($conn,"SELECT * FROM patientregister WHERE id='".$_GET['id']."'")or die (mysqli_error());
$p_numrows=mysqli_num_rows($p_query)or die (mysqli_error());
$p_row1=mysqli_fetch_array($p_query);

$sql="SELECT * FROM addpayment WHERE patient='".$id."'";
$write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
// print_r($sql); exit;
$a_row=mysqli_fetch_all1($write)or die (mysqli_error($db_connect));
//print_r($a_row);exit;
//$id=$_GET['id']

function mysqli_fetch_all1($query)
 {
    $temp='';
$all = array();
while ($all[] = mysqli_fetch_assoc($query))
{

    $temp=$all;
}
return $temp;
}
//print_r($p_row1); exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error());
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Patient History
        <small> </small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient History</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-money"></i> <h3 class="box-title"><b>Patient History</b></h3>
                </div>
                <div>&nbsp;&nbsp;
                <a href="addnewpayment.php?id=<?php echo $p_row1['id'];?>"> <button type="button" class="btn  btn-default" style="height: 40px;"><i class="fa fa-plus-circle"></i> Add Payment</button></a>&nbsp;&nbsp;

                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="height: 40px;"><i class="fa fa-plus-circle"></i> Add Deposit</button>
            </div><br>
                <!--Patient Info Right-->
        <div class="col-md-4 pull bottom" style="float: right;"><br>
        Name:<br>
        <?php echo $p_row1['name'];?><br><br>

        Address:<br>
        <?php echo $p_row1['address'];?><br><br>
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-envelope-o"></i><span style="float: right;"><?php echo $p_row1['email'];?></span><br>
                <i class="fa  fa-phone"></i><span style="float: right;"> <?php echo $p_row1['phone'];?></span>
            </div>
        </div>
    <!-- Green Box-->
     <!--For Bill Amount-->
           <div class="alert alert-success alert-dismissible" style="height: 80px;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-money"></i> Total Bill Amount</h4>
            <?php 
            $sql3="SELECT sum(subtotal) as subtotal FROM addpayment WHERE patient='".$_GET['id']."'";
           // print_r($sql3); exit();
           $write3=mysqli_query($conn,$sql3) or die(mysqli_error($db_connect));
           $row3=mysqli_fetch_array($write3)or die (mysqli_error($db_connect));
          //print_r($row3); exit;
          ?>
         <center><font size="5"> Rs. <?php echo $row3['subtotal'];?></font></center>
          </div>
           <!--For Bill Amount End-->

        <!--For Deposit-->
          <div class="alert alert-success alert-dismissible" style="height: 80px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="fa fa-money"></i> Total Deposit Amount</h4>
        <?php 
        $sql4="SELECT sum(depositammount) as depositammount FROM addpayment WHERE patient='".$_GET['id']."'";
        // print_r($sql3); exit();
        $write4=mysqli_query($conn,$sql4) or die(mysqli_error($db_connect));
        $row4=mysqli_fetch_array($write4)or die (mysqli_error($db_connect));
        //print_r($row3); exit;
        ?>
        <center><font size="5"> Rs. <?php echo $row4['depositammount'];?></font></center>
        </div>
   <!--For Deposit End-->

   <!--For Due Amount End-->
   <div class="alert alert-success alert-dismissible" style="height: 80px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-money"></i> Due Amount</h4>
        <?php $r1= $row3['subtotal']-$row4['depositammount'];?>
        <center><font size="5"> Rs.<?php echo $r1;?></font>
        </center>
           </div>
 <!--For Due Amount End-->
    <!-- Green Box End-->
        <!--Patient Info Right-->
         <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Deposit</h4>
        </div>

        <div class="modal-body">
        <form method="POST" >

        <div class="form-group">
        <label for="exampleInputPassword1">Invoice</label>
        <select name="invoice" class="form-control"  placeholder="" >
 <?php foreach ($a_row as $p) {?>
<option value="<?php echo $p['id'];?>"><?php echo  $p['invoice'];?></option>
<?php } ?>
</select>
           </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Deposit Amount</label>
        <input type="text" name="depositammount" class="form-control" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="form-group">
        <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
        &nbsp;&nbsp;&nbsp;
       
       </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
     </div>
 </div><br><br><br>
         <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
        <i class="fa fa-money"></i> <h3 class="box-title">All Bills & Deposits</h3>
        </div>
        <!-- <input type="button" value="Print" id="btnPrint" /> -->
        <!-- /.box-header -->
        <!-- form start -->
        <div id="dvContainer">
        <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
        <tr>
        <th>Date</th>
        <th>Invoice #</th>
        <th>Bill Amount</th>
        <th>Deposit</th>
        <th>Options</th>
        </tr>


        <?php if(count($a_row)>0) 
        { 
        foreach ($a_row as $row) { ?>
        <tr>
        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['invoice'];?></td>
        <td><?php echo $row['subtotal']; ?></td>
        <td><?php echo $row['depositammount'];?></td>
        <td><?php if (!empty($row['depositammount']))
         {
            ?><a href="editdeposit.php?id=<?php echo $row['id']; ?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit"></i>  Deposit</button></a>
            <?php } else{?>
                 <a href="editpayment.php?id=<?php echo $row['id'];?>"> <button type="button" class="btn btn-success"><i class="fa fa-edit"></i>  Payment</button></a>

           <?php }  ?><a href="delete2.php?id=<?php echo $row['id']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</span></a>

         <a href="printinvoice.php?id=<?php echo $row['id'];?>"> <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button></a></td>
       
        </tr>
        <?php } } else
         { ?>
    <tr>
        <td colspan="3">No Record Found</td>
</tr>
      <?php  } ?>
       </table>
   </div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<?php include "../Include/footer.php";?>