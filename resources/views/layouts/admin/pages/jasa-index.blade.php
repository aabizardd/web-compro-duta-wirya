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

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="tambah_data_baru">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                </button>

            </div>



            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama Jasa</th>
                            <th>Keterangan Jasa</th>
                            <!-- <th>Detail Jasa</th> -->
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($jasa as $item)


                        <tr>
                            <td>{{ $item->nama_jasa }}</td>
                            <td>{{ $item->keterangan_jasa }}</td>
                            <!-- <td>{!! $item->detail_jasa !!}</td> -->
                            <td>

                                <a href="" class="btn btn-warning btn-sm mb-2 ubah-data" id="ubah-data" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $item->id }}" data-namajasa="{{ $item->nama_jasa }}" data-detailjasa="{{ $item->detail_jasa }}"><i class="fas fa-pencil"></i> Ubah</a>

                                <a href="{{ route('jasa.hapus', $item->id) }}" class="btn btn-danger btn-sm mb-2"><i class="fas fa-trash"></i> Hapus</a>


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
                        <label for="keterangan_jasa" class="form-label">Keterangan Jasa</label>
                        <textarea class="form-control" name="keterangan_jasa" id="keterangan_jasa" required></textarea>

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
        selector: '#detail_jasa'
        , plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount'
        , toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat'
        , height: 600,

    });

    // tinymce.activeEditor.setContent("Isi yang ingin Anda masukkan ke dalam TinyMCE");

</script>


<script>
    $(document).ready(function() {

        $(".ubah-data").click(function(e) {
            // e.preventDefault();
            //   alert('hai')
            $("#exampleModalLabel").text("Edit Data Jasa");
            tinymce.activeEditor.setContent("");

            const dataId = $(this).data("id");
            $("#add_jasa").attr("action", "/admin/jasa/update/" + dataId);

            $.ajax({
                url: "/admin/jasa/get_jasa/" + dataId, // Ganti dengan URL yang sesuai
                type: "GET"
                , success: function(response) {
                    // Response adalah data JSON yang dikirim oleh server
                    if (response.jasa) {

                        // console.log(response.jasa.detail_jasa)


                        var jasa = $(this).data("namajasa");
                        $("#nama_jasa").val(response.jasa.nama_jasa);
                        $("#keterangan_jasa").val(response.jasa.keterangan_jasa);

                        var detailJasa = response.jasa.detail_jasa;

                        // Mengisi nilai atau konten dalam TinyMCE dengan data yang diterima
                        tinymce.activeEditor.setContent(detailJasa);


                    } else {
                        alert('Client not found');
                    }
                }
                , error: function() {
                    alert('Failed to fetch client data');
                }
            });





            // var detailjasa = $(this).data("detailjasa");
            // $("#detail_jasa").val(detailjasa);

            // tinymce.get("detail_jasa").setContent(detailJasa);

            // alert(detailjasa)

        });
    });

</script>

<script>
    $(document).ready(function() {
        $("#tambah_data_baru").click(function() {
            // Mengosongkan isi formulir dengan ID form_add_jasa
            $("#add_jasa input[type=text]").val("");
            $("#add_jasa textarea").val("");
            // $("#detail_jasa textarea").val("");
            tinymce.activeEditor.setContent("");
            $("#exampleModalLabel ").text("Tambah Data Jasa ");
            $("#add_jasa").attr("action", "/admin/jasa");
        });
    });

</script>













































@endsection
