@extends('layouts.admin_layout')
@section('title', 'Product List')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Product List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        @include('layouts.flash_message')
        <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Product List</h3>
                  <a href=" {{ route('products.create') }} " class='btn btn-info mb-2' style='margin-left:1000px'>Add New Product</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price (₹)</th>
            <th>Brand</th>
            <th>Flavour</th>
            <th>Volume (ml)</th>
            <th>Special Feature</th>
            <th>Package Qty</th>
            <th>Shelf Life</th>
            <th>Item Form</th>
            {{-- <th>Status</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product_list as $key)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $key->name }}</td>
            <td>{{ optional($key->category)->name }}</td>
            <td>{{ $key->price }}</td>
            <td>{{ $key->brand }}</td>
            <td>{{ $key->flavour }}</td>
            <td>{{ $key->net_content_volume ?? $key->liquid_volume }} ml</td>
            <td>{{ $key->special_feature }}</td>
            <td>{{ $key->package_quantity }}</td>
            <td>{{ $key->shelf_life_days }} Days</td>
            <td>{{ $key->item_form }}</td>
            {{-- <td>
                @if($key->status == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-secondary">Inactive</span>
                @endif
            </td> --}}
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $key->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $key->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
    </div>
    </section>
</div>
@endsection
