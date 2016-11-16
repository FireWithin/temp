


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
<H1 align="center"> FAVORITES </H1>
<div id="box1" >

		<table align="center">
			<thead>
				<tr>
					<th> S.no. </th>
					<th> Product Name </th>
					<th> Product ID </th>
					<th> Link</th>
					<th> Add to Cart</th>
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
	$query = "use fdx";
	mysqli_query($db, $query);
	if(!isset($_SESSION['unique'])) header("location: login.php");
	$email = $_SESSION["email_id"];
	$res = mysqli_query($db, "select * from favorites natural join products where email_id = '$email'");
	$cnt = 0;
	if(mysqli_num_rows($res)==0){
		echo '<tr><td colspan="10">No Rows Returned</td></tr>';
	} else {
			while($row = mysqli_fetch_assoc($res)){
			//	$pname = $row['product_name'];
				$pid = $row['product_id'];
				$pq = $row['quantity'];
				$cnt += 1;
				
				echo "<tr><td>{$cnt}</td><td>{$row['product_name']}</td>   <td>{$row['product_id']}</td>   
						<td><a href = pd.php?pid=$pid>  View Product  </a></td>
						<td><a href = target.php?id=$pid>  Add to Cart  </a></td>
						<td><a href = dff.php?productid=$pid&email=$email>  remove  </a></td></tr>
				";
			}

	}

?>
</tbody></table>
<br><br><br>
</div>



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