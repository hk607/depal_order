{{-- resources/views/admin/products/edit.blade.php --}}
@extends('layouts.admin_layout')
@section('title','Edit Product')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product</h3>
                        </div>

                        {{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'files' => true,]) }}
                        <div class="card-body">
                            @include('admin.products.form')

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
