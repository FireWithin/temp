<?php
// Start the session
	session_set_cookie_params(3600,"/");
	session_start();
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	$db = mysqli_connect("localhost",'root','121');
	$query = "use fdx";
	mysqli_query($db, $query);
	$query = "show tables";
	if (mysqli_connect_errno()){
 		echo "Failed to connect to MySQL: " . mysqli_connect_error();
 	}
?>	
<body>
<!-- header -->
	<?php include 'head.php' ?>
<!-- //header -->

	<div class="banner">
		<?php
				$catid = $_GET['catid'];
				$query= "SELECT category_name from category where category.category_id = '$catid'";
				$a = mysqli_fetch_array(mysqli_query($db, $query));
		?>
		<?php include 'leftnav.php' ?>

		<div class="w3l_banner_nav_right">
			<div class="">
				<img src="images/rajasthan_namkeen.jpg"></img>
			</div>

			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub" style="margin: 0 auto" >
				<h3 class="w3l_fruit"><?php echo $a[0]; ?></h3>
				
			<?php 
				$query = mysqli_query($db, "Select * from products where products.category_id='$catid'");
				while($arr = mysqli_fetch_array($query)){ ?>
				<div class="hover14 column" style="float: left" height="200px" width="200px">
							<div class="agile_top_brand_left_grid1"  style="margin: 10px">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="pd.php?pid=<?php echo $arr[0];?>">
												<img height="200px" width="200px" src="<?php echo $arr[6]; ?>"/>
											</a>
											<p style="width: 190px"><?php echo $arr[1]; ?></p>
											<h4><?php echo "Rs." . $arr[3]; ?> <span><?php echo "Rs." . (1.1)*$arr[3]; ?></span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="can - tuna for cats" />
													<input type="hidden" name="amount" value="8.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<a href="target.php?id=<?php echo $arr[0]; ?> "> 
													Add to cart</a> 
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						
				<?php } ?>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- footer -->
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
			$().UItoTop({ easingType: 'easeOutQuart' });
								
		});
	</script>
<!-- //here ends scrolling icon -->
<?php if(!isset($_SESSION["email_id"])){
	$_SESSION['lastloc'] = "category.php";
}
?>
</body>
</html>