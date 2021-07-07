<?php
include("../inc/connect.php") ;
$service_id=$_POST['sub_id'];
$sub_q=mysqli_query($conn,"SELECT * FROM subservices WHERE sid='".$service_id."'")or die (mysqli_error());
$sub_numrows=mysqli_num_rows($sub_q)or die (mysqli_error());
$sub_row=mysqli_fetch_all1($sub_q);
function mysqli_fetch_all1($query)
 {
 	$temp='';
    $all = array();
    while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
    return $temp;
}
$b='';
foreach ($sub_row as $value) {
	$b.=$value['Fee'];
}
echo $b;
?>