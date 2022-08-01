<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/css/styles.css">
    <link rel="stylesheet" href="/front/css/product.css">
    <script src="/front/js/bootstrap.bundle.min.js"></script>


<body>
<?php
    include("../front/html/nav.html");
    require("connectdb.php");
    $search = $_GET['q'];
    $sql = "
        SELECT * from products where pname like '%$search%' or description like '%$search%';
    ";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows ($result)<1){
        echo "<div>No items found.</div>";
    }
    while(mysqli_fetch_assoc($result)){
        foreach($result as $row){
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
                                                    echo "/back/" . $productimg;
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

                                    <button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Add to cart</button>

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