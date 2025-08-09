@include('include.header')
<title>Checkout - Depal</title>

<section class="breadcrum content2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Checkout</h2><br>
                <a href="{{ route('welcome') }}">Home</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                <a href="#">Checkout</a>
            </div>
        </div>
    </div>
</section>

<section class="about">
    <div class="container">
        <div class="container">
            <h2 class="mb-4">Order Summary</h2>

            @if(count($cartItems) > 0)
                <form action="{{ route('order.place') }}" method="POST">
                    @csrf

                    @if($shippingAddress)
                        <div class="card mb-4 p-3">
                            <h4>Shipping Address</h4>
                            <p><strong>{{ $shippingAddress->name }}</strong></p>
                            <p>{{ $shippingAddress->address_line1 }}, {{ $shippingAddress->address_line2 }}</p>
                            <p>{{ $shippingAddress->city }}, {{ $shippingAddress->state }} - {{ $shippingAddress->zipcode }}</p>
                            <p>{{ $shippingAddress->country }}</p>
                            <p><i class="fa fa-phone"></i> {{ $shippingAddress->phone }}</p>
                            <p><i class="fa fa-envelope"></i> {{ $shippingAddress->email }}</p>
                        </div>

                        <input type="hidden" name="shipping_address" value="{{ $shippingAddress->id }}">

                    @else
                        <div class="alert alert-warning">No shipping address found. Please update your profile.</div>
                    @endif

                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $grandTotal = 0; $index = 0; @endphp
                            @foreach ($cartItems as $item)
                                @php
                                    $product = $item->product;
                                    $subtotal = $product->price * $item->quantity;
                                    $grandTotal += $subtotal;
                                    $image = $product->first_image_url ?? 'default.jpg';
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/products/' . $image) }}" width="80" height="80" alt="{{ $product->name }}">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>₹{{ number_format($product->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>₹{{ number_format($subtotal, 2) }}</td>
                                </tr>

                                {{-- Hidden fields for each cart item --}}
                                <input type="hidden" name="items[{{ $index }}][product_id]" value="{{ $product->id }}">
                                <input type="hidden" name="items[{{ $index }}][name]" value="{{ $product->name }}">
                                <input type="hidden" name="items[{{ $index }}][price]" value="{{ $product->price }}">
                                <input type="hidden" name="items[{{ $index }}][quantity]" value="{{ $item->quantity }}">
                                <input type="hidden" name="items[{{ $index }}][subtotal]" value="{{ $subtotal }}">
                                @php $index++; @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-right">Grand Total</th>
                                <th>₹{{ number_format($grandTotal, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>

                    {{-- Hidden grand total --}}
                    <input type="hidden" name="grand_total" value="{{ $grandTotal }}">

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                </form>

            @else
                <div class="alert alert-info">Your cart is empty.</div>
            @endif
        </div>
    </div>
</section>

@include('include.footer')
