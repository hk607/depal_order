@extends('layouts.admin_layout')
@section('title', 'Category List')
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
              <li class="breadcrumb-item active">Category List</li>
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
                  <h3 class="card-title">Category List</h3>
                  <a href=" {{ route('categories.create') }} " class='btn btn-info mb-2' style='margin-left:1200px'>Add New Category</a>
              </div>
              <div class="card-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Meta Key</th>
                <th>Meta Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category_list as $key)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $key->name }}</td>
                <td>{{ $key->slug }}</td>
                <td>{{ Str::limit($key->description, 50) }}</td>
                <td>{{ $key->meta_key }}</td>
                <td>{{ Str::limit($key->meta_description, 50) }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $key->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $key->id],'style'=>'display:inline']) !!}
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
