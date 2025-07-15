<!DOCTYPE html>
<html>
<head>
    <title>{{$hotel_detail->name}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
    <script>
        $(document).ready(function() {
            $(".razorpay-payment-button").trigger("click");
        })
    </script>   
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('error') !!}
            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('success') !!}
            <div class="panel panel-default" style="margin-top: 30px;">
                <h3>Please Wait...</h3><br>
                <!--<p>if you get no response than click on <a href="{{ url()->previous() }}">Back</a></p>-->
                
                <!--<div class="panel-heading">-->
                <!--    <h2>Pay With Razorpay</h2>-->
                
                    <form action="{!!route('payment')!!}" method="POST" style="display: none;">
                        @php
                          $amount = $bookingDetail->net_amount*100;
                        @endphp
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{$razor_pay_detail['key']}}"
                                data-amount="{{$amount}}"
                                data-buttontext="Pay Amount"
                                data-name="{{$hotel_detail->name}}"
                                data-description="Room Booking Payment"
                                data-prefill.name="{{$bookingDetail->name}}"
                                data-prefill.email="{{$bookingDetail->email}}"
                                data-prefill.contact="{{$bookingDetail->mobile_number}}"
                                data-theme.color="#ff7529"
                                data-notes.shopping_order_id="{{$bookingDetail->id}}">
                        </script>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                        <input type="hiddel" name="hotel_id" value="{{$bookingDetail->hotel_id}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>