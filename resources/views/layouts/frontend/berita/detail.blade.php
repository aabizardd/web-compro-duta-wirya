@extends('layouts.frontend.layout')

@section('content')

@php
// Convert the date string to a Unix timestamp
$timestamp = strtotime($detail_berita->created_at);

// Get the date in the format 'Y-m-d' (Year-Month-Day)
$date = date('d', $timestamp);

// Get the abbreviated month name (e.g., "Nov")
$month = date('M', $timestamp);

// Get the year
$year = date('Y', $timestamp);
@endphp



<div class="breatcome_area d-flex align-items-center" style="background: url({{ asset('/') }}assets/admin/assets/img/cover_berita/{{ $detail_berita->cover }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breatcome_title">
                    <div class="breatcome_title_inner pb-2">
                        <h2>{{ $detail_berita->judul }}</h2>
                    </div>
                    <div class="breatcome_content">
                        <ul>
                            <li><a href="/">Home</a> <i class="fa fa-angle-right"></i> <a href="{{ url('berita') }}">
                                    Berita Terkini</a>
                            </li>
                            <li> <i class="fa fa-angle-right"></i> <a href="{{ route('berita.detail', Request::segment(3)) }}">
                                    {{ $detail_berita->judul }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- BLOG AREA -->
<div class="blog_area blog-details-area pt-100 pb-100" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog_details">
                            <div class="blog_dtl_thumb">
                                <img src="{{ asset('/') }}assets/admin/assets/img/cover_berita/{{ $detail_berita->cover }}" alt="" height="500" />
                            </div>

                            <div class="blog_dtl_content">

                                <h2>{{ $detail_berita->judul }}</h2>
                                <!-- BLOG META -->
                                <div class="techno-blog-meta">
                                    <div class="techno-blog-meta-left">
                                        <span><i class="fa fa-calendar"></i>{{ $date }} {{ $month }} {{ $year }} </span>

                                    </div>
                                </div>
                                {!!$detail_berita->isi !!}

                                <div class="blog_details_dtn_icon" style="margin-top: 20px">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-reddit"></i></a>
                                </div>
                            </div>




                        </div>
                    </div>



                </div>

            </div>


        </div>
    </div>
</div>
<!-- BLOG_AREA END -->


@include('layouts.frontend.jasa.jasa-carousel')



@endsection