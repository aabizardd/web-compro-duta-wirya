@extends('layouts.frontend.layout')

@section('content')


<div class="breatcome_area d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breatcome_title">
                    <div class="breatcome_title_inner pb-2">
                        <h2>Klien Kami</h2>
                    </div>
                    <div class="breatcome_content">
                        <ul>
                            <li><a href="/">Home</a> <i class="fa fa-angle-right"></i> <a href="{{ url('klien') }}">
                                    Klien
                                    Kami</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

use App\Models\Client;

?>

@foreach ($bidang_klien as $bc)
<div class="brand_area pt-35 pb-15">
    <div class="container">
        <div class="row">
            <!-- Start Section Tile -->
            <div class="col-lg-12">
                <div class="section_title text_center mb-50 mt-3">
                    <div class="section_main_title">
                        <h4>{{ $bc->nama_jasa }}</h4>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">

            <?php
            $client_list = Client::where('id_jasa', $bc->id)->get();
            ?>

            @foreach ($client_list as $cl)

            <div class="col-lg-4 col-md-4 col-sm-2">
                <div class="single_brand mb-30">
                    <div class="single_brand_thumb">
                        <img src="{{ asset('/') }}assets/admin/assets/img/logo_client/{{ $cl->logo_client }}" alt=""
                            width="150" />
                    </div>
                </div>
            </div>

            @endforeach




        </div>
    </div>
</div>
@endforeach








@endsection