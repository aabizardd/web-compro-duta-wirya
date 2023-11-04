@extends('layouts.frontend.layout')

@section('content')



<div class="breatcome_area d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breatcome_title">
                    <div class="breatcome_title_inner pb-2">
                        <h2>Jasa Kami</h2>
                    </div>
                    <div class="breatcome_content">
                        <ul>
                            <li><a href="/">Home</a> <i class="fa fa-angle-right"></i> <a href="{{ url('jasa') }}"> Jasa
                                    Kami</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service-details pages pt-90 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                <div class="service-details-pn-list">
                    <ul>
                        {{-- style="background-color: #1761DC;color: white;" --}}
                        @foreach ($jasa as $item)
                        <li>
                            <a href="?id={{ $item->id }}" style="">{{ $item->nama_jasa }}
                                <span><i class="fa fa-angle-right"></i></span>
                            </a>
                        </li>
                        @endforeach



                    </ul>
                </div>


            </div>


            @include('layouts.frontend.jasa.content')



        </div>
    </div>
</div>




@include('layouts.frontend.jasa.jasa-carousel')



<!--==================================================-->
<!----- End Techno Service Details Area ----->
<!--==================================================-->


@endsection