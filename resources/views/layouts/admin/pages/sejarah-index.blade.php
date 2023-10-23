@extends('layouts.admin.layouts.admin')


@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title_body }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{ $url }}</li>
            </ol>

            <form method="POST" action="{{ route('sejarah') }}">
                @csrf

                @if ($errors->has('sejarah'))
                    <div class="alert alert-danger mb-2">
                        {{ $errors->first('sejarah') }}
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <textarea name="sejarah">
                    @if (isset($sejarah_data))
                        {{ $sejarah_data->sejarah }}
                    @endif
                </textarea>



                <center>
                    <button class="btn btn-primary mt-2 w-50">Edit</button>
                </center>


            </form>



        </div>
    </main>
@endsection


@section('addScript')
    <script src="https://cdn.tiny.cloud/1/9nf544vakjr5ojrlp1lawpnd13s2xks8hk05c3xnu0t67qhq/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            height: 700,
        });
    </script>
@endsection
