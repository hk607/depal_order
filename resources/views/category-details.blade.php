{{-- Set active menu --}}
<?php $products = "menu-active"; ?>
@include('include.header')

{{-- Breadcrumb --}}
<section class="breadcrum content2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $category->name }}</h2><br>
                <a href="{{ url('/') }}">Home</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                <a href="{{ url('/categories') }}">Categories</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                <a href="#">{{ $category->name }}</a>
            </div>
        </div>
    </div>
</section>

{{-- Products List --}}
<section class="pro-view">
    <div class="container">
        <div class="row">
            @forelse ($product_lists as $product)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="item">
                        <div class="pro">
                            <div class="">
                                {{-- Show image if available --}}
                                @php
                                        $imageUrl = !empty($product->first_image_url) ? $product->first_image_url : asset('images/default.png');
                                @endphp
                                    <a href="{{ route('product.details', $product->slug ?? $product->id) }}" class="cart">
                                        <img src="{{$imageUrl}}" class="img-responsive"
                                            alt="{{ $product->name }}">
                                    </a>
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
                                    <a href="{{ route('product.details', $product->slug ?? $product->id) }}" class="cart">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <form action="{{ route('cart.add', [$product->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="cart green">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>No products found in this category.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="text-center mt-4">
            {{ $product_lists->links() }}
        </div>
    </div>
</section>

@include('include.footer')
