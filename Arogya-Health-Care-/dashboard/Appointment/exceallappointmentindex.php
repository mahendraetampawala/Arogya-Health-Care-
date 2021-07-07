<?php
include("../inc/connect.php") ;

$query=mysqli_query($conn,"SELECT * FROM addappointment")or die (mysqli_error($db_connect));
$numrows=mysqli_num_rows($query)or die (mysqli_error($db_connect));


// $row1=mysqli_fetch_all1($query);
// function mysqli_fetch_all1($query) {
//     $all = array();
//     while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
//     return $temp;
//}
// $stmt=$db_con->prepare('SELECT * FROM medicinecategory');
// $stmt->execute();


?>

<html>
<head>
<title>Appintment</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="panel">
    <div class="panel-heading">
      <h3>Appintment</h3>
      <div class="panel-body">
        <table border="1" class="table table-bordered table-striped">
            <tr>
              <th>Sr.No</th>
              <th>Patient</th>
              <th>Doctor</th>
              <th>Date</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Remark</th>
              <th>SMS</th>
              
            </tr>
          <?php
// while($row = mysqli_fetch_assoc($extract))
          while($row=mysqli_fetch_assoc($query)){
            echo '
            <tr>
              <td>'.$row["id"].'</td>
              <td>'.$row["patient"].'</td>
              <td>'.$row["doctor"].'</td>
              <td>'.$row["date"].'</td>
              <td>'.$row["starttime"].'</td>
              <td>'.$row["endtime"].'</td>
              <td>'.$row["remark "].'</td>
              <td>'.$row["sms "].'</td>
              
              
            </tr>
            ';
          }
          ?>
        </table>
        <a href="excelallappointment.php">Export To Excel</a>

      </div>

    </div>

  </div>

</div>



</body>
</html>
