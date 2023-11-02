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



        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Data Berita
                </div>

                <a type="button" class="btn btn-primary" id="tambah_data_baru" href="{{ route('berita.create') }}">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                </a>

            </div>



            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Cover Berita</th>
                            <th>Judul Berita</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($berita as $item)


                        <tr>
                            <td>{{ $item->cover }}</td>
                            <td>{{ $item->judul  }}</td>
                            <td>

                                <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm mb-2 ubah-data" id="ubah-data">
                                    <i class="fas fa-pencil"></i> Ubah
                                </a>

                                <a href="{{ route('berita.hapus', $item->id) }}" class="btn btn-danger btn-sm mb-2"><i class="fas fa-trash"></i> Hapus</a>


                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jasa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                <form action="{{ route('jasa') }}" method="POST" id="add_jasa">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_jasa" class="form-label">Nama Jasa</label>
                        <input type="text" class="form-control" id="nama_jasa" name="nama_jasa" placeholder="Masukkan nama jasa ...." required>

                    </div>

                    <div class="mb-3">
                        <label for="detail_jasa" class="form-label">
                            Detail Jasa
                        </label>
                        <textarea name="detail_jasa" id="detail_jasa"></textarea>

                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="add_jasa">Simpan</button>
            </div>
        </div>
    </div>
</div>
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







@endsection
