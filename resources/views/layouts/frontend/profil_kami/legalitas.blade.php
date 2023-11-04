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
                            <h1>Legalitas</h1>
                            {{-- <h1>PT <span>Duta Wirya</span></h1> --}}
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

                {!!$legalitas->legalitas !!}



            </div>
        </div>
    </div>



</div>

@endsection
