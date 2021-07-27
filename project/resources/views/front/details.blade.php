@extends('layouts.front')

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="pagetitle">
                    {{ $car->title }}
                </h1>
<!--                <ul class="pages">
                    <li>
                        <a href="{{ route('front.index') }}">
                            {{ $langg->lang1 }}
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            {{ $car->title }}
                        </a>
                    </li>
                </ul>-->
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

	<!-- Single Details Area Start -->
        <section class="single-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-car">
                            <div class="model-gallery-image">
                                <div class="one-item-slider">
                                    @foreach ($car->car_images as $key => $ci)
                                    <div class="item">
                                        <figure class="main-image">
                                            <img src="{{ asset('assets/front/images/cars/featured/'.$ci->image) }}" alt="">
                                        </figure>
                                    </div>
                                    @endforeach
                                </div>
                                <ul class="all-item-slider">
                                    @foreach ($car->car_images as $key => $ci)
                                    <li class="gal-thumb"><img src="{{ asset('assets/front/images/cars/featured/'.$ci->image) }}" alt=""></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="single-car-info">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="media">
                                            <img class="align-self-center mr-3" src="..." alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="mt-0">80,205 km</h5>
                                                <p class="mb-0">Odemeter</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-car-details">
                                <h3 class="mb-4">{{ $langg->lang60 }}</h3>
                                <p>{!! $car->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @if (isset($car->is_auction) && $car->is_auction==1 && isset($car->auction_time))
                        <div class="details-info-area bid-area">
                            <div class="heading">
                                <h4 class="title">Auction Details</h4>
                                <div class="custom-timer mb-4">
                                <h5 id="countDownTimer"></h5>
                                <p>Time Remaining:</p>
                                </div>
                                
                                <ul class="details-list">
                                    @auth
                                    @if(Auth::user()->current_plan != 11)
                                    <div class="input-group mb-3">
                                        <input type ="number" name="bid_price" id="bid_price" placeholder="Bid Price" class="form-control">
                                        <div class="input-group-append">
                                            <button id = "bid" class="btn btn-custom" type="button">Bid</button>
                                        </div>
                                    </div>
                                    <!--                                    <li id="bidArea">
                                                                            <p><input type ="number" name="bid_price" id="bid_price" placeholder="Bid Price" class="form-control"></input></p>
                                                                            <P><button id = "bid" class="btn btn-md btn-custom">Bid</button></P>
                                                                        </li>-->
                                    <li>
                                        <div id="response" style="width:100%"></div>
                                    </li>
                                   
                                         
                                    @endif
                                    @else
                                    <a href="{{ route('user.login-signup') }}" class="btn btn-md btn-block btn-custom">Login to Bid</a>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="details-info-area">
                            <div class="heading">
                                <h4 class="title">
                                    {{ $langg->lang46 }}
                                </h4>
                                <ul class="details-list">
                                    @if (!empty($car->category_id))
                                    <li>
                                        <p class="label">{{ $langg->lang47 }}:</p>
                                        <P>{{ $car->category->name }}</P>
                                    </li>
                                    @endif
                                    <li>
                                        <p class="label">{{ $langg->lang50 }}:</p>
                                        <p>{{ $car->condtion->name }}</p>
                                    </li>
                                    <li>
                                        <p class="label">{{ $langg->lang52 }}:</p>
                                        <p>{{ $car->year }}</p>
                                    </li>
                                    <li>
                                        <p class="label">ODOMETER:</p>
                                        <p>{{ $car->mileage }}</p>
                                    </li>
                                    <li>
                                        <p class="label">{{ $langg->lang54 }}:</p>
                                        <p>{{ $car->brand->name }}</p>
                                    </li>
                                    <li>
                                        <p class="label">{{ $langg->lang55 }}:</p>
                                        <p>{{ $car->brand_model->name }}</p>
                                    </li>
                                    @if(!empty($car->body_type_id))
                                    <li>
                                        <p class="label">{{ $langg->lang56 }}:</p>
                                        <p>{{ $car->body_type->name }}</p>
                                    </li>
                                    @endif
                                    @if(!empty($car->fuel_type_id))
                                    <li>
                                        <p class="label">{{ $langg->lang57 }}:</p>
                                        <p>{{ $car->fuel_type->name }}</p>
                                    </li>
                                    @endif
                                    @if(!empty($car->transmission_type_id))
                                    <li>
                                        <p class="label">{{ $langg->lang58 }}:</p>
                                        <p>{{ $car->transmission_type->name }}</p>
                                    </li>
                                    @endif
                                    @if(!empty($car->cylender))
                                    <li>
                                        <p class="label">CYLINDERS:</p>
                                        <p>{{ $car->cylender }}</p>
                                    </li>
                                    @endif 

                                    @php
                                    $labels = json_decode($car->label, true);
                                    $values = json_decode($car->value, true);
                                    @endphp
                                    @if(is_array($labels))
                                    @for ($i=0; $i < count($labels); $i++)
                                    <li>
                                        <p class="label" style="text-transform:Uppercase!important;">{{ $labels[$i] }}:</p>
                                        <p>{{ $values[$i] }}</p>
                                    </li>
                                    @endfor
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="latest-post bg-light">
            <div class="container">
                <style>p.label{text-transform:capitalize !important;}</style>
                <div class="">
                    <div class="heading">
                        <h4 class="title mb-4 text-center">
                            {{ $langg->lang59 }}
                        </h4>
                    </div>

                    <div class="cars-list row">
                        @foreach ($simCars as $key => $simCar)
                        <div class="col-md-4">
                            <div class="car-info-box">
                                <div class="img-area">
                                    <img src="{{asset('assets/front/images/cars/featured/'.$simCar->featured_image)}}" alt="">
                                </div>
                                <div class="content">
                                    <a href="{{ route('front.details', $simCar->id) }}" class="d-block">
                                        <h4 class="name">

                                            {{strlen($simCar->title) > 30 ? substr($simCar->title, 0, 30) . '...' : $simCar->title}}

                                        </h4>
                                    </a>
                                    <p class="views">
                                        <span style="text-transform:Capitalize;">{{ $langg->lang66 }}</span>: {{ $simCar->views }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
	<!-- Single Details Area End -->
@endsection

@section('scripts')
@if (isset($car->is_auction) && $car->is_auction==1 && isset($car->auction_time))
	<script>
		var expiredDays = '{{date("M d, Y h:i:s", strtotime("+$car->auction_time days", strtotime($car->auction_date)))}}'
		var countDownDate = new Date(expiredDays).getTime();
		var x = setInterval(function() {
			var now = new Date().getTime();
			var distance = countDownDate - now;
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			document.getElementById("countDownTimer").innerHTML = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";
			if (distance < 0) {
				clearInterval(x);
				document.getElementById("countDownTimer").innerHTML = "EXPIRED";
				// document.getElementById("bidArea").remove();
			}
		}, 1000);

		$('#bid').on('click', function() {
			var price =$('#bid_price').val();
			var csrf = '{{csrf_token()}}'
			var car= {{$car->id}}
			if(price && car) {
				$.post( "{{route('user.car.placeBid')}}", {price : price, car: car, _token: csrf}, function( data ) {
					if(data.status==200) {
						$('#response').removeAttr('class')
						$('#response').addClass('alert alert-success')
						$('#response').html(data.Message)
					}else {
						$('#response').removeAttr('class')
						$('#response').addClass('alert alert-warning')
						$('#response').html(data.Message)
					}
				});	
			}
		})
	</script>	
@endif
<script type="text/javascript">
	var lat = {{ $car->user->latitude }};
	var long = {{ $car->user->longitude }};
	var address = "{{ $car->user->address }}";
	var mapicon = "{{ asset('assets/front/images/map-marker.png') }}";
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7eALQrRUekFNQX71IBNkxUXcz-ALS-MY&sensor=false"></script>
<script src="{{ asset('assets/front/js/map.js') }}"></script>
@endsection
