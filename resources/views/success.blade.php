@include('include.header')
<title>Order Confirmation - Depal</title>

<section class="thankyou-section py-5">
    <div class="container">
        <div class="row">
            {{-- Top Section --}}
            <div class="col-lg-12">
                <div class="d-flex justify-normal align-items-center mb-4">
                    {{-- Success Icon --}}
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z" fill="#000000"></path><path d="M10.5795 15.5801C10.3795 15.5801 10.1895 15.5001 10.0495 15.3601L7.21945 12.5301C6.92945 12.2401 6.92945 11.7601 7.21945 11.4701C7.50945 11.1801 7.98945 11.1801 8.27945 11.4701L10.5795 13.7701L15.7195 8.6301C16.0095 8.3401 16.4895 8.3401 16.7795 8.6301C17.0695 8.9201 17.0695 9.4001 16.7795 9.6901L11.1095 15.3601C10.9695 15.5001 10.7795 15.5801 10.5795 15.5801Z" fill="#000000"></path></g></svg>
                    <div>
                        <h4 style="margin-bottom: 5px;">Order #{{ $bookingDetail->order_number }}</h4>
                        <h2 class="text-success" style="margin-top: 0;">Thank you, {{ $bookingDetail->name ?? $bookingDetail->user->name }}!</h2>
                    </div>
                </div>
            </div>

            {{-- Left Section --}}
            <div class="col-lg-7 mb-4">
                <div class="card shadow-sm p-4">
                    {{-- Map --}}
                    <div class="map-container mb-4">
                        <iframe
                            width="100%"
                            height="250"
                            frameborder="0"
                            style="border:0"
                            src="https://www.google.com/maps?q={{ urlencode($bookingDetail->shippingAddress->city . ' ' . $bookingDetail->shippingAddress->country) }}&output=embed"
                            allowfullscreen>
                        </iframe>
                    </div>

                    {{-- Confirmation Message --}}
                    <div style="border-radius: 6px; padding: 1em 2em 2em; border: 1px solid #ddd;">
                        <h3 style="margin-bottom: 6px; margin-top: 10px; color: #3c763d;">Your order is confirmed.</h3>
                        <p>You’ll receive a confirmation email with your order number shortly.</p>
                    </div>

                    {{-- Order Details --}}
                    <div style="margin: 1em 0 0; padding: 1em 2em 2em; border: 1px solid #ddd; border-radius: 6px;">
                        <h3 style="margin-top: 10px; color: #3c763d;">Order details</h3>
                        <div class="row">
                            {{-- Left Column --}}
                            <div class="col-md-6">
                                <div>
                                    <h4>Contact information</h4>
                                    <p>{{ $bookingDetail->email }}</p>

                                    <h4>Shipping address</h4>
                                    <p>
                                        {{ $bookingDetail->shipping_name }}<br>
                                        {{ $bookingDetail->shippingAddress->address_line1 }},
                                        {{ $bookingDetail->shippingAddress->address_line2}}<br>
                                        {{ $bookingDetail->shippingAddress->city }},
                                        {{ $bookingDetail->shippingAddress->city }} -
                                        {{ $bookingDetail->shippingAddress->state}}<br>
                                        {{ $bookingDetail->shippingAddress->country}}<br>
                                        {{ $bookingDetail->user->mobile }}
                                    </p>


                                </div>
                            </div>

                            {{-- Right Column --}}
                            <div class="col-md-6">
                                <div>
                                    <h4>Payment method</h4>
                                    <p>{{ ucfirst($bookingDetail->payment_method) }} - ₹{{ number_format($bookingDetail->total_amount, 2) }}</p>

                                    <h4>Shipping method</h4>
                                    <p>{{ $bookingDetail->shipping_method ?? 'Standard Shipping' }}</p>
                                    {{-- <h4>Billing address</h4>
                                    <p>
                                        {{ $bookingDetail->billing_name ?? $bookingDetail->shipping_name }}<br>
                                        {{ $bookingDetail->billing_address_line1 ?? $bookingDetail->shipping_address_line1 }},
                                        {{ $bookingDetail->billing_address_line2 ?? $bookingDetail->shipping_address_line2 }}<br>
                                        {{ $bookingDetail->billing_city ?? $bookingDetail->shipping_city }},
                                        {{ $bookingDetail->billing_state ?? $bookingDetail->shipping_state }} -
                                        {{ $bookingDetail->billing_zipcode ?? $bookingDetail->shipping_zipcode }}<br>
                                        {{ $bookingDetail->billing_country ?? $bookingDetail->shipping_country }}<br>
                                        {{ $bookingDetail->billing_phone ?? $bookingDetail->shipping_phone }}
                                    </p> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <p>Need help? <a href="">Contact us</a></p>
                        <a href="" class="shopping">Continue shopping</a>
                    </div>
                </div>
            </div>

            {{-- Right Section --}}
            <div class="col-lg-5 chk-out-bg">
                <div class="card shadow-sm p-4 chk-out">
                    <h4 style="font-weight: 400; margin-bottom: 30px;">Order Summary</h4>

                    {{-- Loop through items --}}
                    @foreach ($bookingDetail->items as $item)
                        <div class="d-flex mb-3">
                            <div class="d-flex">
                                <img src="{{ $item->product->first_image_url ?? asset('images/default.png') }}"
                                    alt="{{ $item->product->name }}"
                                    width="60" height="65"
                                    style="background-color:#fff; object-fit:contain; border:1px solid #ccc; border-radius:8px;"
                                    class="mr-3 rounded">
                                <div>
                                    <h5 style="margin:0;">{{ $item->product->name }}</h5>
                                    <small>Qty: {{ $item->quantity }}</small>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <p class="mb-0">₹{{ number_format($item->price, 2) }}</p>
                            </div>
                        </div>
                    @endforeach

                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span>₹{{ number_format($bookingDetail->total_amount, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>{{ $bookingDetail->shipping_charges > 0 ? '₹' . number_format($bookingDetail->shipping_charges, 2) : 'FREE' }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between font-weight-bold">
                        <span class="big">Total</span>
                        <span class="big"><small>INR</small> ₹{{ number_format($bookingDetail->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('include.footer')
