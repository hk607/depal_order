<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | Depal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    .card-header {
      background-color: #b08a3e;
      color: #fff;
      text-align: center;
      border-radius: 10px 10px 0 0;
    }

    .btn-black {
      background-color: #b08a3e;
      color: #fff;
      border: none;
    }

    .btn-black:hover {
      background-color: #b08a3e;
    }

    .form-control:focus {
      border-color: #000;
      box-shadow: none;
    }

    .form-label {
      font-weight: 500;
      color: #000;
    }

    .form-error {
      color: #dc3545;
      font-size: 0.875rem;
    }

    .link-muted {
      color: #6c757d;
    }

    .link-muted:hover {
      color: #b08a3e;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg">
          <div class="card-header">
            <h4 class="my-2">Register</h4>
          </div>

          <div class="card-body px-4 py-5">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="name" class="form-label">Full Name *</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required>
                @error('name')
                  <div class="form-error">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email Address *</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required>
                @error('email')
                  <div class="form-error">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number *</label>
                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror"
                       name="mobile" value="{{ old('mobile') }}" required>
                @error('mobile')
                  <div class="form-error">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4">
                <label for="password" class="form-label">Password *</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                  <div class="form-error">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-black">Register</button>
              </div>

              <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="link-muted">Already have an account? Login</a>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

</body>
</html>
