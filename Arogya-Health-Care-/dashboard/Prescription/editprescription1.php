<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>  


<?php 
  include("../inc/connect.php") ;
  
    //session_start();
  $sql="SELECT * FROM addnewpres WHERE id='".$_GET['id']."'";
  $write =mysqli_query($conn,$sql) or die(mysqli_error($db_connect));
 // print_r($sql); exit;
    $row=mysqli_fetch_array($write)or die (mysqli_error($db_connect));
    $date =$row['date'];
    $patient=$row['patient'];
    $history=$row['history'];
    $medication=$row['medication'];
    $note=$row['note'];
   
    //echo $row['date  ']; exit();
   //print_r($row); exit;
   //echo "$firstname"; exit();
?>
<?php
//include("../inc/connect.php") ;

//session_start();
if(isset($_POST['submit']))

{
    $date=$_POST['date'];
    $patient=$_POST['patient'];
    $history=$_POST['history'];
    $medication=$_POST['medication'];
    $note=$_POST['note'];
   
      $write =mysqli_query($conn,"UPDATE addnewpres SET date='$date',patient='$patient',history='$history',medication='$medication',note='$note' WHERE id='".$_GET['id']."'") or die(mysqli_error());
      //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
      //$numrows=mysqli_num_rows($query)or die (mysqli_error());
       echo " <script>setTimeout(\"location.href='../prescription/addprescription.php';\",150);</script>";
}
   

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Edit Prescription
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Edit Prescription</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
<div class="col-md-12">
    <div class="box box-primary">
            <div class="box-header with-border bg-blue">
             <i class="fa fa-edit"></i> <h3 class="box-title">Edit Prescription</h3>
            </div>
        <form method="POST" >
              <div class="box-body">
                <div class="form-group">
       
                  <label for="exampleInputEmail1">Date</label><br>

                  <input type="name" name="date" class="form-control" value="<?php echo  $row['date'];?>" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
 <label for="exampleInputEmail1">Patient</label><br>
<select name="patient" class="form-control select2"  placeholder="">
<option>...Select...</option>
 
<?php

 $p_query="SELECT * FROM patientregister";
$res=mysqli_query($conn,$p_query);
while ($row1 =mysqli_fetch_array($res)) {
   echo $row1['id'];?>
<option value="<?php echo $row1['id'];?>"<?php if ($patient==$row1['id']) {
  echo "Selected";}?>><?php echo $row1['name'];?>
 </option>
<?php } ?></select>
</div>
</div>
<div class="form-group">
<label for="exampleInputPassword1">History</label>
<textarea id="editor1" name="history" class="form-control"><?php echo $history; ?>
  </textarea>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Medication</label>
<textarea id="editor2" name="medication" class="form-control">
<?php echo $medication; ?>                
</textarea>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Note</label>
<textarea id="editor3" name="note" class="form-control">
<?php echo $note; ?>
</textarea>
</div>
 <button type="submit"  name="submit" class="btn btn-primary">Update</button>
          </div>
      </form>
    </div>
  </div>
</div>
</section>
</div>
<?php include "../Include/footer.php";?>
<script src="../bower_components/ckeditor/ckeditor.js">
</script>
<script>
  $(function () { 
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

  $(function () { 
    // Replace the <textarea id="editor2"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
   $(function () { 
    // Replace the <textarea id="editor3"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor3')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>