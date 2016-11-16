<title>The foodExplorer</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<div class="agileits_header">
		<div class="w3l_offers">
			<a href="index.php"><?php if(isset($_SESSION["name"])){echo "Hi, " . $_SESSION["name"]; }else{echo "The foodExplorer" ;}?></a>
		</div>
		<div class="w3l_search">
			<form action="search.php" method="post">
				<input type="text" name="Search" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
					
				<input type="submit">
			</form>
		</div>
		<div class="product_list_header">  
			<form class="last">
                <fieldset>
                    <a href="t.php" ><input  value="View your cart" class="button" /> </a>
                </fieldset>
            </form> 
		</div>
		
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
							<?php 
							if(isset($_SESSION["name"])){
							echo "<li><a href='logout.php'>Logout</a></li>"; 
							
							}
							else{
								echo '<li><a href="login.php">Login</a></li> 
								<li><a href="login.php">Sign Up</a></li>';
							}
							?>
								
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><span>FOOD</span> Store</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="index.php">Home</a><i>/</i></li>
					<li><a href="about.php">About Us</a><i>/</i></li>
					<?php
						if(isset($_SESSION['name'])){
							echo '<li><a href="previousOrders.php">View Previous Orders</a><i>/</i></li>'; 
							echo '<li><a href="t.php">View Cart</a><i>/</i></li>';
							echo '<li><a href="favorites.php">Favorites</a><i></i></li>';
						}
						else{
							echo '<li>View Previous Orders<i>/</i></li>';
							echo '<li>   View Cart<i>/</i></li>';
							echo '<li> Favorites<i></i></li>';
						}
					?>
					
				</ul>
			</div>

	</div>
		<!--	<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		-->
	</div>
	<!--div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Enjoy the taste of India</li>
			</ul>
		</div></div-->