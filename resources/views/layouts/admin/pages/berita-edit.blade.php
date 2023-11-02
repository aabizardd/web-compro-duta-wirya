@extends('layouts.admin.layouts.admin')


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

        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <img src="{{ asset('/') }}assets/admin/assets/img/cover_berita/{{ $berita->cover }}" alt="" id="preview_img" width="100%" height="500">
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover" accept="image/jpeg, image/png, image/gif">

            </div>

            <input type="hidden" name="cover_old" value="{{ $berita->cover }}">


            <div class="mb-3">
                <label for="judul_berita" class="form-label">Judul Berita</label>
                <input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Masukkan nama jasa ...." required value="{{ $berita->judul }}">

            </div>


            <div class="mb-3">
                <label for="isi" class="form-label">
                    Detail Jasa
                </label>
                <textarea name="isi" id="isi">{!!$berita->isi !!}</textarea>

            </div>

            <center>
                <button class="btn btn-primary w-50" type="submit">Submit Berita</button>
            </center>

        </form>




    </div>
</main>


@endsection


@section('addScript')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.tiny.cloud/1/9nf544vakjr5ojrlp1lawpnd13s2xks8hk05c3xnu0t67qhq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea'
        , plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount'
        , toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat'
        , height: 600,

    });

    // tinymce.activeEditor.setContent("Isi yang ingin Anda masukkan ke dalam TinyMCE");

</script>

<script>
    $(document).ready(function() {
        $('#cover').on('change', function() {
            var input = this;
            var maxFileSize = 5 * 1024 * 1024; // Batas maksimum adalah 5MB (dalam byte).

            if (input.files && input.files[0]) {
                var fileSize = input.files[0].size;

                if (fileSize > maxFileSize) {
                    Swal.fire({
                        icon: 'error'
                        , title: 'Ukuran gambar terlalu besar'
                        , text: 'Maksimum 5MB diizinkan.'
                    , });

                    // Reset input file
                    $(this).val('');
                } else {
                    var input = this;
                    var previewImg = $('#preview_img');

                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            // Mengatur atribut src dari elemen img untuk menampilkan gambar yang dipilih
                            previewImg.attr('src', e.target.result);
                        };

                        // Membaca gambar yang dipilih sebagai URL data
                        reader.readAsDataURL(input.files[0]);
                    } else {
                        // Menghapus gambar yang ada di preview jika tidak ada gambar yang dipilih
                        previewImg.attr('src', '');
                    }
                }
            }

        });
    });

</script>



































@endsection
