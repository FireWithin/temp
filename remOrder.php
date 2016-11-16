<?php
	session_set_cookie_params(3600,"/");
	session_start();
	$db = mysqli_connect("localhost",'root','121');
	mysqli_query($db, "use fdx");
	$user = $_SESSION['email_id'];
	$tocancel = $_GET['ordernumber'];
	$query = "SELECT * from orders where order_number = $tocancel";
	$res = mysqli_fetch_array(mysqli_query($db, $query));
	if($res['email_id']!=$user){
		header("location: previousOrders.php");
	}
	$query = "UPDATE orders SET status = 'CANCELLED' where order_number = $tocancel";
	mysqli_query($db, $query);
	header("location: previousOrders.php");
?>