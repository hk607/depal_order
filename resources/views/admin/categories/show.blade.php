@extends('layouts.admin_layout')
@section('title', 'View User')
@section('content')
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">View User</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-load-tab" data-toggle="pill" href="#custom-tabs-one-load" role="tab" aria-controls="custom-tabs-one-load" aria-selected="false">Devices</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Invoices</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                          <th>Name</th>
                          <td>{{ $user_detail->name }}</td>
                        </tr>
                        <tr>  
                          <th>Email</th>
                          <td>{{ $user_detail->email }}</td>
                        </tr>
                        <tr>
                          <th>Contact Number</th>
                          <td>{{ $user_detail->phone }}</td>
                        </tr>
                    </table>
                  </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-load" role="tabpanel" aria-labelledby="custom-tabs-one-load-tab">
                    <div class="card-body">
                        <table id="loads" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>#</th>  
                              <th>Device Name</th>
                              <th>IMEI Number</th>
                              <th>Sim Number</th>
                            </tr>
                          </thead>
                          <tbody> 
                          <tbody>
                            @foreach($user_detail->devices as $key)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $key->name }}</td>
                                <td>{{ $key->imei_number }}</td>
                                <td>{{ $key->sim_number }}</td>
                              </tr>
                            @endforeach  
                          </tbody>  
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>#</th>  
                                <th>Invoice Number</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Amount($)</th>
                                <th>View Invoice</th>
                                <th>Status</th>
                              </tr>
                            </thead> 
                            <tbody>
                              @foreach($user_detail->invoices as $key)
                                @php
                                   $status = $key->status == 1 ? 'Paid' : 'Unpaid';
                                @endphp
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $key->in_static_number }}</td>
                                  <td>{{ Carbon\Carbon::parse($key->from_date)->format('m-d-Y') }}</td>
                                  <td>{{ Carbon\Carbon::parse($key->to_date)->format('m-d-Y') }}</td>
                                  <td>{{ $key->total_amount }}</td>
                                  <td><a href="{{ Storage::url('ets/invoices/'.$key->invoice_pdf)}}" class="btn btn-sm btn-primary" target="_blank">View</a></td>
                                  <td>{{ $status }}</td>
                                </tr>
                              @endforeach  
                            </tbody>  
                        </table>
                    </div>
                  </div>

                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
		</div>
	  </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection