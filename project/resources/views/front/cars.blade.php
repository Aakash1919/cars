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
							<div class="filter-result-area">
							<div class="header-area">
								<h4 class="title">
									{{ $langg->lang22 }}
								</h4>
							</div>
							<div class="body-area">
								<form action="#">
									<div class="price-range-block">
											<div id="slider-range" class="price-filter-range" name="rangeInput"></div>
											<div class="livecount">
												<input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
												<span>To</span>
												<input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" />
											</div>
										</div>

										<button class="filter-btn price-btn apply-btn" type="button">{{ $langg->lang34 }}</button>
								</form>
							</div>
							</div>
							<div class="all-categories-area">
								<div class="header-area">
									<h4 class="title">
										{{ $langg->lang35 }}
									</h4>
								</div>
								<div class="body-area">
									<div class="accordion" id="accordionExample">
										<div class="card">
											<div class="card-header">
												<a class="button d-inline-block pb-2 cat-anchor" href="#" data-cat_id="" @if(empty(request()->input('category_id'))) style="color: #0056b3;" @endif>
														<i class="icofont-thin-double-right"></i> {{ $langg->lang35 }}
												</a>
											</div>
										</div>
                    @foreach ($cats as $key => $cat)
                      <div class="card">
  											<div class="card-header" id="headingOne">
													<a class="button d-inline-block pb-2 cat-anchor" href="#" data-cat_id="{{ $cat->id }}" @if($cat->id == request()->input('category_id')) style="color: #0056b3;" @endif>
  														<i class="icofont-thin-double-right"></i>{{ $cat->name }}
  												</a>
  											</div>
  										</div>
                    @endforeach


									</div>
								</div>
							</div>
							<div class="design-area">
									<div class="header-area">
											<h4 class="title">
													{{ $langg->lang36 }}
											</h4>
										</div>
										<div class="body-area">
												<ul class="filter-list brand-list">
                          @foreach ($brands as $key => $brand)
                            <li>
  														<div class="content">
  																<div class="check-box">
  																		<div class="form-check form-check-inline">
  																			<input class="form-check-input brand-check" type="checkbox" id="b{{$brand->id}}" value="{{ $brand->id }}" {{  is_array(request()->input('brand_id')) && in_array($brand->id, request()->input('brand_id')) ? 'checked' : '' }}>
  																			<span class="checkmark"></span>
  																			<label class="form-check-label brand-label" for="b{{$brand->id}}">
  																					{{ $brand->name }}
  																			</label>
  																		</div>
  																</div>
  														</div>
  													</li>
                          @endforeach
													<div class="row">
														<div class="col-lg-6">
															<button class="apply-btn filter-btn" type="button" style="width:100%;">{{ $langg->lang37 }}</button>
														</div>
														<div class="col-lg-6">
															<a href="#" id="showMore" class="d-inline-block mt-2">show more</a>
														</div>
													</div>
												</ul>
										</div>
							</div>
							<div class="categori-select-area">
								<div class="header-area">
									<h4 class="title">
										{{ $langg->lang40 }}
									</h4>
								</div>
								<div class="body-area">
									<select name="fuel_type_id" id="selFuel">
										<option selected disabled value="">{{ $langg->lang41 }}</option>
                    @foreach ($ftypes as $key => $ftype)
                    <option value="{{ $ftype->id }}" {{ request()->input('fuel_type_id') == $ftype->id ? 'selected' : '' }}>{{ $ftype->name }}</option>
                    @endforeach
									</select>
								</div>
							</div>
							<div class="categori-select-area">
								<div class="header-area">
									<h4 class="title">
										{{ $langg->lang42 }}
									</h4>
								</div>
								<div class="body-area">
                  <select name="transmission_type_id" id="selTransmission">
										<option selected disabled value="">{{ $langg->lang43 }}</option>
                    @foreach ($ttypes as $key => $ttype)
                    <option value="{{ $ttype->id }}" {{ request()->input('transmission_type_id') == $ttype->id ? 'selected' : '' }}>{{ $ttype->name }}</option>
                    @endforeach
									</select>
								</div>
							</div>
							<div class="categori-select-area">
								<div class="header-area">
									<h4 class="title">
										{{ $langg->lang44 }}
									</h4>
								</div>
								<div class="body-area">
									<select id="selCondition" name="condition_id">
                    <option value="" selected disabled>{{ $langg->lang45 }}</option>
                    @foreach ($conditions as $key => $condition)
                      <option value="{{ $condition->id }}" {{ request()->input('condition_id') == $condition->id ? 'selected' : '' }}>{{ $condition->name }}</option>
                    @endforeach
									</select>
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
											<option value="desc" {{ request()->input('sort') == 'desc' ? 'selected' : '' }}>{{ $langg->lang24 }}</option>
											<option value="asc" {{ request()->input('sort') == 'asc' ? 'selected' : '' }}>{{ $langg->lang25 }}</option>
											<option value="price_desc" {{ request()->input('sort') == 'price_desc' ? 'selected' : '' }}>{{ $langg->lang26 }}</option>
											<option value="price_asc" {{ request()->input('sort') == 'price_asc' ? 'selected' : '' }}>{{ $langg->lang27 }}</option>
										</select>
									</li>
									<li class="viewitem-no-area">
										<p>{{ $langg->lang28 }} :</p>
										<select class="short-itemby-no sel-view">
											<option value="10" {{ request()->input('view') == 10 ? 'selected' : '' }}>{{ $langg->lang29 }}</option>
											<option value="20" {{ request()->input('view') == 20 ? 'selected' : '' }}>{{ $langg->lang30 }}</option>
											<option value="30" {{ request()->input('view') == 30 ? 'selected' : '' }}>{{ $langg->lang31 }}</option>
											<option value="40" {{ request()->input('view') == 40 ? 'selected' : '' }}>{{ $langg->lang32 }}</option>
											<option value="50" {{ request()->input('view') == 50 ? 'selected' : '' }}>{{ $langg->lang33 }}</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="categori-item-area">
								<div class="row">
									@if (count($cars) == 0)
										<div class="col-lg-12 text-center">
											<h2>NO CAR FOUND</h2>
										</div>
									@else
										@foreach ($cars as $key => $car)
											<div class="col-lg-6 col-md-6">
												<a class="car-info-box" href="{{ route('front.details', $car->id) }}">
														<div class="img-area">
																<img class="light-zoom" src="{{asset('assets/front/images/cars//featured/'.$car->featured_image)}}" alt="">
														</div>
														<div class="content">
															<h4 class="title">
																{{ $car->title }}
															</h4>
															<ul class="top-meta">
																<li>
																	<i class="far fa-eye"></i> {{ $car->views }} {{ $langg->lang66 }}
																</li>
																<li>
																	<i class="far fa-clock"></i> {{ time_elapsed_string($car->created_at) }}
																</li>
															</ul>
															<ul class="short-info">
																<li class="north-west" title="Model Year">
																	<img src="{{asset('assets/front/images/calender-icon.png')}}" alt="">
																	<p>{{ $car->year }}</p>
																</li>
																<li class="north-west" title="Mileage">
																	<img src="{{asset('assets/front/images/road-icon.png')}}" alt="">
																	<p>{{ $car->mileage }}</p>
																</li>
																<li class="north-west" title="Top Speed (KMH)">
																	<img src="{{asset('assets/front/images/transformar.png')}}" alt="">
																	<p>{{ $car->top_speed }}</p>
																</li>
															</ul>
															<div class="footer-area">
																<div class="left-area">
																	@if (empty($car->sale_price))
																		<p class="price">
																			{{ $car->currency_symbol }} {{ number_format($car->regular_price, 0, '', ',') }}
																		</p>
																	@else
																		<p class="price">
																			{{ $car->currency_symbol }} {{ number_format($car->sale_price, 0, '', ',') }} <del>{{ $car->currency_symbol }} {{ number_format($car->regular_price, 0, '', ',') }}</del>
																		</p>
																	@endif
																</div>
																<div class="right-area">
																	<p class="condition">
																		{{ $car->condtion->name }}
																	</p>
																</div>
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

	<form id="searchForm" class="d-none" action="{{ route('front.cars') }}" method="get">
		<input type="text" name="minprice" value="{{ !empty(request()->input('minprice')) ? request()->input('minprice') : $minprice }}">
		<input type="hidden" name="maxprice" value="{{ !empty(request()->input('maxprice')) ? request()->input('maxprice') : $maxprice }}">
		<input type="hidden" name="category_id" value="{{ !empty(request()->input('category_id')) ? request()->input('category_id') : null }}">
		@if (!empty(request()->input('brand_id')))
			@php
				$brands = request()->input('brand_id');
			@endphp
			@foreach ($brands as $key => $brand)
				<input type="hidden" name="brand_id[]" value="{{ $brand }}">
			@endforeach
		@endif
		<input type="hidden" name="fuel_type_id" value="{{ !empty(request()->input('fuel_type_id')) ? request()->input('fuel_type_id') : null }}">
		<input type="hidden" name="transmission_type_id" value="{{ !empty(request()->input('transmission_type_id')) ? request()->input('transmission_type_id') : null }}">
		<input type="hidden" name="condition_id" value="{{ !empty(request()->input('condition_id')) ? request()->input('condition_id') : null }}">
		<input type="hidden" name="type" value="{{ !empty(request()->input('type')) ? request()->input('type') : 'all' }}">
		<input type="hidden" name="sort" value="{{ !empty(request()->input('sort')) ? request()->input('sort') : 'desc' }}">
		<input type="hidden" name="view" value="{{ !empty(request()->input('view')) ? request()->input('view') : 10 }}">
		<button type="submit"></button>
	</form>

