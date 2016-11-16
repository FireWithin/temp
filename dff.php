<?php
	session_set_cookie_params(3600,"/");
	session_start();
	$email = $_GET['email'];
	$id = $_GET['productid'];
	$db = mysqli_connect("localhost",'root','121');
	mysqli_query($db, "use fdx");
	mysqli_query($db, "delete from favorites where product_id = $id and email_id = '$email'");
	//echo $id;
	header("location: favorites.php");
?>
