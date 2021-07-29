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
                            {{-- {{ $ps->header_btxt }}--}}
                            Australia's salvage vehicle experts, connecting sellers with the best buyers
                        </h1>
                        <!--<p class="sub-title">-->
                        {{--{{ $ps->header_stxt }}--}}
                        <!--</p>-->
                        <ul class="banner-text">
                            <li><i class="far fa-hand-pointer"></i>Choose who you sell to</li>
                            <li><i class="fas fa-dollar-sign"></i>See all offers made on your vehicle </li>
                            <li><i class="far fa-user"></i> No Middle Man</li>
                        </ul>
                    </div>
                    <div class="banner-form">
                        <form id="searchForm" action="{{ route('front.cars') }}" method="get">
                            <ul class="select-list">
                                <li>
                                    <div class="car-make">
                                        <select class="form-control" id="brand_id" name="brand_id"
                                                onchange="getModels(this.value)">
                                            <option value=" {{ $langg->lang115 }}" disabled selected>
                                                {{ $langg->lang115 }}
                                            </option>
                                            @foreach ($brands as $key => $brand)
                                            <option value="{{ $brand->id }}">
                                                {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="car-make">
                                        <select class="form-control" id="selectModels" name="brand_model_id[]">
                                            <option value="" disabled selected>Select a Model</option>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="car-make">
                                        <input type="number" class="form-control" value="" placeholder="Enter Year" min="1950" name="year_from">
                                    </div>
                                </li>
                                <li>
                                    <div class="car-make">
                                        <input type="text" placeholder="Location" class="form-control" name="location">
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
    </div>
</section>
<!-- Hero Area End -->

<!--how it works-->

<div class="how-it-works">
    <div class="container">
        <div class="section-heading">
            <h2 class="title">How Do I Get More For My Car?</h2>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="step">
                    <div class="step-circle">
                        <figure>
                            <img class="cars" src="assets/front/images/signup.png" alt="">
                            <div class="step-count">
                                1
                            </div>
                        </figure>
                    </div>
                    <h3>Signup</h3>
                    <p>Enter your details to create an account and start selling straight away, have your vehicle seen by hundreds of industry buyers locally and nationally.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="step">
                    <div class="step-circle">
                        <figure> 
                            <img class="cars" src="assets/front/images/list.png" alt="">
                            <div class="step-count">
                                2
                            </div>
                        </figure>
                    </div>
                    <h3>List My Car</h3>
                    <p>Enter your vehicle details, upload photos and you are almost there. Don't think that your vehicle has no value left in it and accept a fraction of its true value.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="step">
                    <div class="step-circle">
                        <figure>
                            <img class="cars" src="assets/front/images/auction.png" alt="">
                            <div class="step-count">
                                3
                            </div>
                        </figure>
                    </div>
                    <h3>Preview Your Ad</h3>
                    <p>Preview your ad and select the duration your car will be advertised for. We have 3 options, Urgent sale 24hr, Quick sell 72hr or Standard 7 days listings.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="step">
                    <div class="step-circle">
                        <figure>
                            <img class="cars" src="assets/front/images/smile.png" alt="">
                            <div class="step-count">
                                4
                            </div>
                        </figure>
                    </div>
                    <h3>Time To Sell</h3>
                    <p>you will receive offers via email or log into CSS to view offers and buyer contact details, don't sell too quick cause you never know what the next offer could be</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!--how it works end-->


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
                        <img style="min-height: 230px; object-fit: cover;" class="light-zoom" src="{{asset('assets/front/images/cars//featured/'.$fcar->featured_image)}}" alt="{{$fcar->featured_image}}">
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
                                <i class="far fa-clock"></i> <span id="timer_f_{{ $fcar->id }}">1417539</span>
                                @php
                                $seconds = strtotime("+$fcar->auction_time days", strtotime($fcar->auction_date)) - strtotime(date('Y-m-d h:i:s', time()));
                                $seconds = $seconds > 0 ? $seconds : 0;
                                @endphp
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                    $('#timer_f_{{ $fcar->id }}').backward_timer({
                                    seconds: {{ $seconds }},
                                            format: 'd%d h%:m%:s%',
                                            on_tick: function(timer) {
                                            var color = ((timer.seconds_left % 2) == 0)? "#F82828": "#009CFF";
                                            timer.target.css('color', color);
                                            }
                                    });
                                    $('#timer_f_{{ $fcar->id }}').backward_timer('start');
                                    });
                                </script>

                            </li>
                        </ul>
                        <ul class="short-info">
                            <li class="north-west" title="Transmission">
                                <!--<img src="{{asset('assets/front/images/calender-icon.png')}}" alt="">-->
                                <small>Transmission</small>
                                <p>{{ get_transmission_by_id($fcar->transmission_type_id) }}</p>
                            </li>
                            <li class="north-west" title="Engine Capacity">
                                <!--<img src="{{asset('assets/front/images/road-icon.png')}}" alt="">-->
                                <small>Cylinders </small>
                                <p>{{$fcar->cylender}}</p>
                            </li>
                        </ul>
                        <div class="footer-area">
                            <i class="fas fa-map-marker-alt"></i> {{ $fcar->suburb }}
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
                        <img style="min-height: 230px; object-fit: cover;" class="light-zoom" src="{{asset('assets/front/images/cars//featured/'.$lcar->featured_image)}}" alt="{{$lcar->featured_image}}">
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
                                <i class="far fa-clock"></i> <span id="timer_l_{{ $lcar->id }}">1417539</span>
                                @php
                                $seconds = strtotime("+$lcar->auction_time days", strtotime($lcar->auction_date)) - strtotime(date('Y-m-d h:i:s', time()));
                                $seconds = $seconds > 0 ? $seconds : 0;
                                @endphp
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                    $('#timer_l_{{ $lcar->id }}').backward_timer({
                                    seconds: {{$seconds}},
                                            format: 'd%d h%:m%:s%',
                                            on_tick: function(timer) {
                                            var color = ((timer.seconds_left % 2) == 0)? "#F82828": "#009CFF";
                                            timer.target.css('color', color);
                                            }
                                    });
                                    $('#timer_l_{{ $lcar->id }}').backward_timer('start');
                                    });
                                </script>
                            </li>
                        </ul>
                        <ul class="short-info">
                            <li class="north-west" title="Transmission">
                                <!--<img src="{{asset('assets/front/images/calender-icon.png')}}" alt="">-->
                                <small>Transmission</small>
                                <p>{{ get_transmission_by_id($lcar->transmission_type_id) }}</p>
                            </li>
                            <li class="north-west" title="Engine Capacity">
                                <!--<img src="{{asset('assets/front/images/road-icon.png')}}" alt="">-->
                                <small>Cylinders </small>
                                <p>{{$lcar->cylender}}</p>
                            </li>
                        </ul>
                        <div class="footer-area">
                            <i class="fas fa-map-marker-alt"></i> {{ $lcar->suburb }}
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

