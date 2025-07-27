<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   {{-- @include('include.head') --}}
</head>
<body>
    @include('include.header')

    @yield('content')

    @include('include.footer')
</body>
</html>
