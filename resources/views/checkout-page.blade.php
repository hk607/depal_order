@include('include.header')
<title>Order Confirmation - Depal</title>

<section class="thankyou-section py-5">
    <div class="container">
        <div class="row">
            {{-- Left Section --}}
            <div class="col-lg-12">
                <div class="d-flex justify-normal">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z" fill="#000000"></path><path d="M10.5795 15.5801C10.3795 15.5801 10.1895 15.5001 10.0495 15.3601L7.21945 12.5301C6.92945 12.2401 6.92945 11.7601 7.21945 11.4701C7.50945 11.1801 7.98945 11.1801 8.27945 11.4701L10.5795 13.7701L15.7195 8.6301C16.0095 8.3401 16.4895 8.3401 16.7795 8.6301C17.0695 8.9201 17.0695 9.4001 16.7795 9.6901L11.1095 15.3601C10.9695 15.5001 10.7795 15.5801 10.5795 15.5801Z" fill="#000000"></path></g></svg>
                    <div>
                        <h4 style="margin-bottom: 5px;">Order #12345</h4>
                        <h2 class="text-success" style="margin-top: 0;" >Thank you, Pallavi!</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 mb-4">
                <div class="card shadow-sm p-4">
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
                    
                    <div style=" border-radius: 6px;padding: 1em 2em 2em; border: 1px solid #ddd;">
                        <h3 style="margin-bottom: 6px; margin-top: 10px; color: #3c763d;">Your order is confirmed.</h3>
                        <p>You’ll receive a confirmation email with your order number shortly.</p>
                    </div>
                    
                    {{-- Order Details --}}
                    <div style="margin: 1em 0 0; padding: 1em 2em 2em; border: 1px solid #ddd; border-radius: 6px;">
                        <h3 style="margin-top: 10px; color: #3c763d;">Order details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="no-mar">
                                    <h4>Contact information</h4>
                                    <p>pallavi@example.com</p>
                                    <h4>Shipping address</h4>
                                    <p>Pallavi Maingi
                                        123, Connaught Place
                                        New Delhi, 110001
                                        India
                                        +91 9876543210
                                    </p>
                                    <h4>Shipping method</h4>
                                    <p>Standard Shipping</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="no-mar">
                                    <h4>Payment method</h4>
                                    <p class="d-flex justify-content-start">
                                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <rect x="2" y="20" fill="#506C7F" width="60" height="8"></rect> <g> <path fill="#B4CCB9" d="M2,52c0,1.104,0.896,2,2,2h56c1.104,0,2-0.896,2-2V30H2V52z"></path> <path fill="#B4CCB9" d="M60,10H4c-1.104,0-2,0.895-2,2v6h60v-6C62,10.895,61.104,10,60,10z"></path> </g> <path fill="#394240" d="M60,8H4c-2.211,0-4,1.789-4,4v40c0,2.211,1.789,4,4,4h56c2.211,0,4-1.789,4-4V12C64,9.789,62.211,8,60,8z M62,52c0,1.104-0.896,2-2,2H4c-1.104,0-2-0.896-2-2V30h60V52z M62,28H2v-8h60V28z M62,18H2v-6c0-1.105,0.896-2,2-2h56 c1.104,0,2,0.895,2,2V18z"></path> <path fill="#394240" d="M11,40h14c0.553,0,1-0.447,1-1s-0.447-1-1-1H11c-0.553,0-1,0.447-1,1S10.447,40,11,40z"></path> <path fill="#394240" d="M29,40h6c0.553,0,1-0.447,1-1s-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1S28.447,40,29,40z"></path> <path fill="#394240" d="M11,46h10c0.553,0,1-0.447,1-1s-0.447-1-1-1H11c-0.553,0-1,0.447-1,1S10.447,46,11,46z"></path> <path fill="#394240" d="M45,46h8c0.553,0,1-0.447,1-1v-6c0-0.553-0.447-1-1-1h-8c-0.553,0-1,0.447-1,1v6C44,45.553,44.447,46,45,46 z M46,40h6v4h-6V40z"></path> <rect x="46" y="40" fill="#F9EBB2" width="6" height="4"></rect> </g> </g></svg>
                                        Credit Card - ₹5,999
                                    </p>
                                    <h4>Billing address</h4>
                                    <p>Pallavi Maingi
                                        123, Connaught Place
                                        New Delhi, 110001
                                        India
                                        +91 9876543210
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex need-help">
                        <p>Need help?<a href="">Contact us</a></p>
                        <a href="#" class="shopping">Continue shopping</a>
                    </div>
                </div>
            </div>

            {{-- Right Section --}}
            <div class="col-lg-5 chk-out-bg">
                <div class="card shadow-sm p-4 chk-out">
                    <h4 style=" font-weight: 400; margin-bottom: 30px;">Order Summary</h4>

                    {{-- Static Product --}}
                    <div class="d-flex">
                        <div class="d-flex">
                            <img src="{{ asset('https://depal.in/images/products/default.jpg') }}" alt="Excelsus Office Desk Name Plate" width="60" height="65" style="background-color: #fff; object-fit: contain; border: 1px solid #ccc; border-radius: 8px;" class="mr-3 rounded">
                            <div>
                                <h5 style="margin: 0;">Excelsus Office Desk Name Plate – Classic</h5>
                                <!--<p class="mb-1">Excelsus Office Desk Name Plate – Classic</p>-->
                                <small>Excelsus Office Desk Name Plate – Classic</small>
                                <small>Name: Pallavi Maingi</small>
                                <small>Designation: Director</small>
                                <small>Qty: 1</small>
                            </div>
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
                        <span class="big">Total</span>
                        <span class="big"><small>INR</small> ₹5,999</span>
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
