@extends('layouts.admin.layouts.admin')

@section('addStyle')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

@endsection


@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $title_body }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{ $url }}</li>
        </ol>

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ route('update') }}" method="POST">
            @csrf


            <div class="mb-3">
                <label for="nama_admin" class="form-label">Nama Admin</label>
                <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="{{ $admin->name }}" disabled readonly>

            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" disabled readonly>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
            </div>

            <center>
                <button class="btn btn-primary w-50" type="submit">Update Akun</button>

            </center>


        </form>


    </div>
</main>

@endsection


@section('addScript')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).ready(function() {
        // When the form is submitted
        $("form").submit(function(event) {
            event.preventDefault();

            var password = $("#password").val();
            var confirmPassword = $("#confirm-password").val();

            // Check if the passwords match
            if (password !== confirmPassword) {
                // Show a SweetAlert error message for password mismatch
                Swal.fire({
                    icon: 'error'
                    , title: 'Passwords do not match!'
                    , text: 'Please make sure the passwords match.'
                , });
            } else if (password.length < 6) {
                // Show a SweetAlert error message for password length less than 6 characters
                Swal.fire({
                    icon: 'error'
                    , title: 'Password is too short!'
                    , text: 'Password must be at least 6 characters long.'
                , });
            } else {
                // If passwords match and password length is acceptable, you can submit the form
                $(this).unbind('submit').submit();
            }
        });
    });

</script>




@endsection
