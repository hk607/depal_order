@extends('layouts.default')
@section('title','Payment Received Successfully')
@section('content')
		<div class="section background-dark over-hide">
		
		<div class="slideshow" style="height:70vh;">
			<div class="slide slide--current parallax-top">
				<figure class="slide__figure">
					<div class="slide__figure-inner">
						<div class="slide__figure-img" style="background-image: url({{asset('sandya_hotels/img/home1.jpg')}})"></div>
						<div class="slide__figure-reveal"></div>
					</div>
				</figure>
			</div>
			<div class="slide parallax-top">
				<figure class="slide__figure">
					<div class="slide__figure-inner">
						<div class="slide__figure-img" style="background-image: url({{asset('sandya_hotels/img/home2.jpg')}})"></div>
						<div class="slide__figure-reveal"></div>
					</div>
				</figure>
			</div>
			<div class="slide parallax-top">
				<figure class="slide__figure">
					<div class="slide__figure-inner">
						<div class="slide__figure-img" style="background-image: url({{asset('sandya_hotels/img/home3.jpg')}})"></div>
						<div class="slide__figure-reveal"></div>
					</div>
				</figure>
			</div>
			
			<div class="slide parallax-top">
				<figure class="slide__figure">
					<div class="slide__figure-inner">
						<div class="slide__figure-img" style="background-image: url({{asset('sandya_hotels/img/home2.jpg')}})"></div>
						<div class="slide__figure-reveal"></div>
					</div>
				</figure>
			</div>
			<!-- revealer -->
			<div class="revealer">
				<div class="revealer__item revealer__item--left"></div>
				<div class="revealer__item revealer__item--right"></div>
			</div>
			<nav class="arrow-nav fade-top">
				<button class="arrow-nav__item arrow-nav__item--prev">
					<svg class="icon icon--nav"><use xlink:href="#icon-nav"></use></svg>
				</button>
				<button class="arrow-nav__item arrow-nav__item--next">
					<svg class="icon icon--nav"><use xlink:href="#icon-nav"></use></svg>
				</button>
			</nav>
			<!-- navigation -->
			<nav class="nav fade-top">
				
				<h2 class="nav__chapter"></h2>
				<div class="toc">
					<a class="toc__item" href="#entry-1">
						ad
					</a>
					<a class="toc__item" href="#entry-2">
						<span class="toc__item-title"></span>
					</a>
					<a class="toc__item" href="#entry-3">
						<span class="toc__item-title"></span>
					</a>
				</div>
			</nav>
			<!-- little sides -->
			<div class="slideshow__indicator"></div>
			<div class="slideshow__indicator"></div>
		</div>
	</div>

	

	<div class="section over-hide">

		<div class="container">

			<div class="row">

				<div class="col-md-12 align-self-center">

					<div class="row justify-content-center" id="printableArea">
                    
						<div class="col-12">
							<br>
							<p class="mt-3" style="font-family: 'Oswald', sans-serif; font-weight: 500; font-size:1.7em;">Dear {{$bookingDetail->user_name}} your Booking for {{$bookingDetail->hotelroom->roomdetails->types->name}} in {{$bookingDetail->hotels->name}} is Confirmed.
							<br> Your Booking ID : {{$bookingDetail->booking_number}}<br>Check In Date :{{ \Carbon\Carbon::parse($bookingDetail->from_date)->format('d-M-Y')}}<br>Check Out Date :{{ \Carbon\Carbon::parse($bookingDetail->to_date)->format('d-M-Y')}}</p>
							<p class="mt-3" style="font-family: 'Europa';">Thank you for choosing Sandhya Group of Hotels & Resorts for your Travel Requirements.
							Attached, please find your voucher for Booking ID {{$bookingDetail->booking_number}} For Stay Date ({{date('d M, Y',strtotime($bookingDetail->from_date))}}, )
							</p>
							<p class="mt-3" style="font-family: 'Europa';">A Confirmation Mail of your booking has also been sent to your Email {{ $bookingDetail->email }} (Pls Check Spam Folder too)</p>
						</div>
						<br>
						<div class="col-12">							

							<p class="mt-3" style="font-family: 'Europa';">For any details on your Booking contact Sandhya Group of Hotels & Resorts help desk at</p>
							
							<div class="row">
								<div class="col-md-4 col-xs-12">
									<h6>Manali</h6>								
									<a href="tel:+919418281903"><i class="fa fa-phone"></i>+91-9418281903</a>
								</div>
								<div class="col-md-4 col-xs-12">
									<h6>Kasol</h6>
									<a href="tel:+919418025895"><i class="fa fa-phone"></i>+91-9418025895</a>
								</div>
								<div class="col-md-4 col-xs-12">
									<h6>Kullu</h6>
									<a href="tel:+919218525595"><i class="fa fa-phone"></i>+91-9218525595</a>
								</div>
							</div><br>
							<p style="font-family: 'Europa'; margin:0;">Once again, Thank you for choosing Sandhya Group of Hotels & Resorts</p>
							<p style="font-family: 'Europa';">Thanks &amp; Regards<br>
							<img src="{{asset('sandya_hotels/img/logo-coloured.png')}}" class="img-responsive" style="width:120px;margin:0 0 1em;" alt="Logo" ><br>
							Sandhya Group of Hotels &amp; Resorts<br>
							Reservation Team</p>
							<p class="mt-3" style="font-family: 'Oswald', sans-serif; font-weight: 500; font-size:1.5em;">Hotel Policy</p>
							<p class="mt-3" style="font-family: 'Europa';">The standard check-in time is 12:00 PM and the standard check-out time is 10:00 AM. Early check-in or late check-out is strictly subjected to availability and may be chargeable by the hotel. Any early check-in or late check-out request must be directed and reconfirmed prior with hotel reservation Team.<br>
							Sandhya Group Of Hotels  do not allow unmarried/unrelated couples to check-in. This is at the full discretion of the hotel management. No refund would be applicable in case the hotel denies check-in under such circumstances..
							
							<p class="mt-3" style="font-family: 'Oswald', sans-serif; font-weight: 500; font-size:1.5em;">Cancellation Policy</p>
							<p class="mt-3" style="font-family: 'Europa';">Reservation must be cancelled 15 days prior to the planned date of arrival.
							One night’s room charge will be levied in case of reservation cancelled within 15 days to the date of check-in & 50% amount on the cancellation from 7 to 10 day prior to the date of check-in.<br>
							In case of non-arrival or cancellation on the same day the 100% of the stay amount would be levied.
							In case of Flight or bus cancellation or other circumstances the Hotel shall not be able to cancel the reservation & 100% retention shall be levied on the same.
							
							<br><br><br>
						</div>

					</div>
					
					<button class="btn btn-success" onclick="printDiv('printableArea')">Print</button><br><br><br>

				</div>				

			</div>

		</div>

	</div>

	<div class="section padding-top-bottom-small background-dark-2 over-hide">		

		<div class="container">

			<div class="row">			

				<div class="col-md-12 text-center">	

					<a href="https://vimeo.com/54851233" class="video-button" data-fancybox ><i class="fa fa-play"></i></a>

				</div>

			</div>

		</div>	
		
		<div class="parallax" style="background-image: url('img/1.jpg');z-index:-1;"></div>

	</div>
@endsection
@section("scripts")
<script>
    function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;
    
         document.body.innerHTML = printContents;
    
         window.print();
    
         document.body.innerHTML = originalContents;
    }
</script>
@stop