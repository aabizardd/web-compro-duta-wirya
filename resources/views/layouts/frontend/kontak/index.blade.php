@extends('layouts.frontend.layout')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <div class="breatcome_area d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breatcome_title">
                        <div class="breatcome_title_inner pb-2">
                            <h2>Kontak Kami</h2>
                        </div>
                        <div class="breatcome_content">
                            <ul>
                                <li><a href="/">Home</a> <i class="fa fa-angle-right"></i> <a
                                        href="{{ url('kontak') }}">
                                        Kontak Kami</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_contact_area style_three pt-80 pb-90">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title text_left mb-50 mt-3">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>Kontak Info</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>Keep In Touch</h1>
                        </div>
                        <div class="section_title_text pt-2">
                            <p>Anda juga dapat mengirimkan email kepada kami, dengan mengisi formulir di samping ini
                            </p>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                    <div class="contact_address">
                        <div class="contact_address_company mb-3">
                            <ul>
                                <li><i class="fa fa-envelope-o"></i><span><a href="#">duta_wirya@yahoo.com</a></span>
                                </li>
                                <li><i class="fa fa-whatsapp"></i>
                                    <span>
                                        <a href="https://api.whatsapp.com/send?phone=62811875715" target="_blank">
                                            0811875715</a>

                                    </span>
                                </li>
                                <li><i class="fa fa-map-marker"></i> <span> Jl. Ki Mangun
                                        Sarkoro No. 55. Surakarta 57135</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact_from">



                        <div class="contact_from_box">

                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                    {{ Session::get('success') }}
                                    <button type="button" class="btn btn-sm" data-dismiss="alert" aria-label="Close">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </div>
                            @endif



                            <div class="contact_title pb-4">
                                <h3>Kirim Pesan </h3>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form_box mb-30">
                                        <input type="text" name="nama_pengirim" placeholder="Nama" id="nama_pengirim">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form_box mb-30">
                                        <input type="number" name="no_telepon" placeholder="Nomor Telepon" id="no_telepon">
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form_box mb-30">
                                        <input type="email" name="from_mail" placeholder="Alamat Email" id="from_mail">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_box mb-30">
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Tulis Pesan"></textarea>
                                    </div>
                                    <div class="quote_btn">
                                        <button class="btn" id="kirimPesanBtn" type="submit">Kirim Pesan</button>
                                    </div>
                                </div>
                            </div>

                            <div class="status"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="google_map_area">
        <div class="row-fluid">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="google_map_area">
                    <iframe class="map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0008792249173!2d106.8491768749907!3d-6.263612793725021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f24e6ad042f5%3A0x6ca614dd38944ef3!2sPT%20Duta%20Wirya!5e0!3m2!1sid!2sid!4v1699095441273!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
        $(document).ready(function() {
            $('#kirimPesanBtn').click(function() {
                var nama = $('#nama_pengirim').val();
                var telepon = $('#no_telepon').val();
                var email = $('#from_mail').val();
                var pesan = $('#message').val();

                // Format pesan untuk dikirim ke WhatsApp
                var waMessage = "Nama: " + nama + "\n" +
                    "Nomor Telepon: " + telepon + "\n" +
                    "Email: " + email + "\n" +
                    "Pesan: " + pesan;

                // Buka tautan WhatsApp dalam tab atau jendela baru
                window.open("https://wa.me/62811875715?text=" + encodeURIComponent(waMessage), "_blank");
            });
        });
    </script>

    @include('layouts.frontend.jasa.jasa-carousel')
@endsection
