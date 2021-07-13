<?php
$email ="oluokun";
$pass ="kabiru";
include("includes/config.php");
// $sql ="SELECT* FROM admin where  UserName='$email' and Password = '$password' ";
// $t = mysqli_query($conn, $sql);
// $query = mysqli_fetch_array($t);
// if($query)
// {
//     echo $query['UserName']."  And  Pass:  ".$query['Password'] ;
// }else{
//     echo "cannot ";
// }

// $password = md5($pass);
// $sql = mysqli_query($conn, "INSERT INTO admin(id, UserName, Password) VALUES('', '$email','$password')");
// if($sql){
//     echo "Insert successfull";
// }else{
//     echo "Unable to insert";
// }
$sql = mysqli_query($conn, "SELECT * FROM tblusers WHERE id= 7 ") or die ("Unable   ".mysqli_error());
		//$t = mysqli_query($conn, $sql);
		$cnt=1;
        $query = mysqli_fetch_array($sql);
        echo $query['EmailId'];
        echo "<br><br>". $query['Password'];
        echo "<br><br>".md ($query['Password']);
		if($query){
            echo "get it";

        }else{
            echo "Unable to ";
        }

?>