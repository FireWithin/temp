<?php
// Start the session
	session_set_cookie_params(3600,"/");
	session_start();
?>

<?php
	$productname = $_GET['productid'];
	$cartname = $_GET['cartname'];
	$db = mysqli_connect("localhost",'root','121');
	$query = "use carts";
	mysqli_query($db, $query);
	$query = "DELETE from $cartname where product_id = $productname";
	mysqli_query($db,$query);
	header("location: t.php");
?>