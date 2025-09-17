@include('include.header')
<title>Order Confirmation - Depal</title>

<section class="thankyou-section py-5">
    <div class="container">
        <div class="row">
            {{-- Left Section --}}
            <div class="col-lg-7 mb-4">
                <div class="card shadow-sm p-4">
                    <h4 class="mb-3">Order #12345</h4>
                    <h2 class="text-success">Thank you, Pallavi!</h2>
                    <p class="text-muted">Your order is confirmed. You’ll receive a confirmation email with your order number shortly.</p>

                    {{-- Map --}}
                    <div class="map-container mb-4">
                        <iframe
                            width="100%"
                            height="250"
                            frameborder="0"
                            style="border:0"
                            src="https://www.google.com/maps?q=New+Delhi+India&output=embed"
                            allowfullscreen>
                        </iframe>
                    </div>

                    {{-- Order Details --}}
                    <h5 class="mb-3">Order details</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Contact information</strong><br>pallavi@example.com</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Payment method</strong><br>Credit Card - ₹5,999</p>
                            <p><strong>Billing address</strong><br>
                                Pallavi Maingi<br>
                                123, Connaught Place<br>
                                New Delhi, 110001<br>
                                India<br>
                                +91 9876543210
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Section --}}
            <div class="col-lg-5">
                <div class="card shadow-sm p-4">
                    <h5 class="mb-3">Order Summary</h5>

                    {{-- Static Product --}}
                    <div class="d-flex mb-3">
                        <img src="{{ asset('images/sample-product.jpg') }}" alt="Excelsus Office Desk Name Plate" width="70" height="70" class="mr-3 rounded">
                        <div>
                            <p class="mb-1">Excelsus Office Desk Name Plate – Classic</p>
                            <small>Name: Pallavi Maingi</small><br>
                            <small>Designation: Director</small><br>
                            <small>Qty: 1</small>
                        </div>
                        <div class="ml-auto">
                            <p class="mb-0">₹5,999</p>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span>₹5,999</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>FREE</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between font-weight-bold">
                        <span>Total</span>
                        <span>INR ₹5,999</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            {{-- <a href="{{ route('shop.index') }}" class="btn btn-dark">Continue Shopping</a> --}}
        </div>
    </div>
</section>

@include('include.footer')
