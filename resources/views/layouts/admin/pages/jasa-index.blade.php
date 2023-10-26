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
                    Data Jasa
                </div>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    id="tambah_data_baru">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                </button>

            </div>



            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Jasa</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($jasa as $item)


                        <tr>
                            <td>{{ $item->nama_jasa }}</td>

                            <td>

                                <a href="" class="btn btn-warning btn-sm mb-2 ubah-data" id="ubah-data"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $item->id }}"
                                    data-namajasa="{{ $item->nama_jasa }}"><i class="fas fa-pencil"></i> Ubah</a>

                                <a href="{{ route('jasa.hapus', $item->id) }}" class="btn btn-danger btn-sm mb-2"><i
                                        class="fas fa-trash"></i> Hapus</a>


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
    <div class="modal-dialog">
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
                        <input type="text" class="form-control" id="nama_jasa" name="nama_jasa"
                            placeholder="Masukkan nama jasa ...." required>

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


<script>
$(document).ready(function() {

    $(".ubah-data").click(function(e) {
        // e.preventDefault();
        //   alert('hai')
        $("#exampleModalLabel").text("Edit Data Jasa");


        const dataId = $(this).data("id");
        $("#add_jasa").attr("action", "/admin/jasa/update/" + dataId);

        var jasa = $(this).data("namajasa");
        $("#nama_jasa").val(jasa);

        // alert(alamat)

    });
});
</script>

<script>
$(document).ready(function() {
    $("#tambah_data_baru").click(function() {
        // Mengosongkan isi formulir dengan ID form_add_jasa
        $("#add_jasa input[type=text]").val("");
        $("#add_jasa textarea").val("");

        $("#exampleModalLabel").text("Tambah Data Jasa");
        $("#add_jasa").attr("action", "/admin/jasa");
    });
});
</script>
@endsection