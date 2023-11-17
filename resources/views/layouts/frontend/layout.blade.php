<!DOCTYPE html>
<html lang="en-US">
<!-- Mirrored from html.ditsolution.net/techno/index-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Oct 2023 07:31:07 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PT Duta Wirya</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56"
        href="{{ asset('/') }}assets/admin/assets/img/logo dwpc bulat.png" />
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/bootstrap.min.css" type="text/css" media="all" />
    <!-- carousel CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/owl.carousel.min.css" type="text/css"
        media="all" />
    <!-- nivo-slider CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/nivo-slider.css" type="text/css" media="all" />
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/animate.css" type="text/css" media="all" />
    <!-- animated-text CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/animated-text.css" type="text/css" media="all" />
    <!-- font-awesome CSS -->
    <link type="text/css" rel="stylesheet"
        href="{{ asset('/') }}assets/fe/assets/fonts/font-awesome/css/font-awesome.min.css" />
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/flaticon.css" type="text/css" media="all" />
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/theme-default.css" type="text/css" media="all" />
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/meanmenu.min.css" type="text/css" media="all" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/style.css" type="text/css" media="all" />
    <!-- transitions CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/owl.transitions.css" type="text/css"
        media="all" />
    <!-- venobox CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/venobox/venobox.css" type="text/css" media="all" />
    <!-- widget CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/widget.css" type="text/css" media="all" />
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/responsive.css" type="text/css" media="all" />
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/vendor/modernizr-3.5.0.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->

</head>

<body>


    @include('layouts.frontend.header')

    <!-- Techno Mobile Menu Area -->
    @include('layouts.frontend.header-mobile')


    @yield('content')
    <?php

    use App\Models\Jasa;
    use App\Models\Sejarah;

    $jasa = Jasa::all();
    $sejarah = Sejarah::first();

    ?>

    <div class="footer-middle pt-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="widget widgets-company-info">
                        <div class="footer-bottom-logo pb-40">
                            <img src="{{ asset('/') }}assets/admin/assets/img/logo dwpc bulat.png" alt="" width="100" />
                        </div>
                        <div class="company-info-desc">
                            <p style="text-align: justify;">
                                {!! substr(strip_tags($sejarah->sejarah), 0, 160) !!}
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="widget widget-nav-menu">
                        <h4 class="widget-title pb-4">Jasa Kami</h4>
                        <div class="menu-quick-link-container ml-4">
                            <ul id="menu-quick-link" class="menu">
                                @foreach ($jasa as $key => $item)
                                @if ($key < 5) <li><a
                                        href="{{ url('jasa') ."?jasa=". $item->id }}">{{ $item->nama_jasa }}</a></li>
                                    @else
                                    @break
                                    @endif
                                    @endforeach

                                    <li><a href="{{ url('jasa') }}">Selengkapnya <i
                                                class="fa fa-long-arrow-right"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="widget widgets-company-info">
                        <h3 class="widget-title pb-4">Alamat Perusahaan</h3>

                        <div class="footer-social-info">
                            <p><i class="fa fa-street-view"></i> <span>Address :</span>“Wisma Penilai” lantai 4-5, Jl.
                                Ki Mangunsarkoro No. 55, Nusukan, kota Surakarta, 57135</p>
                        </div>
                        <div class="footer-social-info">
                            <p><i class="fa fa-phone"></i> <span>Phone :</span> (0271) 717910.</p>
                        </div>
                        <div class="footer-social-info">
                            <p><i class="fa fa-envelope"></i> <span>Email :</span>duta_wirya@yahoo.com</p>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="row footer-bottom mt-70 pt-3 pb-1">
            <div class="col-lg-6 col-md-6">
                <div class="footer-bottom-content">
                    <div class="footer-bottom-content-copy">
                        <p>© {{ date('Y') }} PT Duta Wirya. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="footer-bottom-right">
                    <div class="footer-bottom-right-text">
                        <a class="absod" href="#">Privacy Policy </a>
                        <a href="#"> Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- jquery js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/bootstrap.min.js"></script>
    <!-- carousel js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/owl.carousel.min.js"></script>
    <!-- counterup js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/jquery.counterup.min.js"></script>
    <!-- waypoints js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/waypoints.min.js"></script>
    <!-- wow js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/wow.js"></script>
    <!-- imagesloaded js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- venobox js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/venobox/venobox.js"></script>
    <!-- ajax mail js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/ajax-mail.js"></script>
    <!--  testimonial js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/testimonial.js"></script>
    <!--  animated-text js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/animated-text.js"></script>
    <!-- venobox min js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/venobox/venobox.min.js"></script>
    <!-- isotope js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/isotope.pkgd.min.js"></script>
    <!-- jquery nivo slider pack js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/jquery.nivo.slider.pack.js"></script>
    <!-- jquery meanmenu js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/jquery.meanmenu.js"></script>
    <!-- jquery scrollup js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/jquery.scrollUp.js"></script>
    <!-- theme js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/theme.js"></script>
    <!-- jquery js -->
</body>



















<!-- Mirrored from html.ditsolution.net/techno/index-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Oct 2023 07:31:07 GMT -->

</html>