<?php
    session_start();
    if($_SESSION){
        if($_SESSION['usertype']!="admin"){
            die("You cannot access this page");
        }
    }else{
        die("You cannot access this page");
    }
    
?>
