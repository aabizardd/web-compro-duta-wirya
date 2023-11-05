@extends('layouts.frontend.layout')

@section('content')


<div class="breatcome_area d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breatcome_title">
                    <div class="breatcome_title_inner pb-2">
                        <h2>Berita Terkini</h2>
                    </div>
                    <div class="breatcome_content">
                        <ul>
                            <li><a href="/">Home</a> <i class="fa fa-angle-right"></i> <a href="{{ url('berita') }}">
                                    Berita Terkini</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BLOG AREA -->
<div class="blog_area blog-grid left-sidebar pt-90 pb-80" id="blog">
    <div class="container">
        <div class="row">


            <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                <div class="row">
                    @foreach ($berita as $item)

                    @php
                    // Convert the date string to a Unix timestamp
                    $timestamp = strtotime($item->created_at);

                    // Get the date in the format 'Y-m-d' (Year-Month-Day)
                    $date = date('d', $timestamp);

                    // Get the abbreviated month name (e.g., "Nov")
                    $month = date('F', $timestamp);

                    // Get the year
                    $year = date('Y', $timestamp);
                    @endphp


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="single_blog mb-30">
                            <div class="single_blog_thumb pb-4">
                                <a href="{{ route('berita.detail', $item->id) }}"><img
                                        src="{{ asset('/') }}assets/admin/assets/img/cover_berita/{{ $item->cover }}"
                                        alt="" /></a>
                            </div>
                            <div class="single_blog_content pl-4 pr-4">
                                <div class="techno_blog_meta">
                                    <a href="#">DWPC </a>
                                    <span class="meta-date pl-3">{{ $month }} {{ $date }}, {{ $year }}</span>
                                </div>
                                <div class="blog_page_title pb-1">
                                    <h3><a href="{{ route('berita.detail', $item->id) }}">{{ $item->judul }}</a></h3>
                                </div>
                                <div class="blog_description pb-3">
                                    <p style="text-align: justify">
                                        {!! substr(strip_tags($item->isi), 0, 200) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach



                </div>


            </div>
            <div class=" col-lg-4 col-md-5 col-sm-12 col-xs-12 sidebar-right content-widget pdsr">
                <div class="blog-left-side widget">
                    {{-- <div id="search-3" class="widget widget_search">
                        <div class="search">
                            <form action="#" method="get">
                                <input type="text" name="s" value="" placeholder="Cari Berita" title="Search for:">
                                <button type="submit" class="icons">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div> --}}
                    <div class="widget_about widget sn_bd_dtl_wd">
                        {{-- <h2 class="widget-title">About PT Duta Wirya</h2> --}}
                        <div class="widget_about_thumb">
                            <img src="{{ asset('/') }}assets/admin/assets/img/logo dwpc.png" alt="" width="100" />
                        </div>
                        <div class="widget_about_content">
                            <h5>PT Duta Wirya</h5>



                            <p style="text-align: justify">
                                {!! substr(strip_tags($sejarah->sejarah), 0, 200) !!}
                            </p>

                        </div>


                        <div class="widget_about_icon">
                            <a class="btn btn-primary" href="{{ url('profil-kami') }}">Lihat Selengkapnya</a>
                            {{-- <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a> --}}
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