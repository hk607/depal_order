@extends('layouts.admin_layout')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Admin Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Admin Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-3">
                        <a href="#">
                            <div class="info-box bg-dark">
                                <span class="info-box-icon"><i class="nav-icon fas fa-hotel"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Products</span>
                                    <span class="info-box-number">{{ $products }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-3">
                        <a href="#">
                            <div class="info-box bg-primary">
                                <span class="info-box-icon"><i class="fa fa-star" aria-hidden="true"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Categories</span>
                                    <span class="info-box-number"> {{ $categories }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-3">
                        <a href="#">
                            <div class="info-box bg-warning">
                                <span class="info-box-icon"><i class="fa fa-cubes" aria-hidden="true"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Orders</span>
                                    {{-- <span class="info-box-number">{{ $orders }}</span> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="col-lg-3 col-3">
            <a href="#">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fa fa-bed" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Hotel Rooms</span>
                        <span class="info-box-number">{{ $hotel_rooms }}</span>
                    </div>
                </div>
            </a>
          </div> --}}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Recent Orders</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order Number</th>
                                                <th>User</th>
                                                <th>Mobile</th>
                                                <th>Amount</th>
                                                <th>Payment Method</th>
                                                <th>Payment Status</th>
                                                <th>Order Status</th>
                                                <th>Ordered At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $order->order_number }}</td>
                                                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                                                    <!-- Assuming user relation -->
                                                    <td>{{ $order->user->mobile ?? 'N/A' }}</td> <!-- Optional -->
                                                    <td>₹{{ number_format($order->total_amount, 2) }}</td>
                                                    <td>{{ ucfirst($order->payment_method) }}</td>
                                                    <td>{{ ucfirst($order->payment_status) }}</td>
                                                    <td>{{ ucfirst($order->order_status) }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-M-Y h:i A') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="{{ route('bookings.index') }}" class="btn btn-sm btn-secondary float-right">View
                                    All Orders</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
