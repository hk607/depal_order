<?php 
 use App\Models\Hotel;
 use App\Models\Hotelroom;
 use App\Models\Package;
?>
<svg class="hidden">
	<svg id="icon-nav" viewBox="0 0 152 63">
		<title>navarrow</title>
		<path d="M115.737 29L92.77 6.283c-.932-.92-1.21-2.84-.617-4.281.594-1.443 1.837-1.862 2.765-.953l28.429 28.116c.574.57.925 1.557.925 2.619 0 1.06-.351 2.046-.925 2.616l-28.43 28.114c-.336.327-.707.486-1.074.486-.659 0-1.307-.509-1.69-1.437-.593-1.442-.315-3.362.617-4.284L115.299 35H3.442C2.032 35 .89 33.656.89 32c0-1.658 1.143-3 2.552-3H115.737z"/>
	</svg>
</svg>
<div class="droopmenu-navbar">
    <!-- Top Navigation -->
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <ul class="tn-left">
                        <li>
                            <a href="mailto:sales@primoresorts.in">
                                <i class="fa fa-envelope"></i> sales@primoresorts.in
                            </a>
                        </li>
                        <li>
                            <a href="tel:+91-9254039139">
                                <i class="fa fa-phone"></i> +91-92540-39139
                            </a>
                        </li>
                        <li>
                            <a href="tel:+91-8950067717">
                                <i class="fa fa-phone"></i> +91-89500-67717
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-map-marker"></i>
                                PRIMO RESORTS, White Field, Kanyal Road, Manali Distt., Kullu, H.P., India
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="droopmenu-inner">
        <div class="droopmenu-header">
            <a href="/" class="droopmenu-brand">
                <div class="logo">
                    <img src="{{asset('primo/img/logo.png')}}" class="img-responsive" alt="Primo Resorts Logo">
                    <span>Primo Resorts</span>
                </div>
            </a>
            <a href="#" class="droopmenu-toggle"></a>
        </div>

        <div class="droopmenu-nav">
            <ul class="droopmenu">
                <li><a href="{{route('welcome')}}">Home</a></li>
                <li><a href="{{route('aboutus')}}">About Us</a></li>
            	@php
                   $hotels = Hotel::first();
                   $packages = Package::where('hotel_id',$hotels->id)->with('hotels','types')->get();
                @endphp
                <li>
                    <a href="#">What We Offer</a>
                    <ul>
                        <li>
                            <a href="{{route('user.search_rooms')}}?hotel=primo-resorts">Accommodation</a>
                            <ul>
                                @php
                                    $roomdetails = Hotelroom::where('hotel_id',$hotels->id)->with('roomdetails.types')->get();
                                @endphp
                                @foreach($roomdetails as $type)
								    <li><a href="{{route('user.view_type_rooms',$type->id)}}">{{ $type->roomdetails->types->name}}</a></li>
								@endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('user.packages',$hotels->slug)}}">Packages in Manali</a>
                            <ul>
                                @foreach($packages as $package)
                                   <li><a href="{{ route('user.package_detail', $package->slug) }}">{{$package->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{route('restaurant')}}">Restaurant</a></li>
                        <li><a href="{{route('other-activities')}}">Other Activities</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('user.search_rooms')}}?hotel=primo-resorts">
                        Make a Reservation
                    </a>
                </li>
                <li><a href="{{route('user.gallery', 'primo-resorts')}}">Gallery</a></li>
                <li><a href="{{route('contactus')}}">Contact Us</a></li>

                <li>
                    <div class="top-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
