<?php
	session_set_cookie_params(3600,"/");
	session_start();
?>

<?php
	$db = mysqli_connect("localhost",'root','121');
		$query = "use fdx";
		mysqli_query($db, $query);
	if(!empty($_POST['customaddress'])){
		$add = $_POST['customaddress'];
	}
	else{
		$cust = $_SESSION['email_id'];
		$query = "SELECT address from customer where email_id = '$cust'";
		$arr = mysqli_fetch_array(mysqli_query($db, $query));
		$add = $arr[0];
	}
	$myval = $_SESSION['totval'];
	$_SESSION['totval'] = 0;

	$emailId = $_SESSION['email_id'];
	$currDate = date('Y-m-d');
	//echo $currDate; echo $emailID;
	$query = "INSERT into orders(order_date, shipper_id, email_id, address, total) values('$currDate', 'a', '$emailId', '$add', $myval)";
	mysqli_query($db,$query);
	$arr = mysqli_fetch_row(mysqli_query($db,"SELECT max(order_number) from orders"));
	$orderName = "o".$arr[0];
	//echo $orderName;
	mysqli_query($db, "use allOrders");
	$cartname = $_SESSION["unique"];
	//echo $cartname;
	$tstr = "carts.".$cartname;
	//echo $tstr;
	$query = "CREATE TABLE $orderName as select * from $tstr";
	//echo $query;
	mysqli_query($db, $query);
	mysqli_query($db, "use carts");
	
	$x = $cartname;
	$query = "DELETE FROM $x";
	
	mysqli_query($db, $query);
		echo "<h3> Plz Visit again </h3>"; 
		echo "<a href = index.php>  Return to Home Page </a><br>";
		echo "<a href = previousOrders.php>  View My Orders  </a><br>";
		echo "<a href = logout.php>  Logout  </a>";
	
?>