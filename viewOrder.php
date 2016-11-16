<?php
// Start the session
session_set_cookie_params(3600,"/");
session_start();
include 'head.php'
?>

<html>
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
	<div align = "center">
		<h1 align="center"> Order Number: <?php echo $_GET['ordernumber']; ?> </h1>
		<table border="2">
			<thead>
				<tr>
					<th> Product Name </th>
					<th> Product ID </th>
					<th> Quantity </th>
					<th> Link </th>
				</tr>
			</thead>
		<tbody>

		<?php
			$db = mysqli_connect("localhost",'root','121');
			mysqli_query($db, "use allOrders");
			$ordernumber = $_GET['ordernumber'];
			$tstr = "o".$ordernumber;
			$query = "SELECT * from $tstr";
			$res = mysqli_query($db, $query);
			if(mysqli_num_rows($res)==0){
				echo '<tr><td colspan="10">No Rows Returned</td></tr>';
			} else {
					while($row = mysqli_fetch_assoc($res)){
						$pid = $row['product_id'];
						echo "<tr><td>{$row['product_name']}</td>   <td>{$row['product_id']}</td>   <td>{$row['quantity']}</td>
								<td><a href = pd.php?pid=$pid>  View Product  </a></td></tr><br>
						";
					}
			}
			mysqli_query($db, 'use fdx');
			$arr = mysqli_fetch_array(mysqli_query($db, "SELECT * from orders where order_number = $ordernumber"));
			echo "<h3 align='center'> Address: ".$arr['address']."</h3>";
			
		?>	
		</tbody></table>
		<br>
		<a href="previousOrders.php"><button align="center">Back</button></div></a><br>
	</body>
</html>
