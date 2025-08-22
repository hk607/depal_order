@include('include.header')

<title>Contact Us - Depal</title>

<section class="breadcrum content2 cnt-pg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contact Us</h2>
                <a href="{{ route('welcome') }}">Home</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                <a href="#">Contact</a>
            </div>
        </div>
    </div>
</section>

<section class="contact-section py-5">
    <div class="container">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-lg-8">
                <h3 class="mb-3">We're here to help!</h3>
                <p>Whether you have a question about our products, need support with an order,
                   or simply want to share your feedback—we’d love to hear from you.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Support Hours -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow h-100 text-center p-4">
                    <i class="fa fa-clock fa-2x text-success mb-3"></i>
                    <h5>Customer Support Hours</h5>
                    <p>Sunday to Friday<br>10:00 AM – 6:00 PM (IST)</p>
                    <small class="text-danger">Closed on Saturdays & Public Holidays</small>
                </div>
            </div>

            <!-- Email -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow h-100 text-center p-4">
                    <i class="fa fa-envelope fa-2x text-primary mb-3"></i>
                    <h5>Email</h5>
                    <p>
                        <a href="mailto:keshavvproducts@gmail.com">keshavvproducts@gmail.com</a>
                    </p>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow h-100 text-center p-4">
                    <i class="fa fa-phone fa-2x text-warning mb-3"></i>
                    <h5>Phone / WhatsApp</h5>
                    <p>
                        <a href="tel:+919053155866">+91 90531 55866</a><br>
                        <small>(Available during support hours)</small>
                    </p>
                </div>
            </div>

            <!-- Address -->
            <div class="col-lg-6 col-md-12">
                <div class="card shadow h-100 text-center p-4">
                    <i class="fa fa-map-marker fa-2x text-danger mb-3"></i>
                    <h5>Mailing Address</h5>
                    <p>
                        DePal (A brand of Keshavv Products)<br>
                        0, Tehsil Mustafabad,<br>
                        Thana Chhappar Chowk, Mustafabad,<br>
                        Yamunanagar, Haryana – 133103<br>
                        <strong>GSTIN:</strong> 06CMFPM1632M1ZY
                    </p>
                </div>
            </div>

            <!-- Social -->
            <div class="col-lg-6 col-md-12">
                <div class="card shadow h-100 text-center p-4">
                    <i class="fa fa-share-alt fa-2x text-info mb-3"></i>
                    <h5>Follow Us</h5>
                    <p>
                        📸 <a href="https://instagram.com/depal_yourhealthpartner" target="_blank">
                            Instagram @depal_yourhealthpartner
                        </a><br>
                        📘 <a href="https://facebook.com/DePal" target="_blank">Facebook - DePal</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('include.footer')
