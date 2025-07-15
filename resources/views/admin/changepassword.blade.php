@extends('layouts.admin_layout')
@section('title','Change Password')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('adminDashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
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
                        <h3 class="card-title">Change Password</h3>
                     </div>
                     {{ Form::open(['route' => 'updatepassword', 'method' => 'post','id' => 'updatePassword','class'=>"form-horizontal",'enctype'=>"multipart/form-data"]) }}
                        <div class="card-body">
                           <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Current Password</label>
                                <div class="col-sm-6">
                                    {{ Form::password('current-password',['class' => 'form-control', 'placeholder' =>'Current Password', 'required' => 'required']) }}
                            
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-6">
                                    {{ Form::password('new-password',['class' => 'form-control', 'placeholder' =>'New Password', 'required' => 'required']) }}
                            
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-6">
                                    {{ Form::password('new-password_confirmation',['class' => 'form-control', 'placeholder' =>'Confirm Password', 'required' => 'required']) }}
                            
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-8">
                                    {{ Form::submit('Update', ['class' => 'btn btn-lg btn-primary']) }}
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