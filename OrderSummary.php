<?php
// Start the session
session_set_cookie_params(3600,"/");
session_start();
include 'head.php'
?>
<style>

table{
	width: 70%;
	border-collapse: collapse;
	margin: 0 auto;
} 
table 
	td {
		
		padding: 15px;
		border-bottom: 1px solid #ddd;
	}
table 
	th {
		
		height: 50px;
		padding: 15px;
		border-bottom: 1px solid #ddd;	
	}
tr:hover{background-color:#f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2}

input{
	resize: horizontal;
	width: 200px;
}
input:active{
	width: auto;
}
input:focus{
	min-width: 200px;
}

</style>
	<body>
	<div align="center">
		<h1>Order Summary</h1>
		
		<table border="2">
			<thead>
				<tr>
					<th> Product Name </th>
					<th> Product ID </th>
					<th> Quantity</th>
					<th> Unit Price </th>
					<th> Subtotal </th>
				</tr>
			</thead>
		<tbody>
		<?php
			$cartname = $_GET['cartname'];
			$db = mysqli_connect("localhost",'root','121');
			$query = "use carts";
			mysqli_query($db, $query);
			$query = "SELECT * from $cartname";
			$res = mysqli_query($db, $query);
			$query = "use fdx";
			mysqli_query($db, $query);

			if(mysqli_num_rows($res)==0){
				echo '<tr><td colspan="10">No Rows Returned</td></tr>';
			} else {
				$total = 0;
				while($row = mysqli_fetch_assoc($res)){

					$pname = $row['product_name'];
					$pid = $row['product_id'];
					$pq = $row['quantity'];
					$query = "SELECT * from products where products.product_id = $pid";
 					$arr = mysqli_fetch_array(mysqli_query($db, $query));
					$subt = $arr['unit_price'] * $pq;
					$total += $subt;
					echo "<br>";
					echo "<tr><td>{$row['product_name']}</td>   <td>{$row['product_id']}</td>   <td>{$row['quantity']}</td><td>{$arr['unit_price']}</td>
							<td> {$subt} </td></tr>
					";
				}
				$_SESSION['totval'] = $total;
			}
			mysqli_query($db, "use carts");
	
			
	
		
		?>
		</tbody>
		</table>

		<?php
		echo "Grand Total : Rs. " .$total ; 
		echo "</br>";
		$tp = $_SESSION["email_id"] ;
		$arr = mysqli_fetch_array(mysqli_query($db, "SELECT address from customer where customer.email_id = '$tp'"));
		echo "<h4> Address: ".$arr[0]."</h4>";
		?>
		<form name='form' method='post' action="PlaceOrder.php">
		Deliver on a custom Address <input min-height="100px" min-width="400px" placeholder="Fill only if its different from your home-address" type="text" name="customaddress" id="name" ><br/>
		<input type="submit" name="submit" value="Submit">
		</form><div>
	</body>
</html>