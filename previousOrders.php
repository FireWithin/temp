<?php
// Start the session
session_set_cookie_params(3600,"/");
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<?php include 'head.php' ?>

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
</head>
	<body>
	<div align="center">
		<h1>Order History for our valued customer :</h1>
		<h2><?php if(isset($_SESSION["email_id"])) echo $_SESSION['name']; else header("location: index.php"); ?></h2><br>
		
		<table border="2">
			<thead>
				<tr>
					<th> Order Number </th>
					<th> Order Date </th>
					<th> View Order</th>
					<th> Total </th>
					<th> Status </th>
					<th> Cancel </th>
				</tr>
			</thead>
		<tbody>
		<?php
			//echo isset($_SESSION['email_id']);
			$db = mysqli_connect("localhost",'root','121');
			mysqli_query($db, "use fdx");
			if(!isset($_SESSION['email_id'])){
				header("location: login.php");
			}
			$user = $_SESSION['email_id'];
			
			$query = "SELECT * from orders where email_id = '$user'";
			$res = mysqli_query($db, $query);
			//echo mysqli_num_rows($res);
			if(mysqli_num_rows($res)==0){
				echo '<tr><td colspan="10">No Rows Returned</td></tr>';
			} else {
					
					while($row = mysqli_fetch_assoc($res)){
						$pnum = $row['order_number'];
					
						$y = $row['order_date'];
						$x = mysqli_fetch_array(mysqli_query($db, "SELECT datediff(curdate(), '$y') as b"));
					
						if($x['b'] <= 2 && $row['status']!='CANCELLED'){
							echo "<tr><td>{$row['order_number']}</td>   <td>{$row['order_date']}</td>
								<td><a href = viewOrder.php?ordernumber=$pnum>  VIEW  </a></td>
								<td>{$row['total']}</td>
								<td>{$row['status']}</td><td> <a href = remOrder.php?ordernumber=$pnum> CANCEL </a></td></tr>";
						}
						else{
							echo "<tr><td>{$row['order_number']}</td>   <td>{$row['order_date']}</td>
								<td><a href = viewOrder.php?ordernumber=$pnum>  VIEW  </a></td>
								<td>{$row['status']}</td><td> CANCEL </td></tr>";	
						}
					}
			}
		?>	
		</tbody>
		</table><br>
		<a href="index.php"><button>Continue Shopping</button></div></a><br>
	</body>
</html>