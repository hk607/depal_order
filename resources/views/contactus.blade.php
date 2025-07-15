@extends('layouts.default')
@section('title','Primo Resorts | Contact')
@section('facebook_meta')
<meta name="description" content="Primo Resorts | Contact" />
<meta name="keywords" content="Primo Resorts | Contact" />
@endsection
@section('content')
<!-- Breadcrumb Section -->
<section class="breadcrum">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Contact Us</h2>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<div class="section padding-top-bottom over-hide c-map">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 text-center">
        <h4 style="font-size: 2.5em; color: #222;">Primo <span>Resorts</span></h4>
      </div>
    </div>
  </div>

  <!-- Contact Layout: Map | Form | Info -->
  <div class="container-fluid">
    <div class="row">
      
      <!-- Google Map -->
      <div class="col-md-4">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3375.191769321564!2d77.18256307564015!3d32.22600257389872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3904881985fd0559%3A0x1415a48aa3ad39fd!2sPrimo%20Resorts!5e0!3m2!1sen!2sin!4v1740028561234!5m2!1sen!2sin" 
          style="border:0; width: 100%; height: 400px;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>

      <!-- Contact Form -->
      <div class="col-md-4">
        <div class="form-contact">
          <form action="mail" method="post" enctype="multipart/form-data">
            <p class="text-justify mb-2 mt-2 text-white">Fill the form and we will contact you shortly.</p>

            <div class="form-group">
              <input name="name" type="text" placeholder="Name *" autocomplete="off" class="form-control" required>
            </div>

            <div class="form-group">
              <input name="email" type="email" placeholder="Email *" autocomplete="off" class="form-control" required>
            </div>

            <div class="form-group">
              <input 
                name="mobile" 
                type="text" 
                placeholder="Mobile *" 
                class="form-control"
                pattern="[0-9]{10}" 
                maxlength="10" 
                inputmode="numeric" 
                title="Enter a valid 10-digit mobile number" 
                required>
            </div>

            <div class="form-group">
              <textarea name="message" placeholder="Message *" rows="6" class="form-control" required></textarea>
            </div>

            <div class="text-center">
              <input type="submit" class="btn btn-primary" name="login" value="Submit Details">
            </div>
          </form>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="col-md-4">
        <div class="c-container">
          <h4 class="text-center rules sm">Contact Info</h4>

          <p><i class="fa fa-map-marker"></i>
            <span>PRIMO RESORTS, White Field, Kanyal Road, Manali Distt., Kullu, H.P., India</span>
          </p>

          <p><i class="fa fa-envelope"></i>
            <a href="mailto:sales@primoresorts.in">sales@primoresorts.in</a>
          </p>

          <p><i class="fa fa-phone"></i>
            <a href="tel:+919254039139">+91-92540-39139</a><br>
            <a href="tel:+918950067717">+91-89500-67717</a>
          </p>

          <h4 class="text-center rules sm mt-4">Driving Directions</h4>
          <p style="color: #fff;">Get Driving Directions through Google Map to reach the Best Hotel in Manali.</p>

          <div class="row">
            <div class="col-md-6">
              <h5 class="distance">1.5 Km</h5>
              <p style="color: #fff; margin: 0;">From Volvo Bus Stand, Manali</p>
            </div>
            <div class="col-md-6">
              <h5 class="distance">2 Km</h5>
              <p style="color: #fff; margin: 0;">From Manali Mall Road</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection