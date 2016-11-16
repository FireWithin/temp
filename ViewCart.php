<?php
// Start the session
session_set_cookie_params(3600,"/");
session_start();
?>

<html>
	<body>
		<table border="2">
			<thead>
				<tr>
					<th> Product Name </th>
					<th> Product ID </th>
					<th> Quantity</th>
					<th> Reduce </th>
					<th> Add </th>
					<th> Remove </th>
				</tr>
			</thead>
		<tbody>

<?php
	$db = mysqli_connect("localhost",'root','121');
	$query = "use carts";
	mysqli_query($db, $query);
	$cartname = $_SESSION['unique'];
	//echo $cartname;
	$query = "SELECT * from $cartname";
	$res = mysqli_query($db, $query);

	if(mysqli_num_rows($res)==0){
		echo '<tr><td colspan="10">No Rows Returned</td></tr>';
	} else {
			while($row = mysqli_fetch_assoc($res)){
				$pname = $row['product_name'];
				$pid = $row['product_id'];
				$pq = $row['quantity'];
				$nam = $cartname;
				echo "<br>";
				echo "<tr><td>{$row['product_name']}</td>   <td>{$row['product_id']}</td>   <td>{$row['quantity']}</td>
						<td><a href = redQuantity.php?productid=$pid&cartname=$nam&type=1>  Q--  </a></td>
						<td><a href = redQuantity.php?productid=$pid&cartname=$nam&type=2>  Q++  </a></td>
						<td><a href = delete.php?productid=$pid&cartname=$nam>  remove  </a></td></tr>
				";
			}
	}
?>
</tbody></table></body></html>

<?php
	echo "<a href='OrderSummary.php?cartname=$cartname'>PlaceOrder</a>";
?>