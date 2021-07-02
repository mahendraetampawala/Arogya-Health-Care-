<?php
include("../inc/connect.php") ;

$query=mysqli_query($conn,"SELECT * FROM addnewmedicine")or die (mysqli_error($db_connect));
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
<title>Medicine Category</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="panel">
    <div class="panel-heading">
      <h3>Medicine Category</h3>
      <div class="panel-body">
        <table border="1" class="table table-bordered table-striped">
    				<tr>
    					<th>Sr.No</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Quantity</th>
    					<th>Generic Name</th>
              <th>Company</th>
              <th>Effect</th>
              <th>Expire Date</th>
    				</tr>
    			<?php
// while($row = mysqli_fetch_assoc($extract))
    			while($row=mysqli_fetch_assoc($query)){
    				echo '
    				<tr>
    					<td>'.$row["id"].'</td>
    					<td>'.$row["name"].'</td>
              <td>'.$row["category"].'</td>
              <td>'.$row["price"].'</td>
              <td>'.$row["quantity"].'</td>
              <td>'.$row["genericname"].'</td>
              <td>'.$row["company "].'</td>
              <td>'.$row["effect"].'</td>
              <td>'.$row["expiredate"].'</td>
              
    				</tr>
    				';
    			}
    			?>
    		</table>
    		<a href="ExcelMedicineCategory.php">Export To Excel</a>

      </div>

    </div>

  </div>

</div>



</body>
</html>
