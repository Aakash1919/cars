@extends('layouts.user')

@section('styles')
<link href="{{asset('assets/admin/css/jquery.Jcrop.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/admin/css/Jcrop-style.css')}}" rel="stylesheet"/>
<style media="screen">
  .heading {
    font-size: 16px;
  }
  .add-product-content .product-description .body-area .row {
      margin-bottom: 0px;
  }
  .input-field {
      padding-left: 0px;
  }
  select {
    padding-left: 0px;
  }
  .featured-image .span4.cropme {
      width: 300px;
      height: 164px;
  }
</style>
@endsection

@section('content')
<div class="">
			<div class="page-content">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a></li>
                <li class="breadcrumb-item active"  aria-current="page"><a href="{{ route('user.car.create') }}">{{$langg->lang96}} </a></li>
							</ol>
						</nav>
					</div>
  </div>
  <div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add New Car</h5>
					  <hr/>
            <form class="add-form" id="geniusform" action="{{ route('user.car.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            {{csrf_field()}}
            <div class="row hidden" style="display:none;">
			<input type="hidden" name="is_auction" value='1'>
			<input type="hidden" id="feature_photo" name="image" value="">
			<input type="hidden" id="featuredImage" name="featured_image" value="">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-6">
                      <h4 class="heading mb-0">{{$langg->lang105}} *</h4>
                      <input class="input-field" type="text" name="currency_code" placeholder="{{$langg->lang101}} {{$langg->lang105}}" value="AUD">
                    </div>
                    <div class="col-lg-6">
                      <h4 class="heading mb-0">{{$langg->lang106}} *</h4>
                      <input class="input-field" type="text" name="currency_symbol" placeholder="{{$langg->lang101}} {{$langg->lang106}}" value="$">
                    </div>
                  </div>
				  <div class="col-lg-3">
                      <h4 class="heading mb-0">{{$langg->lang107}} *</h4>
                      <input class="input-field" type="text" name="regular_price" placeholder="{{$langg->lang101}} {{$langg->lang107}}" value="0">
                    </div>
                    <div class="col-lg-3">
                      <h4 class="heading mb-0">{{$langg->lang108}} </h4>
                      <input class="input-field" type="text" name="sale_price" placeholder="{{$langg->lang101}} {{$langg->lang108}}" value="0">
                    </div>
                </div>
              </div>
            <div class="row">
                <div class="col-lg-7 offset-lg-3">
                  @include('includes.admin.form-both')
                </div>
            </div>
              <div class="form-body mt-4">
					    <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
							<div class="mb-3">
								<label for="title" class="form-label">{{$langg->lang102}} *</label>
								<input class="form-control" id="title" type="text" name="title" placeholder="{{$langg->lang101}} {{$langg->lang102}}" value="">
							  </div>
							  <div class="mb-3">
								<label for="nicDesc" class="form-label">{{$langg->lang126}} *</label>
								<textarea id="nicDesc" name="description" class="form-control nic-edit" rows="8" cols="80"></textarea>
							  </div>
                            </div>
							<hr/>
							<div class="border border-3 p-4 rounded">
							<div class="col-12" id="app">
							<label class="form-label">{{$langg->lang130}} </label>

							<div id="'spec'+n" class="row specs" v-for="n in count" style="margin-top:10px;margin-bottom:10px;">
							<div class="col-lg-5">
								<input type="text" class="form-control" name="label[]" placeholder="{{$langg->lang131}}" required="" value="">
							</div>
							<div class="col-lg-5">
								<input type="text" class="form-control" name="value[]" placeholder="{{$langg->lang132}}" required="" value="">
							</div>
							<div class="col-lg-2">
								<button type="button" class="btn btn-danger btn-sm" @click="subspec(n)"><i class="fas fa-minus-square"></i></button>
							</div>
							</div>
							<div class="row">
							<div class="col-lg-12">
								<button type="button" class="btn btn-primary btn-sm" @click="addspec()"><i class="fas fa-plus-square"></i>&nbsp; {{$langg->lang133}}</button>
							</div>
							</div>
							</div>
						</div>
						   </div>
						   <div class="col-lg-4">
							<div class="border border-3 p-4 rounded">
                  			<div class="row g-3">
								      <div class="col-md-6">
                          <label for="category_id" class="form-label">{{$langg->lang103}}</label>
                          <select id="category_id" class="searchable-select input-field form-select" name="category_id">
                            <option value="Select a brand" disabled selected>{{$langg->lang104}}</option>
                            @foreach ($cats as $key => $cat)
                              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                          </select>
                       </div>
					   <div class="col-md-6">
					   <label for="brand_id" class="form-label">{{$langg->lang114}} *</label>
						<select class="form-select" id="brand_id" name="brand_id" onchange="getModels(this.value)">
							<option value="Select a brand" disabled selected>{{$langg->lang115}}</option>
							@foreach ($brands as $key => $brand)
							<option value="{{ $brand->id }}">{{ $brand->name }}</option>
							@endforeach
							</select>
					   </div>
					   <div class="col-md-6">
					   <label for="selectModels" class="form-label">{{$langg->lang116}} *</label>
						<select class="form-select" id="selectModels" name="brand_model_id">
							
							<option value="Select a model" disabled selected>{{$langg->lang117}}</option>
							</select>
					   </div>
						<div class="col-md-6">
								<label for="mileage" class="form-label">{{$langg->lang113}} (km) *</label>
								<input type="bumber" class="form-control" id="mileage" name="mileage" placeholder="1234">
						</div>
						<div class="col-md-6">
						<label for="year" class="form-label">{{$langg->lang112}} *</label>
						<input type="number" class="form-control" id="year" name="year" placeholder="e.g. 1999" min="1990">
						</div>
						<div class="col-md-6">
							<label for="body_type_id" class="form-label">{{$langg->lang118}} *</label>
							<select class="searchable-select form-control" name="body_type_id">
							<option value="Select a brand" disabled selected>{{$langg->lang119}}</option>
							@foreach ($btypes as $key => $btype)
							<option value="{{ $btype->id }}">{{ $btype->name }}</option>
							@endforeach
						</select>
						</div>
						<div class="col-6">
						<label for="fuel_type_id" class="form-label">{{$langg->lang120}}</label>
							<select class="searchable-select form-control" name="fuel_type_id" id="fuel_type_id">
								<option value="Select a brand" disabled selected>{{$langg->lang121}}</option>
								@foreach ($ftypes as $key => $ftype)
								<option value="{{ $ftype->id }}">{{ $ftype->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-6">
						<label for="transmission_type_id" class="form-label">{{$langg->lang122}} </label>
						<select class="searchable-select form-control" name="transmission_type_id" id="transmission_type_id">
                        <option value="Select a brand" disabled selected>{{$langg->lang123}}</option>
                        @foreach ($ttypes as $key => $ttype)
                          <option value="{{ $ttype->id }}">{{ $ttype->name }}</option>
                        @endforeach
                      </select>
						</div>
						<div class="col-6">
						<label for="condtion_id" class="form-label">{{$langg->lang124}} *</label>
							<select class="searchable-select form-control" name="condtion_id" id="condtion_id">
							<option value="Select a brand" disabled selected>{{$langg->lang125}}</option>
							@foreach ($conditions as $key => $condition)
							<option value="{{ $condition->id }}">{{ $condition->name }}</option>
							@endforeach
						</select>
						</div>
						<div class="col-6">
						<label for="auction_time" class="form-label">{{$langg->lang183}} </label>
							<select class="form-control" name="auction_time" id="auction_time">
							<option value="" selected>{{$langg->lang184}}</option>
							<option value="{{ \Crypt::encrypt(1) }}" >{{$langg->lang185}}</option>
							<option value="{{ \Crypt::encrypt(3) }}" >{{$langg->lang186}}</option>
							<option value="{{ \Crypt::encrypt(7) }}" >{{$langg->lang187}}</option>
						</select>
						</div>

						<div class="col-12">
							<div class="d-grid">
								<button type="submit" class="btn btn-primary addProductSubmit-btn">{{$langg->lang134}}</button>
							</div>
						</div>
						</div> 
						
						
						  </div>
						
						  
						  </div>
						  
					   </div><!--end row-->
					   
          </form>
		  				
					</div>
					
				  </div>
				  
			  </div>
			  <div class="row">
				
						<div class="col-md-6">
						<div class="card">
						<div class="card-body">
						<h5 class="card-title">Featured Image</h5>
						<hr>
								<form id="featuredimg" action="#" class="dropzone" method="post" enctype="multipart/form-data">
										<input type="hidden" name="_token" value={{csrf_token()}}>
										<div class="dz-message">
										<div class="font-22 text-primary">	<i class="lni lni-cloud-upload"></i>
										</div>	
										Drop files here or click to upload.
									
										</div>
										<div class="fallback"><input type="file" name="image" /></div>
									</form>
						</div>
					</div>
					</div>
						<div class="col-md-6">
						<div class="card">
						<div class="card-body">
						<h5 class="card-title">Gallery Images </h5>
						<hr>
								<form id="galleryimg" action="#" class="dropzone" method="post" enctype="multipart/form-data">
										<input type="hidden" name="_token" value={{csrf_token()}}>
										<div class="dz-message">
										<div class="font-22 text-primary">	<i class="lni lni-cloud-upload"></i>
										</div>	
										Drop files here or click to upload.
									
										</div>
										<div class="fallback"><input type="file" name="image" /></div>
									</form>
						</div>
						</div>
				</div>
			</div>
</div>
</div>
@endsection

@section('scripts')
 <!-- Old Data-->
 <script>


      function getModels(brandid) {
        var url = '{{ url('/') }}' + '/car/'+brandid+'/models';
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

    var app = new Vue({
      el: '#app',
      data: {
        count: 0
      },
      methods: {
        addspec() {
          this.count++;
        },
        subspec(n) {
          $("#spec"+n).remove();
        },
        subexspec(n) {
          $("#exspec"+n).remove();
        }
      }
    })

    </script>
	@endsection
