<?php
	session_set_cookie_params(3600,"/");
	session_start();
	$db = mysqli_connect("localhost",'root','121');
	mysqli_query($db, "use carts");
	
	$x = $_GET['cartname'];
	
	$query = "DELETE FROM $x";
	mysqli_query($db, $query);
	header("location: t.php");

?>
