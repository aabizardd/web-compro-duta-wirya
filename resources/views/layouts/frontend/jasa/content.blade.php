<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="service-main-details">
                <div class="service-main-details-inner">
                    <div class="service-main-details-inner-thumb">
                        <img src="{{ asset('/') }}assets/fe/assets/images/blog2.jpg" alt="" />
                    </div>



                    <div class="service-main-details-content-title pt-4 pb-3">
                        <h3>{{ $jasa_one->nama_jasa }}</h3>
                    </div>
                    {{-- <div class="service-main-details-content-text">
                        <p>{{$jasa_one->keterangan_jasa}}</p>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="service-details-research">

            <div class="service-details-research-text">
                {!! $jasa_one->detail_jasa !!}
            </div>


            <div class="service-details-research-button w-100" style="margin-top: 30px;">
                <a href="#">Get This Service</a>
            </div>
        </div>
    </div>
</div>
</div>
