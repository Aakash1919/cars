@extends('layouts.front')

@section('content')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="pagetitle">
                    {{ $langg->lang301 }}
                </h1>
                <!--                    <ul class="pages">
                                        <li>
                                            <a href="{{ route('front.index') }}">
                                                {{ $langg->lang1 }}
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="#">
                                                {{ $langg->lang301 }}
                                            </a>
                                        </li>
                                    </ul>-->
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- sub-categori Area Start -->
<form>
    <section class="sub-categori">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="left-area">
                        <h4>Refine Search</h4>
                        <div class="main-filter">
                            <div class="custom-filter">
                                <input type="hidden" id="makeId" name="brand_id"
                                       value="{{ request()->input('brand_id') ? request()->input('brand_id') : '' }}">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="make">
                                            <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                  aria-controls="collapseOne">
                                                <p class="mb-0" id="highlightedMake" data-id="">
                                                    {{ request()->input('brand_id') ? get_car_by_make(request()->input('brand_id')) : 'Make' }}
                                                </p>
                                            </span>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="make"
                                             data-parent="#accordion">
                                            <div class="card-body overflow-y">
                                                <ul class="filter-list-count">
                                                    @foreach ($brands as $key => $brand)
                                                    <li><a href="#" class="car_make" id="{{ $brand->id }}"
                                                           data-name="{{ $brand->name }}"><span>
                                                                {{ $brand->name }}</span>
                                                            <span>({!! get_car_count_by_make($brand->id, 'brand_id') !!})</span></a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-filter">
                                <h5>Model</h5>
                                <div id="modelDiv">
                                    <div class="form-check">
                                        @if (request()->input('brand_id'))
                                        @foreach (get_models_by_make(request()->input('brand_id')) as $item)
                                        <div class="form-check">
                                            <label>
                                                <input class="form-check-input position-static model"
                                                       name="brand_model_id[]" type="checkbox" value="{{$item->id}}"
                                                       aria-label="..." {{ is_array(request()->input('brand_model_id')) && in_array($item->id, request()->input('brand_model_id')) ? 'checked' : ''}}>{{$item->name}}
                                            </label>
                                        </div>
                                        @endforeach
                                        @else
                                        <label>No Make Selected</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="year-filter custom-filter">
                                <h5>Year</h5>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input type="number" class="form-control" name="year_from" value="{{ request()->input('year_from') ? request()->input('year_from') : '2015' }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input type="number" class="form-control" name="year_to" value="{{ request()->input('year_to') ? request()->input('year_to') : '2021' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-filter">
                                <h5>Transmission</h5>
                                @foreach ($ttypes as $key => $ttype)
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input position-static" type="checkbox"
                                               name="transmission_type_id[]" id="blankCheckbox"
                                               value="{{ $ttype->id }}" aria-label="..."
                                               {{ is_array(request()->input('transmission_type_id')) && in_array($ttype->id, request()->input('transmission_type_id')) ? 'checked' : ''}}>
                                               {{ $ttype->name }} ({!! get_car_count_by_make($ttype->id, 'transmission_type_id') !!})
                                    </label>
                                </div>
                                @endforeach

                                <button type="submit" class="btn btn-md btn-custom">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-first order-lg-last">
                    <div class="right-area">
                        <div class="item-filter">
                            <ul class="filter-list">
                                <li class="item-short-area">
                                    <p>{{ $langg->lang23 }} :</p>
                                    <select class="short-item sel-sort" name="sort">
                                        <option value="desc"
                                                {{ request()->input('sort') == 'desc' ? 'selected' : '' }}>
                                                {{ $langg->lang24 }}</option>
                                        <option value="asc"
                                                {{ request()->input('sort') == 'asc' ? 'selected' : '' }}>
                                                {{ $langg->lang25 }}</option>
                                    </select>
                                </li>
                                <li class="viewitem-no-area">
                                    <p>{{ $langg->lang28 }} :</p>
                                    <select class="short-itemby-no sel-view" name="view">
                                        <option value="10" {{ request()->input('view') == 10 ? 'selected' : '' }}>
                                                {{ $langg->lang29 }}</option>
                                        <option value="20" {{ request()->input('view') == 20 ? 'selected' : '' }}>
                                                {{ $langg->lang30 }}</option>
                                        <option value="30" {{ request()->input('view') == 30 ? 'selected' : '' }}>
                                                {{ $langg->lang31 }}</option>
                                        <option value="40" {{ request()->input('view') == 40 ? 'selected' : '' }}>
                                                {{ $langg->lang32 }}</option>
                                        <option value="50" {{ request()->input('view') == 50 ? 'selected' : '' }}>
                                                {{ $langg->lang33 }}</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="categori-item-area">
                            <div class="row" id="carContent">
                                @if (count($cars) == 0)
                                <div class="col-lg-12 text-center">
                                    <h2>NO CAR FOUND</h2>
                                </div>
                                @else
                                @foreach ($cars as $key => $car)
                                <div class="col-lg-6 col-md-6">
                                    <a class="car-info-box" href="{{ route('front.details', $car->id) }}">
                                        <div class="img-area">
                                            <img class="light-zoom"
                                                 src="{{ asset('assets/front/images/cars//featured/' . $car->featured_image) }}"
                                                 style="max-height: 220px; object-fit: cover; min-height: 220px;" alt="">
                                        </div>
                                        <div class="content">
                                            <h4 class="title">
                                                {{ $car->title }}
                                            </h4>
                                            <ul class="top-meta">
                                                <li>
                                                    <i class="far fa-eye"></i> {{ $car->views }}
                                                    {{ $langg->lang66 }}
                                                </li>
                                                <li>
                                                    <i class="far fa-clock"></i> <span id="timer_{{ $car->id }}">1417539</span>
                                                    @php
                                                    $seconds = strtotime("+$car->auction_time days", strtotime($car->auction_date)) - strtotime(date('Y-m-d h:i:s', time()));
                                                    $seconds = $seconds > 0 ? $seconds : 0;
                                                    @endphp
                                                    <script type="text/javascript">
                                                        $(document).ready(function(){
                                                        $('#timer_{{ $car->id }}').backward_timer({
                                                        seconds: {{$seconds}},
                                                                format: 'd%d h%:m%:s%',
                                                                on_tick: function(timer) {
                                                                var color = ((timer.seconds_left % 2) == 0)? "#F82828": "#009CFF";
                                                                timer.target.css('color', color);
                                                                }
                                                        });
                                                        $('#timer_{{ $car->id }}').backward_timer('start');
                                                        });
                                                    </script>
                                                </li>
                                            </ul>
                                            <ul class="short-info">
                                                <li class="north-west">
                                                    <small>Transmission</small>
                                                    <p>{{ get_transmission_by_id($car->transmission_type_id) }}
                                                    </p>
                                                </li>
                                                <li class="north-west">
                                                    <small>Cylinders </small>
                                                    <p>{{$car->cylender}}</p>
                                                </li>
                                            </ul>
                                            <div class="footer-area">
                                                <i class="fas fa-map-marker-alt"></i> {{ $car->suburb }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                @endif

                                <div class="col-12 text-center">
                                    {{ $cars->appends(['minprice' => request()->input('minprice'), 'maxprice' => request()->input('maxprice'), 'category_id' => request()->input('category_id'), 'fuel_type_id' => request()->input('fuel_type_id'), 'transmission_type_id' => request()->input('transmission_type_id'), 'condition_id' => request()->input('condition_id'), 'brand_id' => request()->input('brand_id'), 'type' => request()->input('type'), 'sort' => request()->input('sort'), 'view' => request()->input('view')])->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<!-- sub-categori Area End -->

@endsection


@section('scripts')

<script>
    $(document).on('click', '.car_make', function() {
    var make = $(this).attr('id')
            var makeName = $(this).attr('data-name')
            filter(make, makeName)
    })


            function filter(make, makeName, html) {
            if (make && makeName) {
            $.get("{{ route('filter') }}", {
            make: make
            }, function(data) {
            document.getElementById('carContent').innerHTML = ''
                    setCarHTML(data)
                    document.getElementById('highlightedMake').innerHTML = makeName
                    setModel(data)
                    $('#makeId').val(make)
                    $(window).scrollTop(0);
            });
            }

            }

    function setCarHTML(data) {
    var image, route, html = ''
            if (data.status == 200 && data.data.length > 0) {
    $.each(data.data, function(index, value) {
    image = "/assets/front/images/cars/featured/" + value.featured_image
            route = "/details/" + value.id
            html += '<div class="col-lg-6 col-md-6">'
            html += '<a class="car-info-box" href="' + route + '">'
            html += '<div class="img-area">'
            html += '<img class="light-zoom" src="' + image +
            '" style="max-height: 220px; object-fit: cover;" alt=""></div>'
            html += '<div class="content"><h4 class="title"' + value.title + '</h4>'
            html += '<ul class="top-meta"><li><i class="far fa-eye"></i> ' + value.views +
            '{{ $langg->lang66 }}</li><li><i class="far fa-clock"></i> 12:51:30</li></ul>'
            html +=
            '<ul class="short-info"><li class="north-west"><small>Transmission</small><p>Automatic</p></li><li class="north-west"><small>Engine </small><p>1.6L</p></li></ul>'
            html += '<div class="footer-area"><i class="fas fa-map-marker-alt"></i> Wetherill Park</div>'
            html += '</div></a></div>';
    });
    document.getElementById('carContent').innerHTML = html
    } else {
    document.getElementById('carContent').innerHTML =
            ' <div class="col-lg-12 text-center"><h2>NO CAR FOUND</h2></div>'
    }
    }

    function setModel(data) {
    var html = ''
            if (data.status == 200 && data.model.length > 0) {
    $.each(data.model, function(index, value) {
    html +=
            '<div class="form-check"><label><input class="form-check-input position-static model" name="brand_model_id[]" type="checkbox" value="' +
            value.id + '" aria-label="...">' + value.name + '</label></div>'
    })
            $('#modelDiv').show()
    } else {
    $('#modelDiv').hide()
    }
    document.getElementById('modelDiv').innerHTML = html;
    }
</script>

@endsection
