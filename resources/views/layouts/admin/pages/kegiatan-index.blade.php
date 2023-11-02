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
                    Data Client
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
                            <th>Foto Kegiatan</th>
                            <th>Nama Kegiatan</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($kegiatan as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('/') }}assets/admin/assets/img/foto_kegiatan/{{ $item->foto_kegiatan }}" alt="" width="200" height="200">
                            </td>
                            <td>{{ $item->nama_kegiatan }}</td>

                            <td>

                                <a href="" class="btn btn-warning btn-sm mb-2 ubah-data" id="ubah-data" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $item->id }}"><i class="fas fa-pencil"></i> Ubah</a>

                                <a href="{{ route('kegiatan.hapus', $item->id) }}" class="btn btn-danger btn-sm mb-2"><i class="fas fa-trash"></i> Hapus</a>


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



                <form action="{{ route('kegiatan') }}" method="POST" id="add_kegiatan" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <img src="https://alppetro.co.id/dist/assets/images/default.jpg" alt="" id="preview_img" width="100%" height="500">
                    </div>


                    <div class="mb-3">
                        <label for="foto_kegiatan" class="form-label">Foto Kegiatan</label>
                        <input type="file" class="form-control" id="foto_kegiatan" name="foto_kegiatan" accept="image/jpeg, image/png, image/gif" required>

                    </div>

                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan nama kegiatan ...." required>

                    </div>




                    <div id="tambahan_update">

                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="add_kegiatan">Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('addScript')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#foto_kegiatan').on('change', function() {
            var input = this;
            var maxFileSize = 5 * 1024 * 1024; // Batas maksimum adalah 5MB (dalam byte).

            if (input.files && input.files[0]) {
                var fileSize = input.files[0].size;

                if (fileSize > maxFileSize) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ukuran gambar terlalu besar',
                        text: 'Maksimum 5MB diizinkan.',
                    });

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




<script>
    $(document).ready(function() {
        $(".ubah-data").click(function(e) {
            e.preventDefault();

            const dataId = $(this).data("id");

            // alert(dataId)

            $.ajax({
                url: "/admin/kegiatan/get_kegiatan/" + dataId, // Ganti dengan URL yang sesuai
                type: "GET",
                success: function(response) {
                    // Response adalah data JSON yang dikirim oleh server
                    if (response.kegiatan) {

                        // console.log(response.kegiatan.id)
                        $("#foto_kegiatan").removeAttr("required");
                        $("#exampleModalLabel").text("Edit Data Kegiatan");
                        $("#add_kegiatan").attr("action", "/admin/kegiatan/update/" + dataId);

                        $("#nama_kegiatan").val(response.kegiatan.nama_kegiatan);
                        // $("#id_bidang_client").val(response.client.id_bidang_client);

                        var img = "{{ asset('/') }}assets/admin/assets/img/foto_kegiatan/" +
                            response.kegiatan.foto_kegiatan;

                        $("#preview_img").attr('src', img);

                        var input_old_img =
                            `<input type="hide" name='old_foto_kegiatan' value="` +
                            response.kegiatan.foto_kegiatan + `"/>` // Menyalin elemen input
                        $("#tambahan_update").empty().append(input_old_img);


                    } else {
                        alert('Kegiatan not found');
                    }
                },
                error: function() {
                    alert('Failed to fetch client data');
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        $("#tambah_data_baru").click(function() {
            // Mengosongkan isi formulir dengan ID form_add_kegiatan
            $("#preview_img").attr('src', "https://alppetro.co.id/dist/assets/images/default.jpg");
            $("#add_kegiatan input[type=text]").val("");
            $("#tambahan_update").empty()

            $("#exampleModalLabel").text("Tambah Data Kegiatan");
            $("#add_kegiatan").attr("action", "/admin/kegiatan");
        });
    });
</script>
@endsection