	<section class="best-seller grey">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h3 class="headings dark" style="text-transform: none;" >If you are among those urban consumers who are increasingly seeking products that align with their health goals and sustainable living <span>than, DePal is your Health Partner.</span></h3>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<form method="POST" action="mail" >
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" placeholder="Enter your name" name="name" required >
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter Mobile" onkeypress="if(this.value.length==10) return false;" inputmode="numeric" name="mobile" required="">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type="email" class="form-control" placeholder="Enter your email" name="email" >
						</div>
						<div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<textarea rows="7" cols="10" class="form-control" placeholder="Enter Message" name="message" ></textarea>
						</div>
						<div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<button type="submit" class="btn btn-success" name="submit" ><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;&nbsp;Send Message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<section class="map">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.518179517273!2d77.16538797556053!3d30.222296374834453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390e554f7e733d3b%3A0x5b0e309c298b7065!2sKalesar%20Farms%20Eat%20Better!5e0!3m2!1sen!2sin!4v1717647980219!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="ftr">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<h1 class="ftr-heading">Keshav Products</h1>
						<span><i class="fa fa-paper-plane"></i><a href="https://maps.app.goo.gl/fmrywYzqy741Hhss8" target="_blank" >Tehsil Mustafabad, Thanna Chapper Chowk, Mustafabad, Yamunanagar Haryana-133103</a></span>
						<span><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@depal.com">info@depal.com</a></span>
						<span><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+91-9053155866">+91 90531 55866</a></span>
					</div>
					<!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<h1 class="ftr-heading">Quick Links</h1>
						<a href="privacy-policy">Privacy Policy</a>
						<a href="terms-and-conditions">Terms and Conditions</a>
						<a href="cancellation-and-refund">Cancellation and Refund</a>
						<a href="shipping-and-delivery">Shipping and Delivery</a>
						<a href="contact">Contact Us</a>
					</div>-->
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<h1 class="ftr-heading">Products</h1>
						<a href="products-list">Groundnut Oil</a>
						<a href="product-details">Coconut Oil</a>
						<a href="product-details">Black Mustard Oil</a>
						<a href="product-details">Yellow Mustard Oil</a>
						<a href="product-details">Sesame (Til) Oil</a>
						<a href="product-details">Almond Oil</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<h1 class="ftr-heading">get in touch</h1>
						<div class="social-footer">
							<a href="#" target="_blank" ><i class="fa fa-facebook"></i></a>
							<a href="#" target="_blank" ><i class="fa fa-twitter"></i></a>
							<a href="#" target="_blank" ><i class="fa fa-youtube"></i></a>
							<a href="#" target="_blank" ><i class="fa fa-instagram"></i></a>
							<a href="#" target="_blank" ><i class="fa fa-linkedin"></i></a>
						</div>
						<a href="" class="ftr-logo"><img src="{{asset('images/logo.png')}}" class="img-responsive" alt="" ></a>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<section class="allrights">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<p>Copyright &copy; 2025. all rights reserved.</p>
				</div>
			</div>
		</div>
	</section>

	<a href="tel:+91-9053155866" title="Connect through Call" class="call"><i class="fa fa-phone"></i></a>
	<a href="https://wa.me/+919053155866?text=I%20want%20to%20buy%20oil.%20Please%20send%20me%20the%20price." title="Connect through Whatsapp" class="whatsapp" target="_blank"><img src="images/whatsapp.svg"></a>
	<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;" ><img src="{{asset('images/arrow-up-outline.svg')}}" ></a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/backtotop.js"></script>
	<script src="js/jquery.touchSwipe.min.js"></script>
	<script src="js/swiper.js"></script>
	<script src="js/swiper-bundle.min.jsx"></script>
	<script src="js/fancybox.js"></script>
	<script src="js/jquery.utilcarousel.min.js"></script>
	<!-- Include Below JS After Your jQuery.min File -->
	<script src="js/megamenu/webslidemenu.js"></script>

	<script>
		$(function() {
			$('#shop-by-products').utilCarousel({
				navigation : false,
				navigationText : ['<img src="images/arrow-back-outline.svg" >', '<img src="images/arrow-forward-outline.svg" >'],
				breakPoints : [[1920, 6], [1440, 5], [1200, 4], [992, 3], [768, 3], [480, 2]],
				interval : 2500,
				autoPlay : false,
				slideSpeed: 1000
			});
			$('#shop-by-volume').utilCarousel({
				navigation : true,
				navigationText : ['<img src="images/arrow-back-outline.svg" >', '<img src="images/arrow-forward-outline.svg" >'],
				breakPoints : [[1920, 4], [1440, 4], [992, 3], [768, 3], [480, 2]],
				interval : 2500,
				autoPlay : false,
				slideSpeed: 1000
			});
		});
	</script>

	<script>
	   var swiper = new Swiper(".mySwiper", {
	            spaceBetween: 10,
	            slidesPerView: 10,
	            freeMode: true,
	            watchSlidesProgress: true,
				direction: 'vertical',
	            navigation: {
	                nextEl: ".swiper-button-next",
	                prevEl: ".swiper-button-prev",
	            },
	   });
	   var swiper2 = new Swiper(".mySwiper2", {
	         spaceBetween: 10,
	         navigation: {
	             nextEl: ".swiper-button-next",
	             prevEl: ".swiper-button-prev",
	         },
	         thumbs: {
	            swiper: swiper,
	         },
	   });
	</script>

  </body>
</html>
