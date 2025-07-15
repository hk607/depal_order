{{-- resources/views/admin/products/create.blade.php --}}
@extends('layouts.admin_layout')
@section('title','Add Product')
@section('content')

<section class="content">
    <div class="container-fluid">
        @include('layouts.flash_message')

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Product</h3>
                    </div>

                    {{ Form::open(['route' => 'products.store', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) }}
                    <div class="card-body">
                        @include('admin.products.form')

                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
