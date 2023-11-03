<div class="about_area pt-70 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6 wow fadeInLeft" data-wow-delay="0.4s">
                <div class="single_about_thumb mb-3">
                    <div class="single_about_thumb_inner">
                        <img src="{{ asset('/') }}assets/fe/assets/images/about-img.png" alt="" />
                    </div>
                </div>
                <div class="single_about_shape">
                    <div class="single_about_shape_thumb bounce-animate">
                        <img src="{{ asset('/') }}assets/fe/assets/images/about-circle.png" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                <div class="section_title text_left mb-40 mt-3 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="section_sub_title uppercase mb-3">
                        <h6>? YEARS OF EXPERIENCE</h6>
                    </div>
                    <div class="section_main_title">
                        <h1>Sejarah PT Duta Wirya</h1>
                        <!-- <h1>Provide Best <span>IT Solutions.</span></h1> -->
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>
                    <div class="section_content_text pt-4">
                        <p>
                            {!! substr($sejarah->sejarah, 0, 800) !!} {{-- Display the first 100 characters --}}

                        </p>

                        <a class="btn btn-primary mt-2" style="background-color: #00247E;color:white">Baca
                            Selengkapnya</a>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>