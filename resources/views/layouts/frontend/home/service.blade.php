<div class="flipbox_area pt-85 pb-70" style="background-image: url(<?= asset('/') ?>assets/fe/assets/images/slider/slider-4.jpg)" ;>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text_center white mb-55 wow fadeInDown" data-wow-delay="0.4s">
                    <div class="section_sub_title uppercase mb-3">
                        <h6>SERVICES</h6>
                    </div>
                    <div class="section_main_title">
                        <h1>Provide Exclusive Services</h1>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($jasa as $item)

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
                <div class="techno_flipbox mb-30 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="techno_flipbox_font">
                        <div class="techno_flipbox_inner">
                            <div class="techno_flipbox_icon">
                                <div class="icon">
                                    <i class="flaticon-padlock"></i>
                                </div>
                            </div>
                            <div class="flipbox_title">
                                <h3>{{ $item->nama_jasa }}</h3>
                            </div>
                            <div class="flipbox_desc">
                                <p>
                                    {{-- Porem asum molor sit amet, consectetur adipiscing do
                                    miusmod tempor. --}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="techno_flipbox_back" style="background-image: url(assets/images/feature1.jpg)">
                        <div class="techno_flipbox_inner">
                            <div class="flipbox_title">
                                <h3>{{ $item->nama_jasa }}</h3>
                            </div>
                            <div class="flipbox_desc">
                                <p>
                                    {{-- Porem asum molor sit amet, consectetur adipiscing do
                                    miusmod tempor. --}}
                                </p>
                            </div>
                            <div class="flipbox_button">
                                <a href="#">Read More<i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach



        </div>
    </div>
</div>
