
<!DOCTYPE html>
<html lang="en">
<head>
<title>Coffee-Bean | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">   
<link href="css/lightcase.css" rel="stylesheet" type="text/css" /> 
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.2.3.min.js"></script> 
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

</head>
<body>
	<div class="banner-1">  
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
						<h1><a href="index.php"><i class="fa fa-pagelines" aria-hidden="true"></i>Coffee Bean</a></h1>
					</div> 
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-left"> 
							<li><a href="index.php" class="w3ls-hover ">Home</a></li>
							<li><a href="about.php" class="btn w3ls-hover">About</a></li>   
							<li><a href="gallery.php" class="btn w3ls-hover">Gallery</a></li>
							<li><a href="news.php" class="btn w3ls-hover active">News</a></li>
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
		
	</div>
		<div class="banner-bottom">
			<div class="container">
			<div class="w3ls-heading">
				<h2 class="h-two">News</h2>
			</div>
			<br/>
			<center>
				<div class="rows">
					<?php
					include('dbcon.php');
					$sql = mysql_query("SELECT * FROM `news`");
					while($res = mysql_fetch_array($sql))
					{
						echo'
						<div class="col-md-5" style="margin-left:2%;margin-top:4%;">
							<h3><p>'.$res['title'].'</p></h3>
							<img src="admin/news_image/'.$res['image'].'" alt=" " class="img-responsive" id="img-news"/><br>
							<center><p><a href="news_info.php?id='.$res[0].'" class="btn btn-info">Read More <i class="fa fa-search"></i></a></p></center>
						</div>
						';
					}
					?>
					
					
				<div class="clearfix"> </div>
			</div>
			</center>
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
	<script src="js/lightcase.js"></script>
	<script>
		$('.showcase').lightcase();
	</script>
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