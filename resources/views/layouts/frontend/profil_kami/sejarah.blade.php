@extends('layouts.frontend.profil_kami.index')

@section('contentSejarah')

<div class="about_area pt-20">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section_title text_left mb-40 mt-3">
                    <div class="section_sub_title uppercase mb-3">
                        <h6>30 TAHUN BERPENGALAMAN</h6>
                    </div>
                    <div class="section_main_title">

                        <h1>Sejarah PT Duta Wirya</span></h1>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>

                </div>
                <div class="singel_about_left mb-30">
                    <div class="singel_about_left_inner mb-3">
                        <div class="singel-about-content boder pl-4">
                            <p>{!!$sejarah->sejarah !!}</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection