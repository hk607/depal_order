<?php 
 use App\Models\Hotel;
 $hotels = Hotel::get();
?>
<div class="section padding-top-bottom over-hide footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-md-left">
				<h6>About Primo Resorts</h6>
				<p>Hotel Primo Resorts - being the best hotel in Manali, just 2 km away from Mall Road, is a good option for leisure travellers. Primo Resorts is a luxurious resort enriched with world-class facilities and comfort. It is a stylish property ranking high in hospitality.</p>				</div>
			<div class="col-md-3 text-md-left">
				<h6>Quick Links</h6>
				<a href="{{route('welcome')}}"><i class="fa fa-circle"></i>Home</a>
				<a href="{{route('aboutus')}}"><i class="fa fa-circle"></i>About Us</a>
				<a href="{{route('user.gallery', 'primo-resorts')}}"><i class="fa fa-circle"></i>Our Gallery</a>
				<a href="{{route('contactus')}}"><i class="fa fa-circle"></i>Contact Us</a>
				<a href="{{route('term-and-conditions')}}"><i class="fa fa-circle"></i>Terms & Conditions</a>
				<a href="{{route('refund-policy')}}"><i class="fa fa-circle"></i>Cancellation / Refund Policy</a>
				<a href="{{route('privacy-policy')}}"><i class="fa fa-circle"></i>Privacy Policy</a>
			</div>
			<div class="col-md-3 text-md-left">	
				<h6>What we offer</h6>
				<a href="accomodation-in-manali"><i class="fa fa-circle"></i>Accomodation</a>
				<a href="{{route('user.packages','primo-resorts')}}"><i class="fa fa-circle"></i>Packages in Manali</a>
				<a href="{{route('restaurant')}}"><i class="fa fa-circle"></i>Restaurant</a>	
				<a href="{{route('other-activities')}}" ><i class="fa fa-circle"></i>Other Activities</a>
			</div>				
			<div class="col-md-3 text-md-left">
				<img src="img/logo-white.png" alt="">
				<a href="#"><i class="fa fa-map-marker"></i><span>PRIMO RESORTS, White Field, Kanyal Road, Manali Distt., Kullu, H.P., India</span></a>
				<a href="mailto:sales@primoresorts.in"><i class="fa fa-envelope"></i><span>sales@primoresorts.in</span></a>					
				<a href="tel:+91-9254039139"><i class="fa fa-phone"></i><span>+91-92540-39139</span></a>
				<a href="tel:+91-8950067717"><i class="fa fa-phone"></i><span>+91-89500-67717</span></a>
			</div>
		</div>
	</div>	
</div>
<div class="container">
    <div class="row">
        <!-- Left Side: Copyright -->
        <div class="col-md-6 text-md-left mb-2 mb-md-0">
            <p>Copyright © 2024 Primo Resorts. All rights reserved.</p>
        </div>

        <!-- Right Side: Social Icons -->
        <div class="col-md-6 text-md-right">
            <a href="#" class="social-top" target="_blank">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="#" class="social-top" target="_blank">
                <i class="fa fa-instagram"></i>
            </a>
            <a href="#" class="social-top" target="_blank">
                <i class="fa fa-twitter"></i>
            </a>
        </div>
    </div>
</div>

<div class="scroll-to-top"></div>
<!-- Check Pin Code Modal -->
	<div class="modal fade" id="bookForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog homepage" role="document">
		<div class="modal-content">
		  <div class="modal-header text-center">
			<h5 class="modal-title">book rooms</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <i class="fa fa-close"></i>
			</button>
		  </div>
		  <form action="{{ route('user.search_rooms')}}" method="GET" enctype="multipart/form-data" class="search-frm" >
		  <div class="modal-body">
		    <div class="input-group">
				<select name="hotel" class="wide bordered" required>
                    @foreach($hotels as $key)
                        <option value="{{$key->id}}">{{ $key->name }}</option>
                    @endforeach
                </select>
			</div>    
			<div class="input-group">
			  <!--<label data-error="wrong" data-success="right" for="defaultForm-email">Adults</label>-->
				<select class="form-control" name="adults">
					<option value="adults" >No. Of Adults</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
					<option value="4" >4</option>
					<option value="5" >5</option>
				</select>
			</div>
			<div class="input-group">
			  <!--<label data-error="wrong" data-success="right" for="defaultForm-email">Children</label>-->
				<select class="form-control" name="children">
					<option value="children" >No. Of Children</option>
					<option value="0" >0</option>
					<option value="1" >1</option>
					<option value="2" >2</option>
					<option value="3" >3</option>
					<option value="4" >4</option>
					<option value="5" >5</option>
				</select>
			</div>
		    <div class="input-daterange input-group" id="flight-datepicker-1">
                <div class="row">
                    <div class="col-6">
                        <div class="form-item">
                            <span class="fontawesome-calendar"></span>
                            <input class="input-sm bordered" type="text" autocomplete="off" id="start-date-1" name="start" placeholder="check-in date" data-date-format="DD, MM d" />
                            <span class="date-text date-depart"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-item">
                            <span class="fontawesome-calendar"></span>
                            <input class="input-sm bordered" type="text" autocomplete="off" id="end-date-1" name="end" placeholder="check-out date" data-date-format="DD, MM d" />
                            <span class="date-text date-return"></span>
                        </div>
                    </div>
                </div>
            </div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-success">search</button>
			<button class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
		  </div>
		</div>
	  </div>
	</div>

<!-- JAVASCRIPT
================================================== -->
<script src="{{ asset('sandya_hotels/js/jquery.min.js') }}"></script>
<script src="{{ asset('sandya_hotels/js/popper.min.js') }}"></script>
<script src="{{ asset('sandya_hotels/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('sandya_hotels/js/plugins.js') }}"></script>
<script src="{{ asset('sandya_hotels/js/flip-slider.js') }}"></script>
<script src="{{ asset('sandya_hotels/js/reveal-home.js') }}"></script>
<script src="{{ asset('primo/js/custom.js') }}"></script>
<script src="{{ asset('sandya_hotels/js/aos.js') }}"></script>
<script src="{{ asset('sandya_hotels/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('sandya_hotels/js/swiper-bundle.min.jsx') }}"></script>
<script src="{{ asset('sandya_hotels/js/droopmenu.js') }}"></script>
<script src="{{ asset('sandya_hotels/js/jquery.niftymodals.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

@yield('scripts')
<script type="text/javascript">	
	jQuery(function($){
    	$('.droopmenu-navbar').droopmenu({
    		dmArrow:true,
    		dmArrowDirection:'dmarrowup',
    		dmOffCanvas:false,
    		dmHideClick:0
    	});
	});
</script>

<script>     
   var swiper = new Swiper(".mySwiper", {        
            spaceBetween: 10,        
            slidesPerView: 4,        
            freeMode: true,        
            watchSlidesProgress: true,        
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

<script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
    
<script>
      var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"WhatsApp Us","cornerRadius":40,"marginBottom":20,"marginLeft":20,"marginRight":20,"btnPosition":"right","whatsAppNumber":"919254039139","welcomeMessage":"Hello","zIndex":999999,"btnColorScheme":"light"};
      var wa_widgetSetting = {"title":"Primo Resorts","subTitle":"Very responsive","headerBackgroundColor":"#FBFFC8","headerColorScheme":"dark","greetingText":"Hi there! \nHow can I help you?","ctaText":"Start Chat","btnColor":"#1A1A1A","cornerRadius":40,"welcomeMessage":"Hello","btnColorScheme":"light","brandImage":"http://designins.designingmart.com/primoresorts/img/logo-chat.png","darkHeaderColorScheme":{"title":"#333333","subTitle":"#4F4F4F"}};  
      window.onload = () => {
        _waEmbed(wa_btnSetting, wa_widgetSetting);
      };
</script>
