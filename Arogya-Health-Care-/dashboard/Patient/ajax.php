<?php
include("../inc/connect.php") ;
$id=$_POST['ajax_id'];
$q1=mysqli_query($conn,"SELECT * FROM subservices WHERE sid='".$id."'")or die (mysqli_error());
$p_numrows=mysqli_num_rows($q1)or die (mysqli_error());
$m_row=mysqli_fetch_all1($q1);
function mysqli_fetch_all1($query)
 {
 	$temp='';
    $all = array();
    while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
    return $temp;
}
$a='';
foreach ($m_row as $value) {
	$a.='<option value="'.$value['sid'].'">'.$value['subservicename'].'</option>';
}
echo $a;
?>