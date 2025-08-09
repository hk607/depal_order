{{-- Set active menu --}}
<?php $products = "menu-active"; ?>
@include('include.header')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Breadcrumb --}}
<section class="breadcrum content2" style="background-image: url('{{ asset('images/category/' . $category->banner_image) }}') ?? url('../images/v1--.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h2>{{ $product->name }}</h2><br>
                <a href="{{ url('/') }}">Home</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                <a href="{{ url('/products') }}">Products</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                <a href="#">{{ $product->name }}</a>
            </div>
        </div>
    </div>
</section>

{{-- Product View --}}
<section class="pro-view">
    <div class="container">
        <div class="row">
            <div class="sticked-contaier">
                {{-- Thumbnail Gallery --}}
                <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 sticked">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            {{-- <img src="{{$product->first_image_url }}"
                                     class="img-responsive" alt="{{ $product->name }}"> --}}
                            @foreach($product->images as $img)
                                <div class="swiper-slide">
                                    <a href="{{ asset('images/products/' . $img->image) }}" data-fancybox="gallery">
                                        <img src="{{ asset('images/products/' . $img->image) }}" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Main Gallery --}}
                <div class="col-lg-5 col-md-5 col-sm-10 col-xs-9 sticked">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            {{-- <img src="{{$product->first_image_url }}"
                                     class="img-responsive" alt="{{ $product->name }}"> --}}
                                @foreach($product->images as $img)
                                <div class="swiper-slide">
                                    <a href="{{ asset('images/products/' . $img->image) }}" data-fancybox="gallery">
                                        <img src="{{ asset('images/products/' . $img->image) }}" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>

                {{-- Product Details --}}
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="product-desc-details">
                        <h3 class="pro-name">{{ $product->name }}</h3>
                        <span class="price"><small>₹</small>{{ $product->price }}</span>
                        <form method="POST" action="{{ route('cart.add',[$product->id]) }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control" style="width: 80px;">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>

                        <div class="table-responsive">
                            <table class="table">
                                <tr><th width="25%">Brand</th><td>{{ $product->brand }}</td></tr>
                                <tr><th>Diet Type</th><td>{{ $product->diet_type }}</td></tr>
                                <tr><th>Flavour</th><td>{{ $product->flavour }}</td></tr>
                                <tr><th>Net Content Volume</th><td>{{ $product->net_content_volume }}</td></tr>
                                <tr><th>Special Feature</th><td>{{ $product->special_feature }}</td></tr>
                                <tr><th>Liquid Volume</th><td>{{ $product->liquid_volume }}</td></tr>
                                <tr><th>Item Package Quantity</th><td>{{ $product->package_quantity }}</td></tr>
                                <tr><th>Shelf Life</th><td>{{ $product->shelf_life_days }} Days</td></tr>
                                <tr><th>Item Form</th><td>{{ $product->item_form }}</td></tr>
                                <tr><th>Speciality</th><td>{{ $product->speciality }}</td></tr>
                            </table>
                        </div>

                        <h5>About this item</h5>
                        <ul>
                            @foreach(explode("\n", $product->description) as $point)
								@php $cleanPoint = strip_tags(trim($point)); @endphp
								@if($cleanPoint != '')
									<li>{{ $cleanPoint }}</li>
								@endif
							@endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('include.footer')
