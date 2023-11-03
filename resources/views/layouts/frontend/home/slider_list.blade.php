<div class="slider_list owl-carousel">

    @foreach ($kegiatan as $k)
    <div class="slider_area d-flex align-items-center slider1" id="home" style="background-image: url('{{ asset('/') }}assets/admin/assets/img/foto_kegiatan/{{ $k->foto_kegiatan }}')">
        <div class="container">
            <div class="row">
                <!--Start Single Portfolio -->
                <div class="col-lg-12">
                    <div class="single_slider">
                        <div class="slider_content">
                            <div class="slider_text">
                                <div class="slider_text_inner wow fadeInLeft" data-wow-delay="0.3s">
                                    <h5>Kegiatan PT Duta Wirya</h5>
                                    <h1>{{ $k->nama_kegiatan }}</h1>
                                    {{-- <h1>for your Business</h1> --}}
                                </div>

                                <div class="slider-video wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="video-icon">
                                        <a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="https://youtu.be/BS4TUd7FJSg"><i class="fa fa-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach




</div>
