@extends('layouts.admin.layouts.admin')


@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{ $title_body }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">{{ $url }}</li>
            </ol>

            <form method="POST" action="{{ route('visi-misi') }}">
                @csrf

                @if ($errors->has('visi'))
                    <div class="alert alert-danger mb-2">
                        {{ $errors->first('visi') }}
                    </div>
                @endif
              
                

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div>
                    <label for="">
                        <h4>Visi</h4>
                    </label>
                    <textarea name="visi">
                        @if (isset($visi_misi))
                        {{ $visi_misi->visi }}
                        @endif
                    </textarea>
                </div>

                @if ($errors->has('misi'))
                <div class="alert alert-danger mb-2 mt-2">
                    {{ $errors->first('misi') }}
                </div>
                @endif

                <div class="mt-3">
                    <label for="">
                        <h4>Misi</h4>
                    </label>
                    <textarea name="misi">
                        @if (isset($visi_misi))
                        {{ $visi_misi->misi }}
                        @endif
                    </textarea>
                </div>


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
            // height: ,
        });
    </script>
@endsection
