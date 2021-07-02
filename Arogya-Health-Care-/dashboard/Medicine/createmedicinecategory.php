<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;

//session_start();
if(isset($_POST['submit']))
{ 
    $category=$_POST['category'];
    $description=$_POST['description'];
    
    if( $category &&  $description )
  { 
      $write =mysqli_query($conn,"INSERT INTO medicinecategory(`category`, `description`) VALUES ('$category','$description')") or die(mysqli_error());
      //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
      //$numrows=mysqli_num_rows($query)or die (mysqli_error());
       //echo " <script>alert('Records Successfully Inserted..');</script>";
      echo " <script>setTimeout(\"location.href='../Medicine/medicinecategory.php';\",150);</script>";
    }
    else
    {
    echo "<script>
      alert('Please Insert Records.. ');
      </script>";
    }     
}

?>

<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Create Medicine Category
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Medicine Category</li>
      </ol>
    </section>
     <section class="content">
      <div class="row">
<div class="col-md-12">
	  <div class="box box-primary">
            <div class="box-header with-border">
             <i class="fa fa-medkit"></i> <h3 class="box-title">Create Medicine Category</h3>
            </div>
        <form method="POST" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" class="form-control" name="category" id="exampleInputEmail1" placeholder="" required="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="" required="">
                </div>
         </div>
     <div class="box-footer">
                <button type="submit"   name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div>
     </div>
    </section>
    </div>
    
<?php include "../Include/footer.php";?>