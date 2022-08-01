<?php
require("sessionAdmin.php");


if (isset($_POST['submit'])) {
    if($_FILES['file']['size'] !=0){
        if ($_FILES['file']) {
            $file = $_FILES['file'];
    
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
    
    
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'jpeg', 'png', 'pdf','');
    
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 100000000) {
                        $productname = $_POST['productname'];
                        $price = $_POST['price'];
                        $quantity  = $_POST['quantityavailable'];
                        $productdescription = $_POST['productdescription'];
                        $submit = $_POST['submit'];
    
                        $fileNameNew = uniqid("$productname", true) . "." . $fileActualExt;
                        $fileDestination = 'img/product/' . $fileNameNew;
    
                        //validation
                        if ($price < 1) {
                            echo "add price";
                        }
    
                        require("connectdb.php");
                        $sql="Select productimg from products where pid ='$_POST[id]'";
                        $result = mysqli_query($con, $sql);
                        if(mysqli_num_rows($result) >0){
                            foreach($result as $row){
                                extract($row);
                                unlink($productimg);
                             }
                         }
    
                        $sql = "UPDATE products set pid='$_POST[id]',
                    pname='$_POST[productname]',
                    price = '$_POST[price]',
                    quantityAvailable  = '$_POST[quantityavailable]',
                    description = '$_POST[productdescription]',
                    productimg ='$fileDestination'
                    where pid=$_POST[id]";
                        $result = mysqli_query($con, $sql);
    
                        move_uploaded_file($fileTmpName, $fileDestination);
    
                        if (!empty($result)) {
                            //echo "<div class='alert alert-success' >Product Edited</div>";
                            header("location:adminprofile.php");
                        } else {
                            die("Error in connection " . mysqli_error($con));
                        }
    
    
                        return;
                    } else {
                        echo "your file is too big";
                    }
                } else {
                    echo "Upload error";
                }
            } else {
    
    
                echo "You cannot upload files of this type";
            }
        }
    } else {
        $productname = $_POST['productname'];
        $price = $_POST['price'];
        $quantity  = $_POST['quantityavailable'];
        $productdescription = $_POST['productdescription'];
        $submit = $_POST['submit'];


        //validation

        if ($price < 1) {
            echo "add price";
        }

        require("connectdb.php");
        $sql = "UPDATE products set pid='$_POST[id]',
                pname='$_POST[productname]',
                price = '$_POST[price]',
                quantityAvailable  = '$_POST[quantityavailable]',
                description = '$_POST[productdescription]'
                where pid=$_POST[id]";
        $result = mysqli_query($con, $sql);

        if (!empty($result)) {
            //echo "<div class='alert alert-success' >Product Edited without photo</div>";
            header("location:adminprofile.php");
        } else {
            die("Error in connection " . mysqli_error($con));
        }
    }
}
