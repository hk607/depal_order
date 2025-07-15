<?php use App\Http\Controllers\SearchController; ?>
@extends('layouts.default')
@section('title','Rooms Available of '. $hotel_detail->name)
@section('content')
<style>
    .product-info {margin:1rem 0;float:left;width:100%;}
    .product-desc {background-color:#f2f2f2;border:1px solid #ccc;}
    .product-desc h4 {font-size:1.5rem;}
    .product-desc h5 {font-size:1rem;margin:0 0 .5rem;}
    .cnt{color:#1b292f;font-size:.9em;display:inline-block;}
    .cnt-blk {color:#1b292f;font-size:.9em;display:block;}
    .cnt>span.fa, .cnt-blk>span.fa { float: left; color: #b27500;margin:.2em .3em 0 0;width:20px;text-align:center;}
</style>
<section class="breadcrum">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Rooms Available of {{ $hotel_detail->name }}</h2>
            </div>
        </div>
    </div>
</section>

<section class="about pro">
    <div class="container">
			<div class="row">					
			
				@forelse($rooms as $key) 
                    @php
                      if($key->service_ids != '') {
                         $service_ids = explode(',',$key->service_ids);
                      } else {
                        $service_ids = [];
                      }
                    @endphp
    				<div class="col-md-4 col-sm-6 col-xs-6">
    					<div class="product-info">
    						<div class="product-img">
    						    @if(count($key->roomdetails->images) > 0)
    							     <a href="{{ asset('tmp/uploads/'.$key->roomdetails->images[0]->upload_image) }}" data-fancybox="gallery"><img src="{{ asset('tmp/uploads/'.$key->roomdetails->images[0]->upload_image) }}" alt="" ></a>
    						    @endif
    						</div>
    						<div class="product-thumbs">
    						    @foreach($key->roomdetails->images as $key1)
                                    <a href="{{ asset('tmp/uploads/'.$key1->upload_image) }}" data-fancybox="gallery"><img src="{{ asset('tmp/uploads/'.$key1->upload_image) }}" alt="" ></a>
                                @endforeach
    							<!--<a href="img/3.jpg" data-fancybox="gallery"><img src="img/3.jpg" alt="" ></a>-->
    							<!--<a href="img/home3.jpg" data-fancybox="gallery"><img src="img/home3.jpg" alt="" ></a>-->
    							<!--<a href="img/3.jpg" data-fancybox="gallery"><img src="img/3.jpg" alt="" ></a>-->
    							<!--<a href="img/home3.jpg" data-fancybox="gallery"><img src="img/home3.jpg" alt="" ></a>-->
    							<!--<a href="img/3.jpg" data-fancybox="gallery"><img src="img/3.jpg" alt="" ></a>-->
    						</div>
    						<div class="product-desc">								
    							<!--<h4>{{$key->roomdetails->types->name}}</h4>-->
                                <h5>{{$key->roomdetails->types->name}}</h5>
            					<!--<ul>-->
                 <!--                   @foreach($service_ids as $service => $value)-->
                 <!--                       @if($service <= 3)-->
                 <!--                           <li style="color: #000;">{{ SearchController::service_detail($value)['name'] }}</li>-->
                 <!--                       @endif    -->
                 <!--                   @endforeach-->
                 <!--               </ul>-->
    							<div class="prices"><span>Offer Price <small>(Two Pax)</small> <br>&#8377;  {{ $key->roomdetails->room_rate}}</span>@if($key->roomdetails->extra_person_rate > 0) <span>Extra Person <br>&#8377;  {{ $key->roomdetails->extra_person_rate}}</span> @endif @if($key->roomdetails->extra_child_rate > 0) <span>Extra Child <br>&#8377; {{ $key->roomdetails->extra_child_rate}}</span>@endif </div>
    							<a href="tel:{{$mobiles['mobile_1']}}" class="cnt"><span class="fa fa-phone"></span> <span class="fa fa-whatsapp"></span> {{$mobiles['mobile_1']}},</a>
    							<a href="tel:{{$mobiles['mobile_2']}}" class="cnt"> {{$mobiles['mobile_2']}}</a>
    							<a href="#" class="view-btn blk view_detail" roomId="{{$key->id}}">view more details...</a>
    						</div>						
    					</div>
    				</div>
    			 @empty

            @endforelse	

			</div>
		</div>
</section>
<form id="search-room-detail" action="{{ route('user.search_rooms')}}" method="GET" enctype="multipart/form-data" target="_blank">
   <input type="hidden" name="hotel" value="{{ $hotel_detail->id}}">
   <input type="hidden" name="adults" value="{{ $RequestData['adults']}}">
   <input type="hidden" name="start" value="{{ $RequestData['start']}}">
   <input type="hidden" name="end" value="{{ $RequestData['end']}}">
   <input type="hidden" name="childrens" value="{{ $RequestData['childrens']}}">
   <input type="hidden" name="type" value="roomdetail">
   <input type="hidden" name="roomid" value="">
</form>
@endsection
@section('scripts')
    <script>
        $('body').on('click', '.view_detail', function() {
            var roomId = $(this).attr('roomId');
            $("input[name='roomid']").val(roomId);
            $("#search-room-detail").submit();
            return false;
        });
    </script>    
@stop