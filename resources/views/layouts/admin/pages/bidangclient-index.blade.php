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
                        Data Bidang Client
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
                                <th>Nama Bidang</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bidang as $item)
                                <tr>
                                    <td>{{ $item->nama_bidang }}</td>

                                    <td>

                                        <a href="" class="btn btn-warning btn-sm mb-2 ubah-data" id="ubah-data"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-id="{{ $item->id }}" data-namabidang="{{ $item->nama_bidang }}"><i
                                                class="fas fa-pencil"></i> Ubah</a>

                                        <a href="{{ route('bidang-client.hapus', $item->id) }}"
                                            class="btn btn-danger btn-sm mb-2"><i class="fas fa-trash"></i> Hapus</a>


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



                    <form action="{{ route('bidang-client') }}" method="POST" id="add_bidang">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_bidang" class="form-label">Nama Bidang</label>
                            <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                placeholder="Masukkan nama bidang ...." required>

                        </div>


                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" form="add_bidang">Simpan</button>
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
                $("#exampleModalLabel").text("Edit Data Bidang Client");


                const dataId = $(this).data("id");
                $("#add_bidang").attr("action", "/admin/bidang-client/update/" + dataId);

                var bidang = $(this).data("namabidang");
                $("#nama_bidang").val(bidang);

                // alert(alamat)

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#tambah_data_baru").click(function() {
                // Mengosongkan isi formulir dengan ID form_add_bidang
                $("#add_bidang input[type=text]").val("");
                $("#add_bidang textarea").val("");

                $("#exampleModalLabel").text("Tambah Data Bidang Client");
                $("#add_bidang").attr("action", "/admin/bidang-client");
            });
        });
    </script>
@endsection
