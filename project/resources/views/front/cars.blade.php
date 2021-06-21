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
                    <ul class="pages">
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- sub-categori Area Start -->
    <section class="sub-categori">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="left-area">
                        <h4>Search Filters</h4>
                        <div class="main-filter">
                            <div class="custom-filter">

                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="make">
                                            <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <p class="mb-0">
                                                    Make
                                                </p>
                                            </span>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="make"
                                            data-parent="#accordion">
                                            <div class="card-body overflow-y">
                                                <ul class="filter-list-count">
                                                    @foreach ($brands as $key => $brand)
                                                        <li><a href="#" class="car_make" id="{{$brand->id}}"><span> {{ $brand->name }}</span>
                                                                <span>({!! get_car_by_make($brand->id) !!})</span></a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-filter d-none">
                                <h5>Model</h5>
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                            value="option1" aria-label="..."> M3 Coupe (2)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                            value="option1" aria-label="..."> M3 (5)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                            value="option1" aria-label="..."> i300 (1)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                            value="option1" aria-label="..."> i720 (25)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                            value="option1" aria-label="..."> i8 (15)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                            value="option1" aria-label="..."> Sedan i220 (9)
                                    </label>
                                </div>
                            </div>
                            <div class="year-filter custom-filter">
                                <h5>Year</h5>
                                <form>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>From</label>
                                                <input type="number" class="form-control" value="2015">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>To</label>
                                                <input type="number" class="form-control" value="2021">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <button class="btn btn-md btn-custom">Apply</button> --}}
                                </form>
                            </div>
                            <div class="custom-filter">
                                <h5>Transmission</h5>
                                @foreach ($ttypes as $key => $ttype)
                                    <div class="form-check">
                                        <label>
                                            <input class="form-check-input position-static" type="checkbox"
                                                id="blankCheckbox" value="{{ $ttype->id }}" aria-label="..."
                                                {{ request()->input('transmission_type_id') == $ttype->id ? 'checked' : '' }}>
                                            {{ $ttype->name }} (35)
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            {{-- <div class="custom-filter">
                                <h5>Engine Capacity</h5>
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                            value="option1" aria-label="..."> 1.2L (35)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                            value="option1" aria-label="..."> 1.6L (20)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                            value="option1" aria-label="..."> 1.8L (20)
                                    </label>
                                </div>
                            </div> --}}
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
                                        <option value="desc" {{ request()->input('sort') == 'desc' ? 'selected' : '' }}>
                                            {{ $langg->lang24 }}</option>
                                        <option value="asc" {{ request()->input('sort') == 'asc' ? 'selected' : '' }}>
                                            {{ $langg->lang25 }}</option>
                                    </select>
                                </li>
                                <li class="viewitem-no-area">
                                    <p>{{ $langg->lang28 }} :</p>
                                    <select class="short-itemby-no sel-view">
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
                                                        style="max-height: 220px; object-fit: cover;" alt="">
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
                                                            <i class="far fa-clock"></i> 12:51:30
                                                        </li>
                                                    </ul>
                                                    <ul class="short-info">
                                                        <li class="north-west">
                                                            <small>Transmission</small>
                                                            <p>Automatic</p>
                                                        </li>
                                                        <li class="north-west">
                                                            <small>Engine </small>
                                                            <p>1.6L</p>
                                                        </li>
                                                    </ul>
                                                    <div class="footer-area">
                                                        <i class="fas fa-map-marker-alt"></i> Wetherill Park
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
    <!-- sub-categori Area End -->

@endsection


@section('scripts')
    <script>
        $(document).on('click', '.car_make', function() {
            var make = $(this).attr('id')
           
            $.get( "{{route('filter')}}", {make : make}, function( data ) {
                document.getElementById('carContent').innerHTML = ''
                setCarHTML(data)
                // setModel(data)

                $(window).scrollTop(0);
                
            });
        })

        function setCarHTML(data) {
            var image, route, html = ''
            if(data.status==200 && data.data.length > 0) {
                    $.each(data.data, function (index, value) {
                    image = "/assets/front/images/cars/featured/"+value.featured_image
                    route = "/details/"+value.id
                    html += '<div class="col-lg-6 col-md-6">'
                    html +='<a class="car-info-box" href="'+route+'">'
                    html +='<div class="img-area">'
                    html +='<img class="light-zoom" src="'+image+'" style="max-height: 220px; object-fit: cover;" alt=""></div>'
                    html +='<div class="content"><h4 class="title"'+value.title+'</h4>'
                    html +='<ul class="top-meta"><li><i class="far fa-eye"></i> '+value.views+'{{ $langg->lang66 }}</li><li><i class="far fa-clock"></i> 12:51:30</li></ul>'
                    html +='<ul class="short-info"><li class="north-west"><small>Transmission</small><p>Automatic</p></li><li class="north-west"><small>Engine </small><p>1.6L</p></li></ul>'
                    html +='<div class="footer-area"><i class="fas fa-map-marker-alt"></i> Wetherill Park</div>'
                    html +='</div></a></div>';
                });
                    document.getElementById('carContent').innerHTML = html
                }else {
                    document.getElementById('carContent').innerHTML = ' <div class="col-lg-12 text-center"><h2>NO CAR FOUND</h2></div>'
                }
        }
        </script>

@endsection
