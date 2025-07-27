@include('include/header');

<title>Welcome to Depal</title>

<section class="slider content">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <h1>True WEALTH lies in the <span>glow of good HEALTH</span></h1>
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{ asset('images/banners/Banner 1.jpg') }}" alt="Chania">
                </div>
                <div class="item">
                    <img src="{{ asset('images/banners/Banner 2.jpg') }}" alt="Chania">
                </div>
                <div class="item">
                    <img src="{{ asset('images/banners/Banner 3.jpg') }}" alt="Chania">
                </div>
                <div class="item">
                    <img src="{{ asset('images/banners/Banner 4.jpg') }}" alt="Chania">
                </div>
                <div class="item">
                    <img src="{{ asset('images/banners/Banner 5.jpg') }}" alt="Chania">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
                </svg>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="48" d="M268 112l144 144-144 144M392 256H100" />
                </svg>
            </a>
        </div>
    </div>
</section>

<section class="quote white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>Health is life’s true fortune nurture it every day with DePal Oils</p>
            </div>
        </div>
    </div>
</section>

<section class="products">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3 class="headings">shop by <span>products</span></h3>
                <!--<p>Honey's benefits have been appreciated and acknowledged all through the world. For its quality of curing some of the most human ailments ranging from the regular diseases to major illness, it amalgamation of health and taste, honey has become a part of the routine lives of a large group of people. A.K.R. Honeybee understand the demand of the this natural sweetner and offers its highly purified and healthy honey in 8 different type packs.</p>-->
            </div>
            <div class="wight-box">
                <div id="shop-by-products" class="util-carousel top-nav-box">
                    @foreach ($products as $product)
                        <div class="item">
                            <div class="pro">
                                <div class="pro-img">
                                    <img src="{{ $product->first_image_url }}" class="img-responsive"
                                        alt="{{ $product->name }}">
                                </div>
                                <div class="pro-desc">
                                    <h4>{{ $product->name }} ({{ $product->net_content_volume }})</h4>
                                    <h5>
                                        @if ($product->discount_price)
                                            <span class="del-price">
                                                <del>&#8377;&nbsp;{{ $product->price }}</del>
                                            </span>
                                            &#8377;&nbsp;{{ $product->discount_price }}
                                        @else
                                            &#8377;&nbsp;{{ $product->price }}
                                        @endif
                                    </h5>
                                    <p>{{ Str::limit(strip_tags(html_entity_decode($product->description)), 80) }}</p>
                                    <div class="button-group">
                                        <a href="{{ route('product.details', $product->slug ?? $product->id) }}"
                                            class="cart"><i class="fa fa-eye"></i>View</a>
                                        {{-- <a href="{{ route('cart.add', $product->id) }}" class="cart green">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1>Choose Wood-Pressed Oils!!!</h1>
                <p>Premium and Healthy Wood-Pressed Edible Oils needs to be a natural choice for Urban Life styles. In
                    the fast-paced life, where health and wellness are becoming top priorities, premium wood-pressed
                    edible oils are emerging as a game changer. These oils, extracted using traditional wooden mills to
                    retain the natural nutrients & flavors, offering a healthier alternative to refined oils.</p>
            </div>
        </div>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h3 class="headings">shop by <span>volume</span></h3>
            </div>
            <div class="wight-box">
                <div id="shop-by-volume" class="util-carousel top-nav-box">

                    @foreach ($products as $product)
                        <div class="item">
                            <div class="pro">
                                <div class="pro-img">
                                    {{-- Show two images if available, else fallback to default --}}
                                    @if (isset($product->images[0]))
                                        <img src="{{$product->first_image_url}}"
                                            class="img-responsive" alt="{{ $product->name }}">
                                    @endif
                                </div>
                                <div class="pro-desc">
                                    <h4>{{ $product->name }} ({{ $product->net_content_volume }})</h4>
                                    <h5>
                                        @if ($product->discount_price)
                                            <span class="del-price">
                                                <del>&#8377;&nbsp;{{ number_format($product->price) }}</del>
                                            </span>
                                            &#8377;&nbsp;{{ number_format($product->discount_price) }}
                                        @else
                                            &#8377;&nbsp;{{ number_format($product->price) }}
                                        @endif
                                    </h5>
                                    <p>{{ Str::limit(strip_tags(html_entity_decode($product->description)), 80) }}</p>
                                    <div class="button-group">
                                        <a href="{{ route('product.details', $product->slug ?? $product->id) }}"
                                            class="cart">
                                            <i class="fa fa-eye"></i>View
                                        </a>
                                        {{-- <a href="{{ route('cart.add', $product->id) }}" class="cart green">
                                            <i class="fa fa-shopping-cart"></i>Add to Cart
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@include('include/footer');
