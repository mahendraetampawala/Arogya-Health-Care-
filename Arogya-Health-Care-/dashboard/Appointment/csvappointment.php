 <?php
include("../inc/connect.php") ;


$query=mysqli_query($conn,"SELECT * FROM addnewpres")or die (mysqli_error());
$numrows=mysqli_num_rows($query)or die (mysqli_error());
$data=mysqli_fetch_all1($query);
function mysqli_fetch_all1($query) {
    $all = array();
    while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
    return $temp;
}
//print_r($row1); exit;
//$row1[]=mysqli_fetch_assoc($query)or die (mysqli_error());
?>

<?php
 
//The name of the CSV file that will be downloaded by the user.
$fileName = 'example.csv';
 
//Set the Content-Type and Content-Disposition headers.
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
 
//A multi-dimensional array containing our CSV data.
 // $data = array(
 //     //Our header (optional).
 //     array("Date", "Patient"));
//     //Our data
//     array("", "2012-01-04"),
//     array("Lisa", "2011-09-29"),
//     array("Harry", "2013-12-12")
// );
 
//Open up a PHP output stream using the function fopen.
$fp = fopen('php://output', 'w');
//Loop through the array containing our CSV data.
foreach ($data as $row)
 {

    //fputcsv formats the array into a CSV format.
    //It then writes the result to our output stream.
    fputcsv($fp, $row);
}
 
//Close the file handle.
fclose($fp);