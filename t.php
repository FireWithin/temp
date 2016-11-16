
<?php
// Start the session
session_set_cookie_params(3600,"/");
session_start();
if(!isset($_SESSION['email_id'])){
	header("location: login.php");
}?>
<style>

table{
	width: 70%;
	border-collapse: collapse;
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

</style>

<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<?php include 'head.php' ?>
<H1 align="center"> Cart </H1>
<div id="box1" >

		<table align="center">
			<thead>
				<tr>
					<th> S.no. </th>
					<th> Product Name </th>
					<th> Product ID </th>
					<th> Quantity</th>
					<th> Subtotal</th>
					<th> Decrease </th>
					
					<th> Increase </th>
					<th> Remove </th>
				</tr>
			</thead>
		<tbody>

<?php
/*
	if(!isset($_SESSION['email_id'])){
		echo "LLAL";
		if(isset($_SESSION['lastloc'])){
			header("Location: " . $_SESSION["lastloc"]);
		}
		else{
			echo "ce";
			header("location: index.php");
		}
		
	}*/
	
	$db = mysqli_connect("localhost",'root','121');
	$query = "use carts";
	mysqli_query($db, $query);
	if(!isset($_SESSION['unique'])) header("location: login.php");
	else $cartname = $_SESSION['unique'];
	//echo $cartname;
	$query = "SELECT * from $cartname";
	$res = mysqli_query($db, $query);
	$cnt = 0;
	$query = "use fdx";
	$mainTotal = 0;
	mysqli_query($db, $query);
	if(mysqli_num_rows($res)==0){
		echo '<tr><td colspan="10">No Rows Returned</td></tr>';
	} else {
			while($row = mysqli_fetch_assoc($res)){
			//	$pname = $row['product_name'];
				$pid = $row['product_id'];
				$pq = $row['quantity'];

				$query = "SELECT * from products where products.product_id = $pid";
 				$arr = mysqli_fetch_array(mysqli_query($db, $query));
				echo "<h1>".arr[3]."</h1>";
				$subt = $arr[3] * $pq;
				$nam = $cartname;
				$mainTotal += $subt;
				$cnt += 1;
				echo "<tr><td>{$cnt}</td><td>{$row['product_name']}</td>   <td>{$row['product_id']}</td>   <td>{$row['quantity']}</td>
						<td>{$subt}</td> 
						<td><a href = redQuantity.php?productid=$pid&cartname=$nam&type=1>  Q--  </a></td>
						<td><a href = redQuantity.php?productid=$pid&cartname=$nam&type=2>  Q++  </a></td>
						<td><a href = delete.php?productid=$pid&cartname=$nam>  remove  </a></td></tr>
				";
			}

	}

?>
</tbody></table>
</div>
<?php
	echo "<h3 align = 'center'> Your total is: Rs. ".$mainTotal."</h3></br>";
	if($mainTotal > 0){
		echo "<h3 align = 'center'><a href='OrderSummary.php?cartname=$cartname'>PlaceOrder</a></h3></br></br>";	
	}
	else
	{
		echo "<h3 align = 'center'>PlaceOrder</a></h3></br></br>";
	}
	echo "<h3 align = 'center'><a href='ClearCart.php?cartname=$cartname'>Clear My Cart</a></h3></br></br>";
?>


<?php include 'footer.php' ; ?>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>

</body>
</html>