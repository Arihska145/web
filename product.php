<head>
				<title>Shopin A Ecommerce Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
				<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
				<!-- Custom Theme files -->
				<!--theme-style-->
				<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
				<!--//theme-style-->
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
				Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
				<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
				<!--theme-style-->
				<link href="css/style4.css" rel="stylesheet" type="text/css" media="all" />	
				<!--//theme-style-->
				<script src="js/jquery.min.js"></script>
				<!--- start-rate---->
				<script src="js/jstarbox.js"></script>
					<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
						<script type="text/javascript">
							jQuery(function() {
							jQuery('.starbox').each(function() {
								var starbox = jQuery(this);
									starbox.starbox({
									average: starbox.attr('data-start-value'),
									changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
									ghosting: starbox.hasClass('ghosting'),
									autoUpdateAverage: starbox.hasClass('autoupdate'),
									buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
									stars: starbox.attr('data-star-count') || 5
									}).bind('starbox-value-changed', function(event, value) {
									if(starbox.hasClass('random')) {
									var val = Math.random();
									starbox.next().text(' '+val);
									return val;
									} 
								})
							});
						});
						</script>
				<!---//End-rate---->
				
</head>
<body>
	<!---pop-up-box---->					  
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!---//pop-up-box---->
	<div id="small-dialog" class="mfp-hide">
		<div class="search-top">
			<div class="login-search">
				<input type="submit" value="">
				<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">		
			</div>
			<p>Shopin</p>
		</div>				
	</div>
 <script>
	$(document).ready(function() {
	$('.popup-with-zoom-anim').magnificPopup({
	type: 'inline',
	fixedContentPos: false,
	fixedBgPos: true,
	overflowY: 'auto',
	closeBtnInside: true,
	preloader: false,
	midClick: true,
	removalDelay: 300,
	mainClass: 'my-mfp-zoom-in'
	});
																				
	});
</script>		
				<!----->
	</div>
	<div class="clearfix"></div>
</div>	
</div>	
</div>
<!--banner-->
<div class="banner-top">
<div class="container">
<h1>Artworks</h1>
<em></em>
<h2><a href="index.html">Home</a><label>/</label>Artworks</h2>
</div>
</div>
<!--Products-->
	<?php include 'browse-paintings.php'; ?>
<!--Products-->

	
					
				</div>
	<!--//content-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	<script src="js/simpleCart.min.js"> </script>
<!-- slide -->
<script src="js/bootstrap.min.js"></script>
 <!--light-box-files -->
		<script src="js/jquery.chocolat.js"></script>
		<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
		<!--light-box-files -->
		<script type="text/javascript" charset="utf-8">
		$(function() {
			$('a.picture').Chocolat();
		});
		</script>
</body>