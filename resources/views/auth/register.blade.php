@extends('layouts.default')
@section('title','Sign In')
@section('content')
<!--<div class="section big-55-height over-hide z-bigger">-->
<!--    <div class="parallax parallax-top" style="background-image: url({{ asset('sandya_hotels/img/gallery/10.jpg') }} )"></div>-->
<!--    <div class="dark-over-pages"></div>-->
<!--    <div class="hero-center-section pages">-->
<!--        <div class="container">-->
<!--            <div class="row justify-content-center">-->
<!--                <div class="col-12 parallax-fade-top">-->
<!--                    <div class="hero-text">Get in Touch</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="section padding-top z-bigger" style="padding-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center">
                <div class="row justify-content-center">
                    <div class="col-12 text-center"> <img src="{{ asset('sandya_hotels/img/logo-coloured.png') }}" class="img-responsive" style="width:300px;margin:0 0 1em;" alt="Logo"> </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
<div class="section padding-top white-bg z-bigger" style="display:flex;">
    <div class="container">
        <div class="col-md-12">
            <form method="post" action="{{ route('register') }}" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-6">

                        <h3 class="text-center padding-bottom-small" style="padding-bottom:40px;">Sign Up</h3>
                    </div>
                    <div class="section clearfix"></div>
                    <div class="col-md-6 ajax-form">
                        <input name="name" type="text" placeholder="Your Name: *" autocomplete="off" required />
                        <br /><br />
                        @error('name')

                        <strong>{{ $message }}</strong>

                        @enderror
                    </div>
                    <div class="col-md-6  mt-md-0 ajax-form">
                        <input name="email" type="text" placeholder="E-Mail: *" autocomplete="off" required />
                        @error('email')

                        <strong>{{ $message }}</strong>

                        @enderror
                    </div>
                    <div class="col-md-6 ajax-form">
                        <input name="mobile" type="text" placeholder="Mobile Number: *" autocomplete="off" required />
                        <br /><br />
                        @error('mobile')

                        <strong>{{ $message }}</strong>

                        @enderror
                    </div>
                    <div class="col-md-6 ajax-form">
                        <input name="password" type="password" placeholder="Password: *" autocomplete="off" required />
                        <br />
                        @error('password')

                        <strong>{{ $message }}</strong>

                        @enderror
                    </div>

                    <div class="section clearfix"></div>
                    <div class="col-md-8 mt-3 text-center">
                        <input type="submit" class="send_message" id="send" name="signup" value="Sign Up" style="background-color:#000; color:#fff; padding:5px 10px; cursor: pointer; border:0px;">
                    </div>
                    <div class="section clearfix"></div>



                </div>
            </form>




        </div>
    </div>
</div>
@endsection