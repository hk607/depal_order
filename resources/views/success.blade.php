@include('include.header')

<title>Order Success - Depal</title>

<section class="breadcrum content2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Order Success</h2><br>
                <a href="{{ route('welcome') }}">Home</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                <a href="#">Order Success</a>
            </div>
        </div>
    </div>
</section>

<section class="about">
    <div class="container text-center">
        <h2 class="text-success mb-4">Thank you! Your order has been placed successfully. 🎉</h2>
        <p>You will receive a confirmation email shortly.</p>
        <a href="{{ route('welcome') }}" class="btn btn-primary mt-3">Back to Home</a>
    </div>
</section>

@include('include.footer')
