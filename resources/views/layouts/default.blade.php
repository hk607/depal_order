<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('layouts.includes.head')
</head>
<body>
    @include('layouts.includes.header')

    @yield('content')
        
    @include('layouts.includes.footer')
</body>
</html>
