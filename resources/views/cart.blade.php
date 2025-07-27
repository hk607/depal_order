@include('include.header')
		<title>Cart - Depal</title>

		<section class="breadcrum content2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2>About</h2><br>
						<a href="{{route('welcome')}}">home</a>
						<a href="#"><i class="fa fa-long-arrow-right"></i></a>
						<a href="#">about</a>
					</div>
				</div>
			</div>
		</section>

		<section class="about">
			<div class="container">
                <div class="container">
    <h2 class="mb-4">Your Shopping Cart</h2>

    @if(count($cartItems) > 0)
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp

                @foreach ($cartItems as $item)
                    @php
                        $product = $item->product;
                        $subtotal = $product->price * $item->quantity;
                        $grandTotal += $subtotal;
                        $image = $product->get_first_image_url ?? 'default.jpg';
                    @endphp

                    <tr>
                        <td>
                            <img src="{{ asset('images/products/' . $image) }}" width="80" height="80" alt="{{ $product->name }}">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>₹{{ number_format($product->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ number_format($subtotal, 2) }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-right">Grand Total</th>
                    <th colspan="2">₹{{ number_format($grandTotal, 2) }}</th>
                </tr>
            </tfoot>
        </table>

        <div class="text-right">
            <a href="{{ route('order.checkout') }}" class="btn btn-success">Proceed to Checkout</a>
        </div>
    @else
        <div class="alert alert-info">Your cart is empty.</div>
    @endif
</div>
			</div>

            {{-- @foreach ($cartItems as $item)
                <div>
                    {{ $item->product->name }} - {{ $item->quantity }} x {{ $item->product->price }}
                    <a href="{{ route('cart.remove', $item->id) }}">Remove</a>
                </div>
            @endforeach
            <a href="{{ route('order.checkout') }}">Proceed to Checkout</a> --}}
		</section>

@include('include.footer')
