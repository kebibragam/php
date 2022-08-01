<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Prouct</title>
	<link rel="stylesheet" href="../front/css/contact.css">
</head>
<body>
<?php
require("sessionAdmin.php");
$id = !empty($_GET['id']) ? $_GET['id'] : '';

if ($id) {
	include("connectdb.php");
	$sql = "SELECT * FROM products where pid=$id";
	$result = mysqli_query($con, $sql);
	if (!$result) {
		die("Error in sql <br />");
	}
	$row = mysqli_fetch_assoc($result);
	if ($row) {
?>
		<form action="updateProduct.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $row['pid']; ?>">
			productname : <input type="text" name="productname" value="<?php echo $row['pname']; ?>"><br />
			price : <input type="text" name="price" value="<?php echo $row['price']; ?>"><br />
			Quantity available:<input type="number" name="quantityavailable" value="<?php echo $row['quantityAvailable']; ?>"><br />
			product description: <input type="text" name="productdescription" value="<?php echo $row['description']; ?>"><br />
			<div><label for="productimg">Product Image:</label></div>
			<img src="<?php echo $row['productimg']; ?>" alt="No photo yet" width="200px" />
			<input type="file" name="file" id="productimg"><br />
			<input type="submit" name="submit" value="Update">
		</form>
<?php
	} else {
		die("id is invalid <br />");
	}
} else {
	die("please provide id");
}
?>
</body>
</html>