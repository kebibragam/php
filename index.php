<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/styles.css">
    <link rel="stylesheet" href="front/css/product.css">
    <script src="/front/js/bootstrap.bundle.min.js"></script>


<body>
    <?php
        require("front/html/nav.html");
    ?>
    <div class="d-flex flex-row-reverse">
        <a href="front/html/loginUser.html"><button class="btn btn-outline-primary">Login as User</button></a>

        <a href="front/html/loginAdmin.html"><button class="btn btn-outline-primary">Login as Admin</button></a>
    </div>

    <?php
        require("back/products.php");
    ?>
</body>

</html>