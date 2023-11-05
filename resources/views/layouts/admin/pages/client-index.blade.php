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
                            <th>Logo Klien</th>
                            <th>Nama Klien</th>
                            <th>Bidang Klien</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($client as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('/') }}assets/admin/assets/img/logo_client/{{ $item->logo_client }}" alt="" width="200" height="200">
                            </td>
                            <td>{{ $item->pemberi_tugas }}</td>
                            <td>{{ $item->nama_bidang }}</td>

                            <td>

                                <a href="" class="btn btn-warning btn-sm mb-2 ubah-data" id="ubah-data" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $item->id }}"><i class="fas fa-pencil"></i> Ubah</a>

                                <a href="{{ route('client.hapus', $item->id) }}" class="btn btn-danger btn-sm mb-2"><i class="fas fa-trash"></i> Hapus</a>


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



                <form action="{{ route('client') }}" method="POST" id="add_client" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <img src="https://alppetro.co.id/dist/assets/images/default.jpg" alt="" id="preview_img" width="100%" height="500">
                    </div>


                    <div class="mb-3">
                        <label for="logo_client" class="form-label">Logo Klien</label>
                        <input type="file" class="form-control" id="logo_client" name="logo_client" accept="image/jpeg, image/png, image/gif" required>

                    </div>

                    <div class="mb-3">
                        <label for="pemberi_tugas" class="form-label">Pemberi Tugas</label>
                        <input type="text" class="form-control" id="pemberi_tugas" name="pemberi_tugas" placeholder="Masukkan pemberi tugas ...." required>

                    </div>


                    <div class="mb-3">
                        <label for="id_bidang_client" class="form-label">Bidang Client</label>

                        <select class="form-control" id="id_bidang_client" name="id_bidang_client" required>

                            <option value="" selected disabled>--- Pilih Bidang Klien ---</option>
                            @foreach ($bidang_client as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_bidang }}</option>
                            @endforeach

                        </select>



                    </div>

                    <div id="tambahan_update">

                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="add_client">Simpan</button>
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
        $('#logo_client').on('change', function() {
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

            $.ajax({
                url: "/admin/client/get_client_by_id/" + dataId, // Ganti dengan URL yang sesuai
                type: "GET",
                success: function(response) {
                    // Response adalah data JSON yang dikirim oleh server
                    if (response.client) {

                        // console.log(response.client[0].id)
                        $("#logo_client").removeAttr("required");
                        $("#exampleModalLabel").text("Edit Data Bidang Client");
                        $("#add_client").attr("action", "/admin/client/update/" + dataId);

                        $("#pemberi_tugas").val(response.client[0].pemberi_tugas);
                        $("#id_bidang_client").val(response.client[0].id_bidang_client);

                        var img = "{{ asset('/') }}assets/admin/assets/img/logo_client/" +
                            response.client[0].logo_client;

                        $("#preview_img").attr('src', img);

                        var input_old_img =
                            `<input type="hidden" name='old_logo_client' value="` +
                            response.client[0].logo_client + `"/>` // Menyalin elemen input
                        $("#tambahan_update").empty().append(input_old_img);


                    } else {
                        alert('Client not found');
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
            // Mengosongkan isi formulir dengan ID form_add_client
            $("#preview_img").attr('src', "https://alppetro.co.id/dist/assets/images/default.jpg");
            $("#add_client input[type=text]").val("");
            $("#add_client select").val("");
            $("#add_client textarea").val("");

            $("#tambahan_update").empty()

            $("#exampleModalLabel").text("Tambah Data Client");
            $("#add_client").attr("action", "/admin/client");
        });
    });
</script>

@endsection