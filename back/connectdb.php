<?php 
    $con = mysqli_connect('localhost','root','','online');
    if(!$con){
        die("Error in connection " . mysqli_connect_error());
    }
?>