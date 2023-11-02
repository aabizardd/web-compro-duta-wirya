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

            </div>



            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Isi</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contact_us as $item)


                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_telepon }}</td>
                            <td>{{ $item->isi }}</td>
                            <td>

                                <a href="{{ route('contact-us.hapus', $item->id) }}" class="btn btn-danger btn-sm mb-2"><i class="fas fa-trash"></i> Hapus</a>


                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

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





































@endsection
