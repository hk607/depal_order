@include('include.header')
<title>Profile - Depal</title>

<section class="breadcrum content2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Profile</h2><br>
                <a href="{{ route('welcome') }}">home</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                <a href="#">profile</a>
            </div>
        </div>
    </div>
</section>

<section class="about">
    <div class="container">
        <h2 class="mb-4">My Profile</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="row">
                {{-- User Info --}}
                <div class="col-md-6 mb-3">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="number" name="mobile" class="form-control" value="{{ old('mobile', $user->mobile) }}">
                    @error('mobile') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Address Fields --}}
                <div class="col-md-6 mb-3">
                    <label>Address Line 1</label>
                    <input type="text" name="address_line1" class="form-control" value="{{ old('address_line1', $address->address_line1 ?? '') }}">
                    @error('address_line1') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Address Line 2</label>
                    <input type="text" name="address_line2" class="form-control" value="{{ old('address_line2', $address->address_line2 ?? '') }}">
                    @error('address_line2') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" value="{{ old('city', $address->city ?? '') }}">
                    @error('city') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label>State</label>
                    <input type="text" name="state" class="form-control" value="{{ old('state', $address->state ?? '') }}">
                    @error('state') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label>Zip Code</label>
                    <input type="text" name="zipcode" class="form-control" value="{{ old('zipcode', $address->zipcode ?? '') }}">
                    @error('zipcode') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Country</label>
                    <input type="text" name="country" class="form-control" value="{{ old('country', $address->country ?? '') }}">
                    @error('country') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
        </form>
    </div>
</section>

@include('include.footer')
