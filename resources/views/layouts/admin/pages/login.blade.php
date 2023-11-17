@extends('layouts.admin.layouts.auth')

@section('content')
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header">
        <center>
            <img src="{{ asset('assets/admin/assets/img/logo dwpc bulat.png') }}" alt="" width="100">
        </center>
        <h3 class="text-center font-weight-light my-4">
            Login Admin Compro
        </h3>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required />
                <label for="email">Email address</label>


                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-floating mb-3">
                <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password" name="password" required />
                <label for="password">Password</label>


                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <a class="small" href="password.html">Forgot Password?</a>
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </form>
    </div>

</div>
@endsection
