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
                            Australia’s salvage vehicle experts, connecting sellers with the best buyers
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
                                        <input type="number" class="form-control" value="2015" name="year_from">
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
        <h2>HOW DO I GET MORE FOR MY CAR?</h2>
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
                    <h3>SIGN UP</h3>
                    <p>Enter your details to create and account and start selling straight away, have you vehicle seen by hundreds of industry buyers locally and nationally.</p>
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
                    <h3>LIST MY CAR</h3>
                    <p>Enter your vehicle details, upload photos and your almost there</p>
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
                    <h3>PREVIEW YOUR ADD</h3>
                    <p>Preview your add and make select the duration your car will be advertised for, We have 3 options, Urgent sale 24hr, Quick sell 72hr or Standard 7 days listings</p>
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
                    <h3>TIME TO SELL</h3>
                    <p>You'll start receiving offers by email or view offers by logging onto CarSalvageSales.com, we recommend you let your add run the full duration but if you get an offer you can't refuse you can accept it, contact the successful buyer and end your item at any time </p>
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
                                        <i class="far fa-clock"></i> 12:51:30
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
                                        <small>Engine </small>
                                        <p>1.6L</p>
                                    </li>
                                </ul>
                                <div class="footer-area">
                                    <i class="fas fa-map-marker-alt"></i> {{ $fcar->address }}
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
                                <i class="far fa-clock"></i> 12:51:30
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
                                <small>Engine </small>
                                <p>1.6L</p>
                            </li>
                        </ul>
                        <div class="footer-area">
                            <i class="fas fa-map-marker-alt"></i> {{ $lcar->address }}
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
                            <h3>SELLER</h3>
                            <p>As a seller you can list your vehicle for $9.90inc GST and receive offers from any and all active registered buyers. </p>
                            <a href="#" class="btn btn-outline">Become a Seller</a>
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
                            <h3>BUYER MEMBERSHIP</h3>
                            <p>You’ll also be able to list vehicles for $4.95</p>
                            <a href="#" class="btn btn-outline">Become a Buyer/Seller</a>
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
                            <h3>PREMIUM BUYER MEMBERSHIP</h3>
                            <p>SAs a premium buyer you will be able to bid on all and any vehicle listed nationwide and be able to list as many vehicles as you want with no charge at all</p>
                            <a href="#" class="btn btn-outline">Become a Wholesaler</a>
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
            var url = '{{ url('/') }}' + '/front/' + brandid + '/models';
            // console.log(url);
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
