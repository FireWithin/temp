<?php
// Start the session
session_set_cookie_params(3600,"/");
session_start();
?>


<?php
	
	
	$db = mysqli_connect("localhost",'root','121');
//	echo $_POST['submit'];
//	echo $_SESSION["email_id"];
	$query = "use fdx";
	mysqli_query($db, $query);
	$itemid = $_REQUEST['id'];
//	echo $itemid;
 	$query = "SELECT * from products where products.product_id = $itemid";
 	$arr = mysqli_fetch_array(mysqli_query($db, $query));
 //	echo bla;
 	$query = "use carts";
	mysqli_query($db, $query);
	$cartname = $_SESSION['unique'];
	echo $cartname;
 	$query = "SELECT product_id, quantity from $cartname where product_id = $itemid";
 //	echo bla;
 	$flag = mysqli_num_rows(mysqli_query($db, $query));
 //	echo ">>>>>>>>>>>>>>>>>>>" . $flag;
 //	echo "HI " . $cartname."\n\n";
 	if($flag){
 		$carr = mysqli_fetch_array(mysqli_query($db, $query));
		$query = "UPDATE $cartname set quantity = $carr[1]+1 where product_id = $itemid";
 		mysqli_query($db, $query);
 	}
 	else{
 			
 		$query = "INSERT into $cartname values('$arr[1]', '$itemid', 1)";
 		//echo $query;
 		mysqli_query($db, $query);
 	}
 	if(!isset($_SESSION['email_id'])){
					header("location: login.php");
				}
				else{
					header("location: t.php" );
	}
 	
?>
