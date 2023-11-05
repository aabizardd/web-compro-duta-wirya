<div class="blog_area bg_color2 pt-80 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="section_title text_left mb-60 mt-3">
                    <div class="section_sub_title uppercase mb-3">
                        <h6>BERITA TERAKHIR</h6>
                    </div>
                    <div class="section_main_title">
                        <h1>Lihat Berita Terakhir Kita</h1>
                        <h1>Postingan Berita</h1>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="section_button mt-50">
                    <div class="button two">
                        <a href="{{ url('berita') }}">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($berita as $item)

            @php
            // Convert the date string to a Unix timestamp
            $timestamp = strtotime($item->created_at);

            // Get the date in the format 'Y-m-d' (Year-Month-Day)
            $date = date('d', $timestamp);

            // Get the abbreviated month name (e.g., "Nov")
            $month = date('M', $timestamp);

            // Get the year
            $year = date('Y', $timestamp);
            @endphp

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="single_blog mb-4">
                    <div class="single_blog_thumb el_thumb">
                        <a href="{{ route('berita.detail', $item->id) }}"><img src="{{ asset('/') }}assets/admin/assets/img/cover_berita/{{ $item->cover }}" alt="" /></a>
                    </div>
                    <div class="single_blog_content pl-4 pr-4">
                        <div class="techno_blog_meta shado_bg">
                            <a href="#">DWPC </a>
                            <span class="meta-date pl-3">{{ $month }} {{ $date }}, {{ $year }}</span>
                        </div>
                        <div class="blog_page_title pb-1 pt-3">
                            <h3><a href="{{ route('berita.detail', $item->id) }}">{{ $item->judul }}</a></h3>
                        </div>
                        <div class="blog_description pb-3">
                            <p style="text-align: justify;">
                                {!! substr(strip_tags($item->isi), 0, 120) ." ...." !!}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach






        </div>
    </div>
</div>