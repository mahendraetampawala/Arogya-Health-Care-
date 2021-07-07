<?php

    require_once("../connect.php");

    session_start();

    $user_check = $_SESSION["useremail"];

    $ses_sql = mysqli_query($conn,"SELECT username,email FROM user WHERE email='$user_check'");

    $row = mysqli_fetch_assoc($ses_sql);

    $login_session = $row['email'];
    
    $login_session = $row['username'];

    if(isset($login_session)){
    // header('Location:Dashboard.php');
    
    }else{
        header('Location: index.php');
    }
?>