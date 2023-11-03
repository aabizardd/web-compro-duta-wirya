<div class="blog_area pt-85 pb-65" style="background-image: url(<?= asset('/') ?>assets/fe/assets/images/bg-cnt.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text_center mb-60 mt-3 wow fadeInDown" data-wow-delay="0.3s">
                    <div class="section_sub_title uppercase mb-3">
                        <h6>LATEST ARTICLE</h6>
                    </div>
                    <div class="section_main_title">
                        <h1>See Our Latest</h1>
                        <h1>Blog Posts</h1>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
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
            $monthAbbreviated = date('M', $timestamp);

            // Get the year
            $year = date('Y', $timestamp);
            @endphp

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="single_blog text-center mb-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="single_blog_thumb">
                        <a href="blog-details.html"><img src="{{ asset('/') }}assets/admin/assets/img/cover_berita/{{ $item->cover }}" alt="" width="100%" height="250" /></a>
                    </div>
                    <div class="single_blog_date">
                        <div class="single_blog_date_inner">
                            <h3>{{ $date }}</h3>
                            <span>{{ $monthAbbreviated  }}</span>
                            <span class="years">{{ $year }}</span>
                        </div>
                    </div>
                    <div class="single_blog_content pt-4 pl-4 pr-4">

                        <div class="blog_page_title pb-1">
                            <h3>
                                <a href="blog-details.html">The five devices you need to work anytime</a>
                            </h3>
                        </div>
                        <div class="blog_description">
                            <p>
                                {!! substr($item->isi, 0, 100) !!}
                            </p>
                        </div>
                        <div class="blog_page_button style_two pb-5">
                            <a href="blog-details.html">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach






        </div>
    </div>
</div>
