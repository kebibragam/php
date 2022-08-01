<?php
    session_start();

    require_once "connectdb.php";
    $username = $_SESSION['username'];
    $sql = "select userphoto from users where username = '".$username."' ";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) >0){
        foreach($result as $row){
            extract($row);
            unlink($userphoto);
         }
     }

    $sql = "Update users set userphoto=\"\" where username = '".$username."' ";
    $result = mysqli_query($con,$sql);

    header("Location:userprofile.php");
?>