@extends('layouts.default')
@section('title','Sign In')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        Oops!</h1>
                    <h2>
                        404 Not Found</h2>
                    <div class="error-details">
                        Sorry, an error has occured, Requested page not found!
                    </div>
                    <div class="error-actions">
                        <a href="https://codeanddeploy.com" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            Take Me Home </a><a href="https://codeanddeploy.com" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // similar behavior as clicking on a link
        window.location.href = "https://sandhyahotels.in/";
    })
</script>
@stop