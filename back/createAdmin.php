<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../front/css/bootstrap.min.css">
    <link rel="stylesheet" href="../front/css/styles.css">
</head>

<body>
    <?php
    $errorMessage = null;
    if (!empty($_POST)) {
        require "connectdb.php";
        $username = strtolower(isset($_POST['username']) ? $_POST['username'] : "");
        $checkQuery = "SELECT aname FROM admin WHERE LOWER(aname)= '$username' ";
        $check = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($check) > 0) {
            $errorMessage = 1;
        } else {
            $sql = "INSERT into admin(aname, password ,email)
                VALUES('$_POST[username]','$_POST[password]','$_POST[email]')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<div class='alert alert-success' >Account created. Now login with your username and password</div>";
            } else {
                die("Error in connection " . mysqli_error($con));
            }
        }
    }
    ?>
    <fieldset class="container-md">
        <legend>Sign up</legend>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="login">
            <label for="username" class="col-sm-2 col-form-label col-form-label-sm" >Username</label>
            <input type="text" name="username" class="form-control" required="required"/>
            <?php
            if ($errorMessage == 1) {
                echo '<div class="alert alert-danger alert-dismissible fade show">Username already exists.</div>';
            }
            ?>

            <label for="email" class="col-sm-2 col-form-label col-form-label-sm" >Email</label>
            <input type="email" name="email" class="form-control" required="required" />

            <label for="Password" class="col-sm-2 col-form-label col-form-label-sm" >Password</label>
            <input type="password" name="password" class="form-control" required="required"/>
            <input type="submit" value="Sign up" class="btn btn-primary" />
            <button class="btn btn-secondary"><a href="../front/html/loginAdmin.html" class="a">Already have an
                    account</a></button>
        </form>
    </fieldset>
</body>

</html>