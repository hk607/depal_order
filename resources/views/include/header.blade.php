<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="images/fav.ico">
    <meta name="theme-color" content="#d1a751">
    <?php $url = '/'; ?>

    <!-- Bootstrap -->
    <link id="effect" rel="stylesheet" type="text/css" media="all" href="{{asset('css/megamenu/fade-down.css')}}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/megamenu/webslidemenu.css')}}" />
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('css/megamenu/white-red.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/megamenu/demo.css') }}" />
    <link href="{{ asset('css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.carousel.css') }}"rel="stylesheet">
    <link href="{{ asset('css/util.carousel.skins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/depal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/megamenu/custom.css') }}" rel="stylesheet">
</head>

<body>

    <section class="top-links" id="fixed">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a href="tel:+91-9053155866"><i class="fa fa-phone" aria-hidden="true"></i>+91-9053155866</a>
                    <a href="mailto:info@depal.com" style="text-transform: none;"><i class="fa fa-envelope"
                            aria-hidden="true"></i>info@depal.com</a>
                    <a href="#"><i class="fa fa-car" aria-hidden="true"></i>Delivery available across jagadhari &
                        yamunanagar</a>
                </div>
            </div>
        </div>
    </section>

    <section class="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="logo">
                        <a href="<?php echo $url; ?>"><img src="{{ asset('images/logo.png') }}" class="img-responsive"
                                alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <!-- Mobile Header -->
                    <div class="wsmobileheader clearfix ">
                        <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
                    </div>
                    <div class="wsmainfull clearfix">
                        <div class="wsmainwp clearfix">
                            <nav class="wsmenu clearfix">
                                <ul class="wsmenu-list">
                                    <li><a href="<?php echo $url; ?>">home</a></li>
                                    <li><a href="{{route('about.us')}}" class="<?php if (isset($about)) {
                                        echo $about;
                                    } ?>">about us</a>
                                    </li>
                                    <li aria-haspopup="true">
                                        <a href="#"
                                            class="{{ isset($activeMenu) && $activeMenu == 'products' ? 'active' : '' }}">
                                            Our Products <span class="wsarrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            @php
                                                use App\Models\Category;
                                                 $category_list = Category::get();
                                            @endphp
                                            @if (isset($category_list) && count($category_list))
                                                @foreach ($category_list as $category)
                                                    <li>
                                                        <a href="{{ url('category/' . $category->slug) }}">
                                                            {{ $category->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li><a href="#">No Products</a></li>
                                            @endif
                                        </ul>
                                    </li>


                                    <li><a href="{{route('quality.promise')}}" class="<?php if (isset($quality)) {
                                        echo $quality;
                                    } ?>">quality promise</a></li>
                                    <li><a href="{{route('certifications')}}" class="<?php if (isset($certifications)) {
                                        echo $certifications;
                                    } ?>">certifications</a></li>
                                    <li><a href="{{route('contact.us')}}" class="<?php if (isset($contact)) {
                                        echo $contact;
                                    } ?>">contact us</a></li>
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
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>

                <div>
                    <a href="{{ route('cart.view') }}" style="position: relative; left:200px; top:30px">
                        <i class="fa fa-shopping-cart fa-lg"></i>
                        <span style="position: absolute; top: -8px; right: -10px; background: red; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px;">
                            {{ session('cart') ? count(session('cart')) : 0 }}
                        </span>
                    </a>
                </div>
                <div class="user-menu" style="">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-success btn-sm">Sign Up</a>
                    @else
                               <!-- Show when LOGGED IN -->
                        <div class="dropdown d-inline" style="margin-left:1200px">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="userDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item btn-primary btn-sm dropdown-toggle                                                                                                                                                                                                                                                                                  " href="{{ route('profile') }}" style="margin:4px;margin-bottom:2px">Profile</a>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn-danger btn-sm">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

            </div>
        </div>
    </section>
