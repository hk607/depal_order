@extends('layouts.admin_layout')
@section('title', 'Order List')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('layouts.flash_message')
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Orders</h3>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Order No.</th>
                      <th>User</th>
                      <th>Total</th>
                      <th>Payment Status</th>
                      <th>Order Status</th>
                      <th>Date</th>
                      {{-- <th>Actions</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order_list as $key)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $key->order_number }}</td>
                        <td>{{ $key->user->name ?? 'Guest' }}</td>
                        <td>₹{{ number_format($key->total_amount, 2) }}</td>
                        <td>
                          <span class="badge badge-{{ $key->payment_status === 'paid' ? 'success' : 'warning' }}">
                            {{ ucfirst($key->payment_status) }}
                          </span>
                        </td>
                        <td>
                          <span class="badge badge-{{ $key->order_status === 'delivered' ? 'success' : 'info' }}">
                            {{ ucfirst($key->order_status) }}
                          </span>
                        </td>
                        <td>{{ $key->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                          {{-- <a href="{{ route('orders.show', $key->id) }}" class="btn btn-sm btn-primary">View</a> --}}
                          {{-- Optionally Edit/Delete --}}
                          {{-- <a href="{{ route('orders.edit', $key->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
