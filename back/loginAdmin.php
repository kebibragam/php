<?php
    session_start();
    require "connectdb.php";
    $sql = "select aname,password from admin";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) >0){
        foreach($result as $row){
            extract($row);
            if(strtolower($_POST['username']) == strtolower($aname)  && $_POST['password']== $password){
                $_SESSION['username']= $aname;
                $_SESSION['usertype']= "admin";
                header("Location:adminprofile.php");
            }  
        }
        echo "Invalid username and password";
    }
?>