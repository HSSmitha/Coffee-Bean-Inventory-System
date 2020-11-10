<!DOCTYPE html>
<html lang="en">
<head>
<title>Coffee-Bean | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">   
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" property="" />   

<link href="css/font-awesome.css" rel="stylesheet"> 

<script src="js/jquery-2.2.3.min.js"></script> 

<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

</head>
<body>
	<div class="banner">  
		<div class="header agileinfo-header">
			<nav class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a href="index.php"><i class="fa fa-leaf" aria-hidden="true"></i>Coffee Bean</a></h1>
					</div> 

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-left"> 
							<li><a href="index.php" class="w3ls-hover active">Home</a></li>
							<li><a href="about.php" class="btn w3ls-hover">About</a></li>   
							<li><a href="gallery.php" class="btn w3ls-hover">Gallery</a></li>
							<li><a href="news.php" class="btn w3ls-hover">News</a></li>
							<li><a href="#" class="dropdown-toggle btn w3ls-hover" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="estate/index.php">Estate Owner</a></li>
									<li><a href="customer/index.php">Customer</a></li>     
								</ul>
							</li>  
							<li><a href="contact.php" class="btn w3ls-hover">Contact</a></li>
						</ul>	   
						<div class="social-icon">
							<a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
							<a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a> 
							<a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a>  
						</div> 
						<div class="clearfix"> </div>
					</div>
				</div>
			</nav>
		</div>
		<div class="banner-text"> 
			<div class="container">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="banner-w3lstext">
								<h3>Improve Your Coffee Bean..!</h3>
								<p>We Have Free coffee details for Everyone
							    Our web application has coffee beans information registered with coffee planters,checked coffee news for quality and originality and technologyand innovation. What's more, these information absolutely usefull to people! user can get a lot of information.</p>
							</div>
						</li>
						<li>
							<div class="banner-w3lstext">
								<h3>Arabica Coffee Bean </h3>
								<p>Arabica coffee beans are more smother,more aroma,more expensive and bush takes longer to grow up
								to 5 years.</p>
							</div>
						</li>
						<li>
							<div class="banner-w3lstext">
								<h3>Robusta Coffee Bean</h3>
								<p>Robusta coffee beans bitter,hasher and more caffine.The bush takes only to 3 years to develop.coffee bean is very sensitive by its surroundings. Position of plants in an area has medium light and geographical condition is neccessary for planting coffee.
							 </p>
							</div>
						</li>
					</ul> 
				</div> 	 
			</div>
		</div>   
	</div>
	<div class="features">
		<div class="container">
			<div class="w3ls-heading">
				<h2 class="h-two">Features</h2>
				<p class="sub two">Coffee Bean Inventory System.</p>
			</div>
		<div class="w3-agile-top-info">	
			<div class="w3-welcome-grids">
				<div class="col-md-7 w3-welcome-left">
					<h5>Whats new in Coffee Bean Inventory System...</h5>
					<p>Our inventory system helps various coffee planters to maintain the records of stock and sales. Without any manual marketing they can get customer application by digital marketing.It provide computerised data storage facility. Coffee planters can search easily any records of labours.
					To reduce the cost that affects when producing coffee bean through dealers.
 					<span>The most important thing about the application is that it is very user friendly and no professional skills or knowledge is required so anyone and everyone can use it.It is help to control and balance the flow of incoming and outgoing investment of coffee planters.It contributes significantly to foreign exchange earnings and plays a leading role on development of country</span></p>
				</div>
				<div class="col-md-5 w3ls-welcome-img1">
					<img src="images/s1.jpg" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3-welcome-grids w3-welcome-bottom">
				<div class="col-md-5 w3ls-welcome-img1 w3ls-welcome-img2">
					<img src="images/s2.jpg" alt="" />
				</div>
				<div class="col-md-7 w3-welcome-left">
					<h5>Usefull to Coffee Planters </h5>
					<p>Planter can easily maintain workers details like collected coffee beans and salary information.Planters can get rate information of different types of coffee beans from admin.Customer can get information of production of coffee beans.<span>Admin will provide the information about diseases and machinery to planters.</span></p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
	<div class="testimonials">
	   <div class="test_agile_info">
		<div class="container">
			<ul id="flexiselDemo1">	

			<?php
			include('dbcon.php');
			$sql = mysql_query("SELECT * FROM `feedback_details` WHERE DATE(f_date)=CURDATE()");
			while($res = mysql_fetch_array($sql))
			{
				$cid = $res['cid'];
				$r = mysql_query("SELECT * FROM `customer_details` WHERE c_id='$cid'");
				$row = mysql_fetch_array($r);
				$cname = $row['c_name'];
				echo'
				<li>
					<div class="wthree_testimonials_grid_main">
						<div class="wthree_testimonials_grid">
							<h4>What Client say</h4>
							<p>'.$res['feedback'].'</p>
								<h5>'.$cname.'</h5>
							
						</div>
					
					</div>
				</li>
				';
			}
			?>		
			</ul>
		</div>
	</div>
</div>

	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<i class="fa fa-pagelines" aria-hidden="true"></i>Coffee Bean
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<img src="images/s1.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div class="footer-agile">
		<div class="container">
			<div class="footer-agileinfo"> 
				<div class="col-md-5 col-sm-5 footer-wthree-grid"> 
					<div class="agileits-w3layouts-tweets">  
						<h5><a href="index.php"><i class="fa fa-pagelines" aria-hidden="true"></i>Coffee Bean</a></h5> 
						<div class="social-icon footerw3ls">
							<a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
							<a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a> 
							<a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a>  
						</div>
					</div>
					<p>Coffee Bean Inventory System helps various coffee planters to maintain the records of stock and sales. Without any manual marketing they can get customer application by digital marketing.</p>
				</div> 
				<div class="col-md-3 col-sm-3 footer-wthree-grid">
					<h3>Quick Links</h3>
					<ul>
						<li><a href="index.php"><span class="glyphicon glyphicon-menu-right"></span> Home</a></li>
						<li><a href="about.php"><span class="glyphicon glyphicon-menu-right"></span> About</a></li> 
						<li><a href="gallery.php"><span class="glyphicon glyphicon-menu-right"></span> Gallery</a></li>
						<li><a href="news.php"><span class="glyphicon glyphicon-menu-right"></span> News</a></li>
						<li><a href="contact.php"><span class="glyphicon glyphicon-menu-right"></span> Contact</a></li>
					</ul>
				</div> 	 
				<div class="col-md-4 col-sm-4 footer-wthree-grid">
					<h3>Contact Info</h3>
					<ul>
						<li>Alvas Education Foundation,Vidhyagiri</li> 
						<li>Moodbidri</li>
						<li>Phone: +08258-23810-238111</li>
						<li><a href="mailto:info@alvas.com"> mail@alvas.com</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>		
			</div>
			<div class="copy-right"> 
				<p>© 2018 Coffee Bean. All rights reserved | Design by H.S.Smitha and Sinchana K.V.</p>
			</div>
		</div>
	</div> 

	<script defer src="js/jquery.flexslider.js"></script>
		<script type="text/javascript">
			$(window).load(function(){
			  $('.flexslider').flexslider({
				animation: "slide",
				start: function(slider){
				  $('body').removeClass('loading');
				}
			  });
			});
		</script>

<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems:1,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems:1
										},
										tablet: { 
											changePoint:768,
											visibleItems: 1
										}
									}
								});
								
							});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>

	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('php,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>

	<script type="text/javascript">
		$(document).ready(function() {
	
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <script src="js/bootstrap.js"></script>
</body>
</html>