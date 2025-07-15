<!DOCTYPE html>
<html>
<head>
    <title>Room Booking Detail</title>
</head>
<body>
    <p>
        Dear {{$bookingDetail->user_name}} your Booking for {{$bookingDetail->hotelroom->roomdetails->types->name}} in {{$bookingDetail->hotels->name}} is Confirmed.
    	<br> Your Booking ID : {{$bookingDetail->booking_number}}<br>Check In Date : {{ \Carbon\Carbon::parse($bookingDetail->from_date)->format('d-M-Y')}}<br>Check Out Date : {{ \Carbon\Carbon::parse($bookingDetail->to_date)->format('d-M-Y')}}</p>
    	<p class="mt-3" style="font-family: 'Europa';">Thank you for choosing Sandhya Group of Hotels & Resorts for your Travel Requirements.
        Please print this Email as your voucher for Booking ID {{$bookingDetail->booking_number}} For Check In Date ({{date('d M, Y',strtotime($bookingDetail->from_date))}}, )
	</p>
	<h4>Guest Information</h4>
	<p>Name : {{$bookingDetail->user_name}}<br>
	   Mobile : {{ $bookingDetail->mobile_number }}<br>
	   Email : {{$bookingDetail->email}} 
	</p>
   
    <p>Thank you</p>
    <br><br>
    <h4>Regards</h4>
    <p>Sandhya Group of Hotels</p>
</body>
</html>