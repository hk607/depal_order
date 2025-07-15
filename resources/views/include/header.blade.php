<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="icon" href="images/fav.ico" >
	<meta name="theme-color" content="#d1a751" >
	<?php $url="/depal/";?>
	
    <!-- Bootstrap -->
	<link id="effect" rel="stylesheet" type="text/css" media="all" href="css/megamenu/fade-down.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/megamenu/webslidemenu.css" />
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="css/megamenu/white-red.css" />
	<link rel="stylesheet" href="{{asset('css/megamenu/demo.css')}}" />
	<link href="{{asset('css/swiper-bundle.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/fancybox.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/util.carousel.css')}}"rel="stylesheet" >
	<link href="{{asset('css/util.carousel.skins.css')}}" rel="stylesheet" >
	<link href="{{asset('css/depal.css')}}" rel="stylesheet">
	<link href="{{asset('css/megamenu/custom.css')}}" rel="stylesheet">
	
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
		<section class="top-links" id="fixed">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		
						<a href="tel:+91-9053155866"><i class="fa fa-phone" aria-hidden="true"></i>+91-9053155866</a>
						<a href="mailto:info@depal.com" style="text-transform: none;"><i class="fa fa-envelope" aria-hidden="true"></i>info@depal.com</a>
						<a href="#"><i class="fa fa-car" aria-hidden="true"></i>Delivery available across jagadhari & yamunanagar</a>
					</div>
				</div>
			</div>
		</section>
  		
		<section class="menu">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
						<div class="logo">
							<a href="<?php echo $url;?>"><img src="{{asset('images/logo.png')}}" class="img-responsive" alt="" /></a>
						</div>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<!-- Mobile Header -->
							  <div class="wsmobileheader clearfix ">
								<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
								<!--<span class="smllogo"><img src="images/sml-logo02.png" width="80" alt="" /></span>
								<a href="tel:123456789" class="callusbtn"><i class="fas fa-phone"></i></a>-->
							  </div>
							  <!-- Mobile Header -->
							 
							  <div class="wsmainfull clearfix">
								<div class="wsmainwp clearfix">


								  <!--<div class="desktoplogo"><a href="#"><img src="images/sml-logo02.png" alt=""></a></div>-->
								  <!--Main Menu HTML Code-->
								  <nav class="wsmenu clearfix">
									<ul class="wsmenu-list">
									  <!--<li aria-haspopup="true" class="rightmenu">
										<form class="topmenusearch">
										  <input placeholder="Search...">
										  <button class="btnstyle"><i class="fa fa-search"></i></button>
										</form>
									  </li>-->
									  <li><a href="<?php echo $url;?>" >home</a></li>
									  <li><a href="about" class="<?php if(isset($about)) { echo $about; }?>">about us</a>
										<!--<ul class="sub-menu">
											<li><a href="#">our variety</a></li>
											<li><a href="#">our commitment</a></li>
										</ul>-->
									  </li>
									  <li aria-haspopup="true"><a href="products" class="<?php if(isset($products)) { echo $products; }?>">our products <span class="wsarrow"></span></a>
										<ul class="sub-menu">
											<li><a href="products-list" class="<?php if(isset($products)) { echo $products; }?>">Groundnut Oil</a></li>
											<li><a href="product-details" class="<?php if(isset($products)) { echo $products; }?>">Coconut Oil</a></li>
											<li><a href="product-details" class="<?php if(isset($products)) { echo $products; }?>">Black Mustard Oil</a></li>
											<li><a href="product-details" class="<?php if(isset($products)) { echo $products; }?>">Yellow Mustard Oil</a></li>
											<li><a href="product-details" class="<?php if(isset($products)) { echo $products; }?>">Sesame (Til) Oil</a></li>
											<li><a href="product-details" class="<?php if(isset($products)) { echo $products; }?>">Almond Oil</a></li>
										</ul>
										<!--<div class="wsmegamenu clearfix ">
										  <div class="container">
											<div class="row">
											  <div class="col-lg-12 col-md-12 col-xs-12 text-center">
												<div class="categorise-products">
												<a href="product-details"><img src="images/product-range/1.jpg" class="" alt="" >retails</a>
												<a href="product-details"><img src="images/product-range/2.jpg" class="" alt="" >petjar handle</a>
												<a href="product-details"><img src="images/product-range/3.jpg" class="" alt="" >family of bears shape</a>
												<a href="product-details"><img src="images/product-range/4.jpg" class="" alt="" >squeeze jar cone cap</a>
												<a href="product-details"><img src="images/product-range/5.jpg" class="" alt="" >portion pack</a>
												<a href="product-details"><img src="images/product-range/6.jpg" class="" alt="" >nuts with honey</a>
												<a href="product-details"><img src="images/product-range/7.jpg" class="" alt="" >herbal honey</a>
												<a href="product-details"><img src="images/product-range/8.jpg" class="" alt="" >bulk packing</a>
												</div>
											  </div>
											  <div class="col-lg-12 col-md-12 col-xs-12 text-center">
												<a href="products" class="view-all" >view all</a>
											  </div>
											</div>
										  </div>
										</div>-->
									  </li>													
									  						  
									   <li><a href="quality-promise" class="<?php if(isset($quality)) { echo $quality; }?>">quality promise</a></li>
									   <li><a href="certifications"  class="<?php if(isset($certifications)) { echo $certifications; }?>">certifications</a></li>									  		
									 <li><a href="contact"  class="<?php if(isset($contact)) { echo $contact; }?>">contact us</a></li>			
									  <!--<li><a href="contact">Download Catalogue</a></li>	-->								  									  
									</ul>
								  </nav>
								  <!--Menu HTML Code-->
								</div>
							  </div>


							  <div class="swichermainbx clearfix">
								
							  </div>
					</div>
					
					
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">	  
							<div class="social">
								<a href="#" target="_blank" ><i class="fa fa-facebook"></i></a>
								<a href="#" target="_blank" ><i class="fa fa-twitter"></i></a>
								<a href="#" target="_blank" ><i class="fa fa-youtube"></i></a>
								<a href="#" target="_blank" ><i class="fa fa-instagram"></i></a>
								<a href="#" target="_blank" ><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
						
				</div>
			</div>	
		</section>