@endsection


@section('scripts')
<script>
  var minprice = {{ $minprice }};
  var maxprice = {{ $maxprice }};

  // pricing range
  $(document).ready(function() {
      $("#price-range-submit").hide(), $("#min_price,#max_price").on("change", function() {
          $("#price-range-submit").show();
          var e = parseInt($("#min_price").val()),
              i = parseInt($("#max_price").val());
          e > i && $("#max_price").val(e), $("#slider-range").slider({
              values: [e, i]
          })
      }), $("#min_price,#max_price").on("paste keyup", function() {
          $("#price-range-submit").show();
          var e = parseInt($("#min_price").val()),
              i = parseInt($("#max_price").val());
          e == i && (i = e + 100, $("#min_price").val(e), $("#max_price").val(i)), $("#slider-range").slider({
              values: [e, i]
          })
      }), $(function() {
          $("#slider-range").slider({
              range: !0,
              orientation: "horizontal",
              min: minprice,
              max: maxprice,
              values: [{{ !empty(request()->input('minprice')) ? request()->input('minprice') : $minprice }}, {{ !empty(request()->input('maxprice')) ? request()->input('maxprice') : $maxprice }}],
              step: 50,
              slide: function(e, i) {
                  if (i.values[0] == i.values[1]) return !1;
                  $("#min_price").val(i.values[0]), $("#max_price").val(i.values[1])
              }
          }), $("#min_price").val($("#slider-range").slider("values", 0)), $("#max_price").val($("#slider-range").slider("values", 1))
      }), $("#slider-range,#price-range-submit").click(function() {
          var e = $("#min_price").val(),
              i = $("#max_price").val();
          $("#searchResults").text("Here List of products will be shown which are cost between " + e + " and " + i + ".")
      })
  });
  </script>


  <script>
    $(document).ready(function() {
      $(".brand-list li").each(function(i) {
        if (i < 6) {
          $(this).addClass('d-block');
        } else {
          $(this).addClass('d-none addbrand');
        }
      });

      $("#showMore").on('click', function(e) {
        e.preventDefault();

        let btntxt = $(e.target).html();

        if (btntxt == 'show more') {
          $(e.target).html('show less');
        } else {
          $(e.target).html('show more');
        }

        $(".brand-list li").each(function() {
          if($(this).hasClass('addbrand')) {
            $(this).toggleClass('d-none');
          }
        });
      })
    })
  </script>



	{{-- Populate search form with values --}}
	<script>
		$(document).ready(function() {

			$(".price-btn").click(function() {
				$("input[name='minprice']").val($("#min_price").val());
				$("input[name='maxprice']").val($("#max_price").val());
			});

			$(".cat-anchor").click(function(e) {
				e.preventDefault();
				$("input[name='category_id']").val($(this).data('cat_id'));
				$("#searchForm").trigger('submit');
			});

			$(".brand-check").on("click", function() {
				if ($("input[name='brand_id[]']").length > 0) {
					$("input[name='brand_id[]']").remove();
				}
				$(".brand-check").each(function() {
					if ($(this).prop("checked")) {
						// console.log($(this).prop("checked"));
						$("#searchForm").append(`<input type="hidden" name="brand_id[]" value="${$(this).val()}">`);
					}
				});
			});

			$("#selFuel").on('change', function() {
				$("input[name='fuel_type_id']").val($(this).val());
				$("#searchForm").trigger('submit');
			});

			$("#selTransmission").on('change', function() {
				$("input[name='transmission_type_id']").val($(this).val());
				$("#searchForm").trigger('submit');
			});

			$("#selCondition").on('change', function() {
				$("input[name='condition_id']").val($(this).val());
				$("#searchForm").trigger('submit');
			});

			$(".apply-btn").on('click', function() {
				$("#searchForm").trigger('submit');
			});

			$(".sel-sort").on('change', function() {
				$("input[name='sort']").val($(this).val());
				$("#searchForm").trigger('submit');
			});

			$(".sel-view").on('change', function() {
				$("input[name='view']").val($(this).val());
				$("#searchForm").trigger('submit');
			});
		})
	</script>

@endsection
