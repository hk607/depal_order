@extends('layouts.default')
@section('title','Terms and Conditions')
@section('content')
<section class="breadcrum">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2>Terms and Conditions</h2>
			</div>
		</div>
	</div>
</section>

<div class="section padding-top over-hide abt background-chitta">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="aos-item">
					<h4>Terms and <span>Conditions</span></h4>
					<p class="text-justify mb-1">While it’s rare, DePal reserves the right to cancel an order within 48 hours if there are any
                        unexpected issues with stock or shipping. If this happens, we’ll let you know right away and
                        issue a full refund.</p>
				</div><br>
			</div>
		</div>
	</div>
</div>

<div class="section padding-top-bottom-small over-hide" style="background-color:rgba(27,27,27,.6);padding:10rem 0; ">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="https://youtu.be/wPoBdsEQXU8" class="video-button" data-fancybox><i class="fa fa-play"></i></a>
			</div>
		</div>
	</div>
	<div class="parallax" style="background-image: url({{asset(asset('primo/img/cover.jpg')}});z-index:-1;"></div>
</div>
@endsection
