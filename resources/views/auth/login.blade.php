<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Depal</title>
    <link rel="icon" href="{{ asset('images/fav.ico') }}">
    <meta name="theme-color" content="#d1a751">

    <!-- CSS Links -->
    <link id="effect" rel="stylesheet" type="text/css" media="all" href="{{ asset('css/megamenu/fade-down.css') }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/megamenu/webslidemenu.css') }}" />
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('css/megamenu/white-red.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/megamenu/demo.css') }}" />
    <link href="{{ asset('css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.carousel.skins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/depal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/megamenu/custom.css') }}" rel="stylesheet">

    <style>
        body {
            background: #fffef7;
        }
        .login-box {
            max-width: 400px;
            margin: 80px auto;
            background: #ffffff;
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }
        .login-box h2 {
            margin-bottom: 25px;
            color: #d1a751;
        }
        .btn-primary {
            background-color: #d1a751;
            border-color: #d1a751;
        }
        .btn-primary:hover {
            background-color: #b08a3e;
            border-color: #b08a3e;
        }
    </style>
</head>

<body>

    {{-- Include Header --}}
    {{-- @include('partials.header') This should include the header you posted. If not, paste it directly here --}}

    <div class="container">
        <div class="login-box">
            <h2 class="text-center">Login</h2>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autofocus>

                    @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" required>

                    @error('password')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox"
                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Login</button>

                @if (Route::has('password.request'))
                    <div class="mt-3 text-center">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>

</body>

</html>
