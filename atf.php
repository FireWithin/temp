<?php
	session_set_cookie_params(3600,"/");
	session_start();
	$db = mysqli_connect("localhost",'root','121');
	$query = "use fdx";
	mysqli_query($db, $query);
	$itemid = $_GET['id'];
	$x = $_SESSION['email_id'];
	if(mysqli_num_rows(mysqli_query($db, "select * from favorites where email_id = '$x' and product_id = $itemid")) == 0){
		$query = "insert into favorites values('$x', $itemid)";
		mysqli_query($db, $query);
	}
	header("location: pd.php?pid=$itemid");
?>