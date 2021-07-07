<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php 
  include("../inc/connect.php") ;
  $m_sql="SELECT * FROM medicinecategory ";
  $m_write =mysqli_query($conn,$m_sql) or die(mysqli_error($db_connect));
 // print_r($sql); exit;
    $m_row=mysqli_fetch_array($m_write)or die (mysqli_error($db_connect));
    $category=$m_row['category ']; 
//     function mysqli_fetch_all1($query) {
//     $all = array();
//     while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
//     return $temp;
// }
    //session_start();
  $sql="SELECT * FROM addnewmedicine WHERE id='".$_GET['id']."'";
  $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
 // print_r($sql); exit;
    $row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
    $name=$row['name'];
    $category=$row['category'];
    $price=$row['price'];
    $quantity=$row['quantity'];
    $genericname=$row['genericname'];
    $company=$row['company'];
    $effect=$row['effect'];
    $expiredate=$row['expiredate'];
   //print_r($row); exit;
   //echo "$firstname"; exit();
?>
<?php
include("../inc/connect.php") ;

//session_start();
if(isset($_POST['submit']))
{ 
    $name=$_POST['name'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $genericname=$_POST['genericname'];
    $company=$_POST['company'];
    $effect=$_POST['effect'];
    $expiredate=$_POST['expiredate'];
   
    
    
      $write =mysqli_query($conn,"UPDATE addnewmedicine SET name='$name',category='$category',price='$price',quantity='$quantity',genericname='$genericname',company='$company',effect='$effect',expiredate='$expiredate' WHERE id='".$_GET['id']."'") or die(mysqli_error());
      //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
      //$numrows=mysqli_num_rows($query)or die (mysqli_error());
     echo " <script>setTimeout(\"location.href='../Medicine/medicinelist.php';\",150);</script>";
}

?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Edit Medicine
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Medicine</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
<div class="col-md-12">
    <div class="box box-primary">
            <div class="box-header with-border bg-blue">
             <i class="fa fa-plus"></i> <h3 class="box-title">Edit Medicine</h3>
            </div>
        <form method="POST" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="name" class="form-control" name="name" id="exampleInputEmail1" placeholder="" value="<?php echo   $name;?>">
                </div>
                <div class="form-group">
<label for="exampleInputEmail1">Category</label><br>
<select name="category" class="form-control select2"  placeholder="">
<?php

 $p_query="SELECT * FROM medicinecategory";
 //echo $p_query;
$res=mysqli_query($conn,$p_query);
while ($row1 =mysqli_fetch_array($res)) {
   echo $row1['id'];?>
<option value="<?php echo $row1['id'];?>"<?php if ($category==$row1['id']) {
  echo "Selected";}?>><?php echo $row1['category'];?>
 </option>
<?php } ?></select>

</div>
<div class="form-group">
<label for="exampleInputFile">Price</label>
<input type="price" name="price" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo  $price;?>">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Quantity</label>
<input type="quantity" name="quantity" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo  $quantity;?>">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Generic Name</label>
<input type="generiname" name="genericname" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo  $genericname;?>">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Company</label>
<input type="company" name="company" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo  $company;?>">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Effects</label>
<input type="effects" name="effect" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo   $effect;?>">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Expire Date</label>
<input type="expiredate" name="expiredate" class="form-control" id="exampleInputPassword1" placeholder="" value="<?php echo  $expiredate ;?>">
</div>
</div>
<div class="box-footer">
<button type="submit"  name="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
      </div>
      </div>
     </section>
   </div>
<?php include "../Include/footer.php";?>