<?php
// Start the session
	session_set_cookie_params(3600,"/");
	session_start();
?>

<?php
	$db = mysqli_connect("localhost",'root','121');
	$query = "use carts";
	$type = $_GET['type'];
	mysqli_query($db, $query);
	$reduce = $_GET['productid'];
	$cartname = $_GET['cartname'];
	echo $cartname;
	$query = "SELECT quantity from $cartname where product_id = $reduce";
	//echo $type;
	$res = mysqli_fetch_array(mysqli_query($db, $query));
	if($type==1){
		echo $res[0];
		if($res[0]==1) { ;
		header("location: delete.php?productid=$reduce&cartname=$cartname");
		} else {
			$query = "UPDATE $cartname set quantity = $res[0]-1 where product_id = $reduce";
 			mysqli_query($db, $query);
 			echo $res[0];
 			header("location: t.php");
		}	
	} else {
		$query = "UPDATE $cartname set quantity = $res[0]+1 where product_id = $reduce";
 			mysqli_query($db, $query);
 			header("location: t.php");
	}
	
?>