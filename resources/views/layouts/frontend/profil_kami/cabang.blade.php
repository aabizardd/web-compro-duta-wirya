@extends('layouts.frontend.profil_kami.index')

@section('contentSejarah')

<div class="col-lg-12 col-md-12 col-sm-12 grid-item kantor-cabang pt-20">

    <div class="testimonial_area pb-70">
        <div class="container">
            <div class="row">
                <!-- Start Section Tile -->
                <div class="col-lg-12">
                    <div class="section_title text_left mb-40 mt-3">

                        <div class="section_main_title">
                            <h1>Alamat Kantor Cabang</h1>
                            <h1>PT <span>Duta Wirya</span></h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <!--testimonial owl curousel -->
                        <div class="testimonial_list owl-carousel curosel-style">
                            <!-- Start Single Testimonial -->
                            @foreach ($cabang as $item)

                            <div class="col-lg-12">
                                <div class="single_testimonial_two mt-3 mb-3">
                                    <div class="single_testimonial_content_two">
                                        <div class="single_testimonial_thumb_two mb-4">
                                            <img src="{{ asset('/') }}assets/fe/assets/images/office.png" alt="" width="100" />
                                        </div>

                                        <div class="single_testimonial_content_title_two mt-4">

                                            <h6>{{ $item->nama_kantor }}</h6>
                                        </div>

                                        <div class="single_testimonial_content_text_two mb-4">
                                            <p>{{ $item->alamat_cabang }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>



</div>

@endsection
