@extends('layouts.admin_layout')
@section('title', 'Order Details')

@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3>Order #{{ $order->order_number }}</h3>
          <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-sm float-right">Back</a>
        </div>
        <div class="card-body">

          <h4>Customer Info</h4>
          <p><strong>Name:</strong> {{ $order->user->name ?? 'Guest' }}</p>
          <p><strong>Email:</strong> {{ $order->user->email ?? '-' }}</p>
          <p><strong>Total Amount:</strong> ₹{{ number_format($order->total_amount, 2) }}</p>
          <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>
          <p><strong>Order Status:</strong> {{ ucfirst($order->order_status) }}</p>
          <p><strong>Placed On:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>

          <hr>
          <h4>Shipping Address</h4>
          @if($order->shippingAddress)
            <p>{{ $order->shippingAddress->name }}</p>
            <p>{{ $order->shippingAddress->address_line1 }}, {{ $order->shippingAddress->address_line2 }}</p>
            <p>{{ $order->shippingAddress->city }}, {{ $order->shippingAddress->state }} - {{ $order->shippingAddress->postal_code }}</p>
            <p>{{ $order->shippingAddress->country }}</p>
            <p><strong>Phone:</strong> {{ $order->shippingAddress->phone }}</p>
          @else
            <p>No shipping address provided</p>
          @endif

          <hr>
          {{-- <h4>Billing Address</h4>
          @if($order->billingAddress)
            <p>{{ $order->billingAddress->name }}</p>
            <p>{{ $order->billingAddress->address_line1 }}, {{ $order->billingAddress->address_line2 }}</p>
            <p>{{ $order->billingAddress->city }}, {{ $order->billingAddress->state }} - {{ $order->billingAddress->postal_code }}</p>
            <p>{{ $order->billingAddress->country }}</p>
            <p><strong>Phone:</strong> {{ $order->billingAddress->phone }}</p>
          @else
            <p>No billing address provided</p>
          @endif --}}

          <hr>
          <h4>Order Items</h4>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order->items as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->product->name ?? 'N/A' }}</td>
                  <td>{{ $item->quantity }}</td>
                  <td>₹{{ number_format($item->price, 2) }}</td>
                  <td>₹{{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </section>
</div>
@endsection