<section class="home-users">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-4 user-list bg-dark-blue">
                <div class="row">
                    <div class="col-xl-3">
                        <img class="cars" src="assets/front/images/car.png" alt="">
                    </div>
                    <div class="col-xl-9">
                        <article>
                            <h3>Seller</h3>
                            <p>As a seller you can list your vehicle for $9.90inc GST and receive offers from any and all registered buyers. </p>
                            <a href="/seller" class="btn btn-outline">Become a Seller</a>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 user-list  bg-green">
                <div class="row">
                    <div class="col-xl-3">
                        <img class="cars" src="assets/front/images/buyers.png" alt="">
                    </div>
                    <div class="col-xl-9">
                        <article>
                            <h3>Buyer Membership</h3>
                            <p>Our buyer membership allows you to bid on all vehicles listed and you can list vehicles for the discounted price of $4.95 inc. GST.</p>
                            <a href="/become-a-member" class="btn btn-outline">Become a Member</a>
                        </article>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 user-list bg-dark-blue">
                <div class="row">
                    <div class="col-xl-3">
                        <img class="cars" src="assets/front/images/wholesaler.png" alt="">
                    </div>
                    <div class="col-xl-9">
                        <article>
                            <h3>Premium membership</h3>
                            <p>As a premium member you will be able to bid on all vehicles listed and you can list unlimited vehicles for no additional cost.</p>
                            <a href="/become-a-member" class="btn btn-outline">Become a Wholesaler</a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
<script>
    function getModels(brandid) {
    var url = '{{ url('/') }}'+'/front/'+brandid+'/models';
    $.get(url, function(data) {
    // console.log(data);
    var opts = `<option value="Select a model" disabled="" selected="">Select a model</option>`;
    for (var i = 0; i < data.length; i++) {
    opts += `<option value="${data[i].id}">${data[i].name}</option>`;
    }
    $("#selectModels").html(opts);
    })
    }
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
