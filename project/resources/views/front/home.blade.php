@extends('layouts.front')

@section('content')
<!-- Hero Area Start -->
<section class="hero-area">
    <img class="cars" src="{{  asset('assets/front/images/heroarea-img.jpg') }}" alt="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content">
                    <div class="heading-area">
                        <h1 class="title">
                            {{ $ps->header_btxt }}
                        </h1>
                        <p class="sub-title">
                            {{ $ps->header_stxt }}
                        </p>
                    </div>
                    <form id="searchForm" action="{{ route('front.cars') }}" method="get">
                        <ul class="banner-form select-list">
                            <li>
                                <div class="car-make">
                                    <input type="text" placeholder="Make" class="form-control">
                                </div>
                            </li>
                            <li>
                                <div class="car-make">
                                    <input type="text" placeholder="Model" class="form-control">
                                </div>
                            </li>
                            <li>
                                <div class="car-make">
                                    <input type="text" placeholder="Year" class="form-control">
                                </div>
                            </li>
                            <li>
                                <div class="car-make">
                                    <input type="text" placeholder="Location" class="form-control">
                                </div>
                            </li>
                            <li>
                                <button type="submit" class="mybtn1" style="width: 100%; outline: 0;">{{ $langg->lang12 }}</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Area End -->

<!-- Featured Cars Area Start -->
<section class="featuredCars">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="section-heading">
                    <h2 class="title">
                        {{ $ps->featured_btxt }}
                    </h2>
                    <p class="text">
                        {{ $ps->featured_stxt }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($fcars as $key => $fcar)
            <div class="col-lg-4 col-md-6">
                <a class="car-info-box" href="{{ route('front.details', $fcar->id) }}">
                    <div class="img-area">
                        <img class="light-zoom" src="{{asset('assets/front/images/cars//featured/'.$fcar->featured_image)}}" alt="">
                    </div>
                    <div class="content">
                        <h4 class="title">
                            {{ $fcar->title }}
                        </h4>
                        <ul class="top-meta">
                            <li>
                                <i class="far fa-eye"></i> {{ $fcar->views }} {{ $langg->lang13 }}
                            </li>
                            <li>
                                <i class="far fa-clock"></i> {{ time_elapsed_string($fcar->created_at) }}
                            </li>
                        </ul>
                        <ul class="short-info">
                            <li class="north-west" title="Model Year">
                                <img src="{{asset('assets/front/images/calender-icon.png')}}" alt="">
                                <p>{{ $fcar->year }}</p>
                            </li>
                            <li class="north-west" title="Mileage">
                                <img src="{{asset('assets/front/images/road-icon.png')}}" alt="">
                                <p>{{ $fcar->mileage }}</p>
                            </li>
                            <li class="north-west" title="Top Speed (KMH)">
                                <img src="{{asset('assets/front/images/transformar.png')}}" alt="">
                                <p>{{ $fcar->top_speed }}</p>
                            </li>
                        </ul>
                        <div class="footer-area">
                            <div class="left-area">
                                @if (empty($fcar->sale_price))
                                <p class="price">
                                    {{ $fcar->currency_symbol }} {{ number_format($fcar->regular_price, 0, '', ',') }}
                                </p>
                                @else
                                <p class="price">
                                    {{ $fcar->currency_symbol }} {{ number_format($fcar->sale_price, 0, '', ',') }} <del>{{ $fcar->currency_symbol }} {{ number_format($fcar->regular_price, 0, '', ',') }}</del>
                                </p>
                                @endif

                            </div>
                            <div class="right-area">
                                <p class="condition">
                                    {{ $fcar->condtion->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-3">
            @if (count($fcars) == 6)
            <a href="{{ route('front.cars') . '?type=featured' }}" class="mybtn1">
                {{ $langg->lang15 }}
            </a>
            @endif
        </div>
    </div>
</section>
<!-- Featured Cars Area End -->

<!-- Featured Cars Area Start -->
<section class="latestCars">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="section-heading">
                    <h2 class="title">
                        {{ $ps->latest_btxt }}
                    </h2>
                    <p class="text">
                        {{ $ps->latest_stxt }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($lcars as $key => $lcar)
            <div class="col-lg-4 col-md-6">
                <a class="car-info-box" href="{{ route('front.details', $lcar->id) }}">
                    <div class="img-area">
                        <img class="light-zoom" src="{{asset('assets/front/images/cars//featured/'.$lcar->featured_image)}}" alt="">
                    </div>
                    <div class="content">
                        <h4 class="title">
                            {{ $lcar->title }}
                        </h4>
                        <ul class="top-meta">
                            <li>
                                <i class="far fa-eye"></i> {{ $lcar->views }} {{ $langg->lang13 }}
                            </li>
                            <li>
                                <i class="far fa-clock"></i> {{ time_elapsed_string($lcar->created_at) }}
                            </li>
                        </ul>
                        <ul class="short-info">
                            <li class="north-west" title="Model Year">
                                <img src="{{asset('assets/front/images/calender-icon.png')}}" alt="">
                                <p>{{ $lcar->year }}</p>
                            </li>
                            <li class="north-west" title="Mileage">
                                <img src="{{asset('assets/front/images/road-icon.png')}}" alt="">
                                <p>{{ $lcar->mileage }}</p>
                            </li>
                            <li class="north-west" title="Top Speed (KMH)">
                                <img src="{{asset('assets/front/images/transformar.png')}}" alt="">
                                <p>{{ $lcar->top_speed }}</p>
                            </li>
                        </ul>
                        <div class="footer-area">
                            <div class="left-area">
                                @if (empty($lcar->sale_price))
                                <p class="price">
                                    {{ $lcar->currency_symbol }} {{ number_format($lcar->regular_price, 0, '', ',') }}
                                </p>
                                @else
                                <p class="price">
                                    {{ $lcar->currency_symbol }} {{ number_format($lcar->sale_price, 0, '', ',') }} <del>{{ $lcar->currency_symbol }} {{ number_format($lcar->regular_price, 0, '', ',') }}</del>
                                </p>
                                @endif

                            </div>
                            <div class="right-area">
                                <p class="condition">
                                    {{ $lcar->condtion->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-3">
            @if (count($lcars) == 6)
            <a href="{{ route('front.cars') }}" class="mybtn1">
                {{ $langg->lang15 }}
            </a>
            @endif
        </div>
    </div>
</section>
<!-- Featured Cars Area End -->

<!-- Testimonial Area Start -->
<section class="testimonial">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="section-heading">
                    <h2 class="title">
                        {{ $ps->testimonial_title }}
                    </h2>
                    <p class="text">
                        {{ $ps->testimonial_subtitle }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="testimonial-slider">
                    @foreach ($testimonials as $key => $testimonial)
                    <div class="single-testimonial">
                        <div class="people">
                            <div class="img">
                                <img src="{{asset('assets/images/testimonials/'.$testimonial->image)}}" alt="">
                            </div>
                            <h4 class="title">{{ $testimonial->name }}</h4>
                            <p class="designation">{{ $testimonial->rank }}</p>
                        </div>
                        <div class="review-text">
                            <p>
                                "{{ $testimonial->comment }}"
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Area End -->

<!-- Blog Area Start -->
<section class="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="section-heading">
                    <h2 class="title">
                        {{ $ps->blog_btxt }}
                    </h2>
                    <p class="text">
                        {{ $ps->blog_stxt }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-slider">

                    @foreach ($blogs as $key => $blog)
                    <div class="single-blog">
                        <div class="img">
                            <img src="{{asset('assets/images/blogs/'.$blog->photo)}}" alt="">
                        </div>
                        <div class="content">
                            <a href="{{ route('front.blogshow', $blog->id) }}">
                                <h4 class="title">
                                    {{strlen($blog->title) > 60 ? substr($blog->title, 0, 60) . '...' : $blog->title}}
                                </h4>
                            </a>
                            <ul class="top-meta">
                                <li>
                                    <a href="#">
                                        <i class="far fa-user"></i> {{ $langg->lang16 }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-calendar"></i> {{ date ( 'jS M, Y' , strtotime($blog->created_at) ) }}
                                    </a>
                                </li>
                            </ul>
                            <div class="text">
                                <p>
                                    {{ (strlen(strip_tags($blog->details)) > 140) ? substr(strip_tags($blog->details), 0, 140) . '...' : strip_tags($blog->details) }}
                                </p>
                            </div>
                            <a href="{{ route('front.blogshow', $blog->id) }}" class="link">{{ $langg->lang17 }}<i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Area End -->
@endsection


@section('scripts')
<script>
    $(".sel-price").on('change', function () {
        let url = '{{ url(' / ') }}/prices/' + $(this).val();
        // console.log(url);
        $.get(
                url,
                function (data) {
                    console.log(data);
                    $("input[name='minprice']").val(data.minimum);
                    $("input[name='maxprice']").val(data.maximum);
                }
        )
    });
</script>
@endsection
