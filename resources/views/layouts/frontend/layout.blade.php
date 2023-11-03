<!DOCTYPE html>
<html lang="en-US">
<!-- Mirrored from html.ditsolution.net/techno/index-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Oct 2023 07:31:07 GMT -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Techno - IT Solutions Services HTML5 Template</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('/') }}assets/fe/assets/images/fav-icon/icon.png" />
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/bootstrap.min.css" type="text/css" media="all" />
    <!-- carousel CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/owl.carousel.min.css" type="text/css" media="all" />
    <!-- nivo-slider CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/nivo-slider.css" type="text/css" media="all" />
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/animate.css" type="text/css" media="all" />
    <!-- animated-text CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/animated-text.css" type="text/css" media="all" />
    <!-- font-awesome CSS -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/fonts/font-awesome/css/font-awesome.min.css" />
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/flaticon.css" type="text/css" media="all" />
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/theme-default.css" type="text/css" media="all" />
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/meanmenu.min.css" type="text/css" media="all" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/style.css" type="text/css" media="all" />
    <!-- transitions CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/owl.transitions.css" type="text/css" media="all" />
    <!-- venobox CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/venobox/venobox.css" type="text/css" media="all" />
    <!-- widget CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/widget.css" type="text/css" media="all" />
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/fe/assets/css/responsive.css" type="text/css" media="all" />
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('/') }}assets/fe/assets/js/vendor/modernizr-3.5.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <!-- Loder Start-->
    <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loder-section left-section"></div>
        <div class="loder-section right-section"></div>
    </div>
    <!-- Loder End -->

    @include('layouts.frontend.header')

    <!-- Techno Mobile Menu Area -->
    @include('layouts.frontend.header-mobile')


    @yield('content')

    <div class="footer_middle_area pt-10 pb-10">
        <div class="container">
            <div class="row">

                <div class="col-lg-12" style="">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 class="mb-2">Kantor Pusat</h6>
                            <p>
                                <i class="fas fa-map-signs"></i> Wisma Penilai Lt. 1-5, Jl. Ki Mangun Sarkoro No. 55, Solo <br>
                                <i class="fas fa-phone"></i> (0271) 717910, 723110 <br>
                                <i class="fas fa-envelope"></i> sih_wiryadi@yahoo.com / kjppsihwiryadi@gmail.com <br>
                            </p>

                        </div>

                        <div class="col-lg-6">
                            <h6 class="mb-2">Jam Operasional</h6>
                            <p>
                                <i class="fas fa-clock"></i> Senin-Jumat 09.00-16.00
                            </p>

                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="footer_bottom_menu pt-5 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="footer_bottom_menu_inner">
                            <ul>
                                <li><a href="index.html" style="color: black">Home</a></li>
                                <li><a href="about.html" style="color: black">About</a></li>
                                <li><a href="service-1.html" style="color: black">Service</a></li>
                                <li><a href="blog-gird.html" style="color: black">News</a></li>
                                <li><a href="contact.html" style="color: black">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-bottom-content pt-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                        <div class="footer-bottom-content-copy">
                            <p style="color: black">© 2023 Techno.All Rights Reserved.</p>
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
