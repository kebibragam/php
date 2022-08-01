<?php
    session_start();

    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
    
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpg','png','pdf');
        
        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < 100000000){
                    //$fileNameNew = uniqid('',true)."." . $fileActualExt;
                    $fileNameNew = "profile{$_SESSION['username']}." . $fileActualExt;
                    $fileDestination = 'img/uploads/'.$fileNameNew;
                    echo $fileNameNew;
                    require "connectdb.php";
                    $username = $_SESSION['username'];
                    $upload = "Update users set userphoto = '$fileDestination' 
                                where Username = '$username' ";
                    $result = mysqli_query($con,$upload);

                    move_uploaded_file($fileTmpName,$fileDestination);
                    header("Location:userprofile.php?uploadsucess");
                
                    
                }else{
                    echo "your file is too big";
                }
            } else{
                echo "There was an error upload your file";
            }
        } else{
            echo "You cannot upload files of this type";
        }
    }
?>