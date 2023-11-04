@extends('layouts.frontend.layout')

@section('content')

<div class="breatcome_area d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breatcome_title">
                    <div class="breatcome_title_inner pb-2">
                        <h2>Profil Kami</h2>
                    </div>
                    <div class="breatcome_content">
                        <ul>
                            <li><a href="/">Home</a> <i class="fa fa-angle-right"></i> <a href="{{ route('profil-kami') }}"> Profil
                                    Kami</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-80">

                <div class="portfolio_area" id="portfolio">
                    <div class="container">
                        <div class="row">
                            <!-- Start Section Tile -->

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portfolio_nav">
                                    <div class="portfolio_menu">
                                        <ul class="menu-filtering">

                                            <a href="{{ route('profil-kami') }}">
                                                <li class=<?= Request::segment(2) == "" ? "current_menu_item" : "" ?>>
                                                    Sejarah
                                                </li>
                                            </a>

                                            <a href="{{ route('profil-kami.visi-misi') }}">
                                                <li class=<?= Request::segment(2) == "visi-misi" ? "current_menu_item" : "" ?>>
                                                    Visi Misi
                                                </li>
                                            </a>

                                            <a href="{{ route('profil-kami.cabang') }}">
                                                <li class=<?= Request::segment(2) == "cabang" ? "current_menu_item" : "" ?>>
                                                    Cabang
                                                </li>
                                            </a>

                                            <a href="{{ route('profil-kami.legalitas') }}">
                                                <li class=<?= Request::segment(2) == "legalitas" ? "current_menu_item" : "" ?>>
                                                    Legalitas
                                                </li>
                                            </a>



                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>
    </div>
</div>

@yield('contentSejarah')



{{-- @include('layouts.frontend.profil_kami.sejarah') --}}

@include('layouts.frontend.jasa.jasa-carousel')


@endsection