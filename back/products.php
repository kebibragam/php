<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../front/css/bootstrap.min.css">
    <link rel="stylesheet" href="../front/css/product.css">
</head>

<body>
    <h2 class="container d-flex justify-content-center mt-50 mb-50">Product List</h2>
    <?php
    require_once "connectdb.php";
    $sql = "select * from products ";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            extract($row);
    ?>
            <div class="container d-flex justify-content-center mt-50 mb-50">
                <div class="row">
                    <div class="col-md-10">

                        <div class="card card-body">
                            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                <div class="mr-2 mb-3 mb-lg-0">
                                    <img src="<?php
                                                if (isset($_SESSION)) {
                                                    echo $productimg;
                                                } else {
                                                    echo "back/" . $productimg;
                                                }
                                                ?>" width="150" height="150" alt="product photo">
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title font-weight-semibold">
                                        <a href="#" data-abc="true"><?php echo $pname ?></a>
                                    </h6>
                                    <p class="mb-3"><?php echo $description; ?></p>
                                </div>

                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                    <h3 class="mb-0 font-weight-semibold"><?php echo "Rs " . $price ?></h3>
                                    <h5 class="mb-0 font-weight-semibold"><?php echo "Quantity Available: " . $quantityAvailable ?>
                                    </h5>

                                   

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</body>

</html>