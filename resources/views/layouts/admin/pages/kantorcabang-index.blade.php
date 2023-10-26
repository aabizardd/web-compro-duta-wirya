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
                    Data Kantor Cabang
                </div>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="tambah_data_baru">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                </button>

            </div>



            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama Kantor</th>
                            <th>Nama Pimpinan</th>
                            <th>Alamat Kantor</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cabang as $item)


                        <tr>
                            <td>{{ $item->nama_kantor }}</td>
                            <td>{{ $item->pemimpin_cabang }}</td>
                            <td>{{ $item->alamat_cabang }}</td>
                            <td>

                                <a href="" class="btn btn-warning btn-sm mb-2 ubah-data" id="ubah-data" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $item->id }}" data-namakantor="{{ $item->nama_kantor }}" data-pimpinan="{{ $item->pemimpin_cabang }}" data-alamat="{{$item->alamat_cabang}}"><i class="fas fa-pencil"></i> Ubah</a>

                                <a href="{{ route('kantor-cabang.hapus', $item->id) }}" class="btn btn-danger btn-sm mb-2"><i class="fas fa-trash"></i> Hapus</a>


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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kantor Cabang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                <form action="{{ route('kantor-cabang') }}" method="POST" id="add_cabang">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_kantor" class="form-label">Nama Kantor</label>
                        <input type="text" class="form-control" id="nama_kantor" name="nama_kantor" placeholder="Masukkan nama kantor ...." required>

                        <label for="pemimpin_cabang" class="form-label">Pemimpin Cabang</label>
                        <input type="text" class="form-control" id="pemimpin_cabang" name="pemimpin_cabang" placeholder="Masukkan nama pemimpin cabang ...." required>

                        <label for="alamat_cabang" class="form-label">Alamat Cabang</label>
                        <textarea name="alamat_cabang" id="alamat_cabang" cols="30" rows="10" class="form-control" placeholder="Masukkan alamat cabang ...."></textarea>



                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="add_cabang">Simpan</button>
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
            $("#exampleModalLabel").text("Edit Kantor Cabang");


            const dataId = $(this).data("id");
            $("#add_cabang").attr("action", "/admin/kantor-cabang/update/" + dataId);

            var kantor = $(this).data("namakantor");
            $("#nama_kantor").val(kantor);
            var pimpinan = $(this).data("pimpinan");
            $("#pemimpin_cabang").val(pimpinan);
            var alamat = $(this).data("alamat");
            $("#alamat_cabang").val(alamat);

            // alert(alamat)

        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#tambah_data_baru").click(function() {
            // Mengosongkan isi formulir dengan ID form_add_cabang
            $("#add_cabang input[type=text]").val("");
            $("#add_cabang textarea").val("");

            $("#exampleModalLabel").text("Tambah Kantor Cabang");
            $("#add_cabang").attr("action", "/admin/kantor-cabang");
        });
    });
</script>
@endsection