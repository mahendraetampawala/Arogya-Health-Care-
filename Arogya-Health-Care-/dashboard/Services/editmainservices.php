<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
  include("../inc/connect.php") ;
  
    //session_start();
  $sql="SELECT * FROM mainservices WHERE id='".$_GET['id']."'";
  $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
// print_r($sql); exit;
    $row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
    $id=$row['id'];
    $mainservicename=$row['mainservicename'];
   
   //print_r($row); exit;
   //echo "$firstname"; exit();
?>
<?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['submit']))
{ //echo $write; exit();
    $id=$_POST['id'];
    $mainservicename=$_POST['mainservicename'];
    
    $write=mysqli_query($conn,"UPDATE mainservices SET mainservicename='$mainservicename' WHERE id='".$_GET['id']."'") or die(mysqli_error($db_connect));
   
      echo " <script>setTimeout(\"location.href='../Services/addservices.php';\",150);</script>";
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Main Services
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Main Services</li>
      </ol>
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <form method="POST">
                <input type="hidden" class="form-control" name="id" id="exampleInputEmail1" placeholder=""><br>
              <label>Main Service Name</label><br>
            <input type="name" class="form-control" name="mainservicename" id="exampleInputEmail1" placeholder="" value="<?php echo $mainservicename;?>">
            <br><br>
              <button type="submit" name="submit" class="btn btn-primary">Update</button><br>
              </form>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<?php include "../Include/footer.php";?>