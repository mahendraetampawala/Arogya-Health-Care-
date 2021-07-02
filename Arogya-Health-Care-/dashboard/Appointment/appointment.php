<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<?php
include("../inc/connect.php") ;
$query=mysqli_query($conn,"SELECT * FROM addfiles")or die (mysqli_error($db_connect));
$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));
$row1=mysqli_fetch_all1($query);
//echo $row1; 
$p_query=mysqli_query($conn,"SELECT * FROM patientregister")or die (mysqli_error());
$p_numrows=mysqli_num_rows($p_query)or die (mysqli_error());
$p_row1=mysqli_fetch_all1($p_query);

function mysqli_fetch_all1($query)

{
$all = array();
while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
return $temp;
}
//print_r($row1); 
//print_r($p_row1);exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error());
?>
<?php
//session_start();
if(isset($_POST['submit']))
{ 
  $d1=date('Y-m-d');
$patient=$_POST['patient'];

$title=$_POST['title'];

$target_dir="../Upload/File/";
$name=$_FILES["file"]["name"];
$type = $_FILES["file"]["type"];
$size = $_FILES["file"]["size"];

$temp = $_FILES["file"]["tmp_name"]; 
$error = $_FILES["file"]["error"];//size
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
{ //echo "string"; exit;
 move_uploaded_file($temp,"../Upload/File/".$name);//move upload file  
 // echo"Upload Complete";  
}
}


  $write =mysqli_query($conn,"INSERT INTO addfiles( `doc_date`,`patient`,`title`,`file`) VALUES (' $d1','$patient','$title','$name')") or die(mysqli_error($db_connect));
  //$query=mysqli_query($conn,"SELECT * FROM user ")or die (mysqli_error());
  //$numrows=mysqli_num_rows($query)or die (mysqli_error());
echo " <script>setTimeout(\"location.href='../Appointment/appointment.php';\",150);</script>";
}


?>

<div class="content-wrapper">
  <section class="content-header">
  <h1>
  Patient Document
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Patient</li>
    <li class="active"> Document</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box box-primary">
<div class="box-header with-border">
<i class="fa fa-user"></i> <h3 class="box-title">Patient Document</h3>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="height: 50px;"><i class="fa fa-plus-square"></i> Add New</button><br>

<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-blue" style="height: 60px">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"> Add Files</h4>
      </div>
  <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
           <div class="form-group">
             <label for="exampleInputPassword1">Patient</label>
             <select name="patient" class="form-control" id="exampleInputPassword1" placeholder="">
 
<?php foreach ($p_row1 as $s) {?>
<option value="<?php echo $s['id'];?>"><?php echo $s['name'];?></option>
                <?php } ?>
              </select>
            </div>

           <div class="form-group">
               <label for="exampleInputPassword1">Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputPassword1" placeholder="">
           </div>

              <td><b>Image Upload</b></font>
              <input type="file" name="file" id="fileToUpload"></td>

            <div class="box-footer">
              <button type="submit"   name="submit" class="btn btn-primary">Submit</button>
             </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </form>
      </div>
    </div>
</div>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<!--    <td>
<button type="button" class="btn btn-default">Copy</button>
</td> -->
<td>
<a href="./excelapp.php"> <button type="button" class="btn btn-default">Excel</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="csvapp.php"><button type="button" class="btn btn-default">CSV</button></a>
</td>&nbsp;&nbsp;
<td>
<a href="./PDF/app_pdf.php"><button type="button" class="btn btn-default">PDF</button></a>
</td>&nbsp;&nbsp;
<td>
<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>
<div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th>Date</th>
            <th>Patient</th>
            <th>Title</th>
            <th>Document</th>
            <th>Option</th>
            </tr>
            </thead>
            <tbody>
               <?php
   foreach ($row1 as $row)
    {
$s1=" SELECT name FROM patientregister WHERE id='".$row['patient']."'";
$w1 =mysqli_query($conn,$s1) or die(mysqli_error($db_connect));
//print_r($w1); exit;
$row2=mysqli_fetch_array($w1)or die (mysqli_error($db_connect));
 //print_r($row2); exit();
?> <tr>  
<td><?php echo $row['doc_date'];?></td>
<td><?php echo $row2['name'];?></td>
<td><?php echo $row['title'];?></td> 

<td><img src="../Upload/File/<?php echo $row['file'];?>" style="height:100px;width:100px;"/></td>
 
<td><a href="./download.php?file=<?php echo $row['file'];?>"><button type="button" class="btn btn-success"><i class="fa fa-plus-square"></i> Download</button></a>&nbsp;
<a href="deletea.php?id=<?php echo $row['id']; ?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</span></a></td>

</tr>
<?php } ?>
     </tbody>
    </table>
      </div>
  
</div>
</div>
</div>
</section>
</div>
<?php include "../Include/footer.php";?>

