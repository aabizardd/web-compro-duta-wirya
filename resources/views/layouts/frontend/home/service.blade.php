<div class="flipbox_area pt-85 pb-70" style="background-image: url(<?= asset('/') ?>assets/fe/assets/images/slider/slider-4.jpg)" ;>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section_title text_left mb-60 mt-3">
                    <div class="section_sub_title uppercase mb-3">
                        {{-- <h6>LATEST ARTICLE</h6> --}}
                    </div>
                    <div class="section_main_title">
                        <h1 style="color:white">Jasa Kami</h1>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="section_button mt-50">
                    <div class="button two">
                        <a href="{{ url('jasa') }}">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($jasa as $item)

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="service_style_one text_center pt-40 pb-40 pl-3 pr-3 mb-4">
                    <div class="service_style_one_icon mb-30">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <div class="service_style_one_title mb-30">
                        <h4>{{ $item->nama_jasa }}</h4>
                    </div>
                    <div class="service_style_one_text">
                        <p>{{ substr($item->keterangan_jasa, 0,120) . " ...."}}</p>
                    </div>
                    <div class="service_style_one_button pt-3">
                        <a href="{{ url('jasa') }}?id={{ $item->id }}">Baca Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>


            @endforeach









        </div>
    </div>
</div>