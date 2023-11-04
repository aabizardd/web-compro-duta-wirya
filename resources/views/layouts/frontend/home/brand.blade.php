<div class="brand_area pt-35 pb-15">
    <div class="container">
        <div class="row">
            <!-- Start Section Tile -->
            <div class="col-lg-12">
                <div class="section_title text_center mb-50 mt-3">
                    <div class="section_main_title">
                        <h1>Client Kami</h1>
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
                    <!--brand owl curousel -->
                    <div class="brand_list owl-carousel curosel-style">
                        @foreach ($client as $item)
                        <div class="col-lg-12">
                            <div class="single_brand mt-3 mb-5">
                                <div class="single_brand_thumb">
                                    <img src="{{ asset('/') }}assets/admin/assets/img/logo_client/{{ $item->logo_client }}" alt="" width="150" />
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