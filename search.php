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
		<?php include 'leftnav.php' ?>

		<div class="w3l_banner_nav_right">
			<div class="">
				<img src="images/rajasthan_namkeen.jpg"></img>
			</div>

			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub" style="margin: 0 auto" >
				<h3 class="w3l_fruit"></h3>
				
			<?php 
				$search = $_POST['Search'];
				echo "<h2>Showing results for '". $search . "'</h2>";
				$query = "select * from products natural join (select category_id, category_name from category) as t where category_name like '%$search%' or category_id like '%$search%' or product_name like '%$search%' or product_description like '%$search%'";
				$res = mysqli_query($db,$query);
				while($arr = mysqli_fetch_array($res)){ ?>
				<div class="hover14 column" style="float: left" height="200px" width="200px">
							<div class="agile_top_brand_left_grid1"  style="margin: 10px">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="pd.php?pid=<?php echo $arr['product_id'];?>">
												<img height="200px" width="200px" src="<?php echo $arr['picture']; ?>"/>
											</a>
											<p style="width: 190px"><?php echo $arr['product_name']; ?></p>
											<h4><?php echo "Rs." . $arr['unit_price']; ?> <span><?php echo "Rs." . (1.1)*$arr['unit_price']; ?></span></h4>
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
													<a href="target.php?id=<?php echo $arr['product_id']; ?> "> 
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
<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="w3agile_newsletter_left">
				<h3>sign up for our newsletter</h3>
			</div>
			<div class="w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="subscribe now">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->
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