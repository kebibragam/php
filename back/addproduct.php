<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add product</title>
    <link rel="stylesheet" href="../front/css/contact.css">
</head>

<body>
    <?php
        require("sessionAdmin.php");
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <label> Product Name</label>
        <input type="text" name="productname" placeholder="Enter product Name" required="required" /><br />
        <label> Price</label>
        <input type="number" name="price" placeholder="Enter price" required="required" /><br />
        <label> Quantity available</label>
        <input type="number" name="quantityavailable" placeholder="Enter quantity" required="required" /><br />
        <label> Product description </label>
        <textarea name="productdescription" rows="4" cols="30" placeholder="add description here..." required="required"></textarea><br />
        <label for="productimg">Product Image</label>
        <input type="file" name="file" id="productimg">
        <input type="Submit" name="submit" value="submit">
        <input type="reset" name="reset" value="reset">

    </form>
    <a href="adminprofile.php"><button>Home</button></a>
    <?php
    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        //echo $fileTmpName;
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
                    
                    $fileNameNew = uniqid("$productname",true) . "." . $fileActualExt;
                    $fileDestination = 'img/product/' . $fileNameNew;
        

                    //validation
                    if ($quantity < 1) {
                        echo "Quantity must be 1 or more";
                    }
                    if ($price < 1) {
                        echo "add price";
                    }

                    require("connectdb.php");
                    $sql = "Insert into products(pname,price,description,quantityAvailable,productimg) values('$productname',$price,'$productdescription',$quantity,'$fileDestination')";
                    
                    $result = mysqli_query($con, $sql);
                    
                    move_uploaded_file($fileTmpName, $fileDestination);
                   
                    if (!empty($result)) {
                        echo "<div class='alert alert-success' >Product added</div>";
                        
                    } else {
                        die("Error in connection " . mysqli_error($con));
                    }

                    header("location:adminprofile.php");
                    
                } else {
                    echo "your file is too big";
                }
            } else {
                $productname = $_POST['productname'];
                $price = $_POST['price'];
                $quantity  = $_POST['quantityavailable'];
                $productdescription = $_POST['productdescription'];
                $submit = $_POST['submit'];
                

                //validation
                if ($quantity < 1) {
                    echo "Quantity must be 1 or more";
                }
                if ($price < 1) {
                    echo "add price";
                }

                require("connectdb.php");
                $sql = "Insert into products(pname,price,description,quantityAvailable) values('$productname',$price,'$productdescription',$quantity)";
                
                $result = mysqli_query($con, $sql);
                
                if (!empty($result)) {
                    echo "<div class='alert alert-success' >Product added</div>";
                    
                } else {
                    die("Error in connection " . mysqli_error($con));
                }

                header("location:adminprofile.php");
            }
        } else {
            echo "You cannot upload files of this type";
        }
    }
    ?>
</body>

</html>