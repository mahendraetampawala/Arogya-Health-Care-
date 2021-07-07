<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
  include("../inc/connect.php") ;
  
    //session_start();
  $sql="SELECT * FROM medicinecategory WHERE id='".$_GET['id']."'";
  $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
// print_r($sql); exit;
    $row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
    $category=$row['category'];
    $description=$row['description'];
   
   //print_r($row); exit;
   //echo "$firstname"; exit();
?>
  <?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['submit']))
{ //echo $write; exit();
    $category=$_POST['category'];
    $description=$_POST['description'];
    
    $write=mysqli_query($conn,"UPDATE medicinecategory SET category='$category',description='$description' WHERE id='".$_GET['id']."'") or die(mysqli_error($db_connect));
   //print_r($write); exit();
      //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
      //$numrows=mysqli_num_rows($query)or die (mysqli_error());
      echo " <script>setTimeout(\"location.href='../Medicine/medicinecategory.php';\",150);</script>";
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Medicine Category
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
            <i class="fa fa-medkit"></i> <h3 class="box-title">Edit Medicine Category</h3>
           </div>
            <form method="POST" >
              <div class="box-body">
                <div class="form-group">

                  <label for="exampleInputEmail1">Category</label>
                  <select name="category" class="form-control select2"  placeholder="">
                        <option>...Select...</option>
<?php

 $p_query="SELECT * FROM medicinecategory";
$res=mysqli_query($conn,$p_query);
while ($row1 =mysqli_fetch_array($res)) {
   echo $row1['id'];?>
<option value="<?php echo $row1['category'];?>"<?php if ($category==$row1['category']) {
  echo "Selected";}?>><?php echo $row1['category'];?>
 </option>
<?php } ?></select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo $description; ?>">
                </div>
               </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form> 
    

      </div>
        </div>
      </div>
       </section>
  </div>

<?php include "../Include/footer.php";?>