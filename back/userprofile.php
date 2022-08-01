<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../front/css/bootstrap.min.css">
    <link rel="stylesheet" href="../front/css/product.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION) && $_SESSION['usertype'] == "user") {
        require("../front/html/nav.html");
        echo "<div>Welcome " . $_SESSION['username'] . "</div>";
        require "connectdb.php";
        $username = $_SESSION['username'];
        $sql = "select username,password,userphoto from users where username = '" . $username . "' ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {
                extract($row);
                if (!empty($userphoto)) {
                    echo "
                    <img src='{$userphoto}' width='500px' alt ='profile pic' />
                    <a href=\"deletepic.php\"><button>Delete photo</button></a>
                ";
                } else {
                    echo "
                    <img src='img/uploads/profile.jpg' width='500px' alt ='profile pic' />
                ";
                }
            }
        }
    ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" />
        <button type="submit" name="submit">Upload</button>
    </form>
    <?php include("products.php"); ?>
    <a href="logout.php"><button>Logout</button></a>
    <?php
        }else {
            echo "You cannot excess this page.";
        }
    ?>
</body>

</html>