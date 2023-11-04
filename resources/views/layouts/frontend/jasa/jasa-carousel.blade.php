<?php

use App\Models\Jasa;

$jasa = Jasa::all();

?>

<div class="testimonial_area pt-">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <!--testimonial owl curousel -->
                    <div class="testimonial_list owl-carousel curosel-style">
                        <!-- Start Single Testimonial -->

                        @foreach ($jasa as $item)
                        <div class="col-lg-12">
                            <div class="single_testimonial mt-3 mb-5">
                                <div class="single_testimonial_content">

                                    <div class="service_style_one text_center pt-40 pb-40 pl-3 pr-3 mb-4">
                                        <div class="service_style_one_icon mb-30">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                        <div class="service_style_one_title mb-30">
                                            <h4>{{ $item->nama_jasa }}</h4>
                                        </div>

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