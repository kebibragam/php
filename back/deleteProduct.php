<?php
require("sessionAdmin.php");
$id = !empty($_GET['id']) ? $_GET['id'] : '';
include("connectdb.php");
$sql = "DELETE from products where PID=$id";
$result = mysqli_query($con, $sql);
if ($result) {
	echo "data deleted successfully";
	header("Location:adminprofile.php");
} else {
	echo "error in delete " . mysqli_error($con);
}
mysqli_close($con);
?>