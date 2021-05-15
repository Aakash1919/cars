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

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Add Car </h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('user-dashboard') }}">Dashboard </a>
                        </li>
                        <li>
                          <a href="javascript:;">Profile </a>
                        </li>
                        <li>
                          <a href="{{ route('user.car.create') }}">Add Car </a>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">

                      <div class="gocover" style="background: url({{ asset('assets/images/spinner.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>

                      <form class="add-form" id="geniusform" action="{{ route('user.car.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        {{csrf_field()}}

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            @include('includes.admin.form-both')
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <h4 class="heading mb-0">Title *</h4>
                                <input class="input-field" type="text" name="title" placeholder="Enter Title" value="">
                              </div>
                              <div class="col-lg-6">
                                <h4 class="heading mb-0">Category</h4>
                                <select class="searchable-select input-field" name="category_id">
                                  <option value="Select a brand" disabled selected>Select a category</option>
                                  @foreach ($cats as $key => $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-4">
                                <h4 class="heading mb-0">Regular Price *</h4>
                                <input class="input-field" type="text" name="regular_price" placeholder="Enter Regular Price" value="">
                              </div>
                              <div class="col-lg-4">
                                <h4 class="heading mb-0">Sale Price </h4>
                                <input class="input-field" type="text" name="sale_price" placeholder="Enter Sale Price" value="">
                              </div>
                              <div class="col-lg-4">
                                <h4 class="heading mb-0">Negotiable </h4>
                                <div class="form-check form-check-inline mt-4">
                                  <input class="form-check-input" type="radio" name="negotiable" id="inlineRadio1" value="1">
                                  <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="negotiable" id="inlineRadio2" value="0" checked>
                                  <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <h4 class="heading mb-0">Year *</h4>
                                <input class="input-field" type="text" name="year" placeholder="Enter Year" value="">
                              </div>
                              <div class="col-lg-6">
                                <h4 class="heading mb-0">Mileage *</h4>
                                <input class="input-field" type="text" name="mileage" placeholder="Enter Mileage" value="">
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <h4 class="heading mb-0">Brand *</h4>
                                <select class="searchable-select input-field" name="brand_id" onchange="getModels(this.value)">
                                  <option value="Select a brand" disabled selected>Select a brand</option>
                                  @foreach ($brands as $key => $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-lg-6">
                                <h4 class="heading mb-0">Model *</h4>
                                <select class="model" name="brand_model_id" id="selectModels">
                                  <option value="Select a model" disabled selected>Select a model</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <h4 class="heading mb-0">Body Type </h4>
                                <select class="searchable-select input-field" name="body_type_id">
                                  <option value="Select a brand" disabled selected>Select a body type</option>
                                  @foreach ($btypes as $key => $btype)
                                    <option value="{{ $btype->id }}">{{ $btype->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-lg-6">
                                <h4 class="heading mb-0">Fuel Type </h4>
                                <select class="searchable-select input-field" name="fuel_type_id">
                                  <option value="Select a brand" disabled selected>Select a fuel type</option>
                                  @foreach ($ftypes as $key => $ftype)
                                    <option value="{{ $ftype->id }}">{{ $ftype->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <h4 class="heading mb-0">Transmission Type </h4>
                                <select class="searchable-select input-field" name="transmission_type_id">
                                  <option value="Select a brand" disabled selected>Select a body type</option>
                                  @foreach ($ttypes as $key => $ttype)
                                    <option value="{{ $ttype->id }}">{{ $ttype->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-lg-6">
                                <h4 class="heading mb-0">Condition *</h4>
                                <select class="searchable-select input-field" name="condition_id">
                                  <option value="Select a brand" disabled selected>Select a condition</option>
                                  @foreach ($conditions as $key => $condition)
                                    <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="row">
                              <div class="col-lg-12">
                                <h4 class="heading mb-4">Description *</h4>
                                <textarea id="nicDesc" name="description" class="form-control nic-edit" rows="8" cols="80"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>



                          <div class="row images">
                            <div class="col-lg-7 offset-lg-3">
                               <h4 class="heading mb-4">Slider Images *</h4>

                               <div class="uploaded-images" id="uploadedImages" class="mb-4">

                               </div>

                                <div class="panel panel-body">
                                  <div class="span4 cropme text-center">
                                  </div>
                                </div>

                                <a href="javascript:;" class="d-inline-block mybtn1 crop-image mt-2">
                                  <i class="icofont-upload-alt"></i> Choose Image
                                </a>
                                <button id="saveBtn" class="d-none mybtn1 mt-2" type="button" name="button">SAVE TO GALLERY</button>

                            </div>
                          </div>


                          <input type="hidden" id="feature_photo" name="image" value="">


                          <div class="row mt-5 featured-image">
                            <input type="hidden" id="featuredImage" name="featured_image" value="">
                            <div class="col-lg-7 offset-lg-3">
                               <h4 class="heading mb-4">Featured Image *</h4>

                                <div class="panel panel-body">
                                  <div class="span4 cropme text-center">
                                  </div>
                                </div>

                                <a href="javascript:;" class="d-inline-block mybtn1 mt-2 crop-image">
                                  <i class="icofont-upload-alt"></i> Choose Image
                                </a>

                            </div>
                          </div>


                          <div class="row mt-5" id="app">
                            <div class="col-lg-8 offset-lg-3">
                              <h4 class="heading">Specifications </h4>

                              <div :id="'spec'+n" class="row specs" v-for="n in count">
                                <div class="col-lg-5">
                                  <input type="text" class="input-field" name="label[]" placeholder="Label" required="" value="">
                                </div>
                                <div class="col-lg-5">
                                  <input type="text" class="input-field" name="value[]" placeholder="Value" required="" value="">
                                </div>
                                <div class="col-lg-2">
                                  <button type="button" class="btn btn-danger mt-3" @click="subspec(n)"><i class="fas fa-minus-square text-white"></i></button>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <button type="button" class="btn btn-success mt-4" @click="addspec()"><i class="fas fa-plus-square text-white"></i>&nbsp; Add Specification</button>
                                </div>
                              </div>
                            </div>

                            </div>



                          <div class="row">
                            <div class="col-lg-3">
                              <div class="left-area">

                              </div>
                            </div>
                            <div class="col-lg-7 text-center">
                              <button class="addProductSubmit-btn mt-4" type="submit">Submit</button>
                            </div>
                          </div>
                        </div>

                      </form>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection

@section('scripts')

  {{-- Multiple images & Featured image --}}
  <script src="{{asset('assets/admin/js/jquery.Jcrop.js')}}"></script>
  <script>
    var v_aspX = 730;
    var v_aspY = 489;

    //
    $('.cropme').on('click', function() {
      if ($(this).parents().is('.images')) {
        v_aspX = 730;
        v_aspY = 489;
      }
      else if ($(this).parents().is('.featured-image')) {
        v_aspX = 350;
        v_aspY = 190;
      }
    });
  </script>
  <script src="{{asset('assets/admin/js/jquery.SimpleCropper.js')}}"></script>

  <script type="text/javascript">
    $('.cropme').simpleCropper();
    $('.crop-image').on('click',function(){
      $(this).siblings('.panel').find('.cropme').click();
    });
  </script>


    <script type="text/javascript">

    function removeimg(e) {
      $( e.target ).parents('.image').remove();
    }

    $(document).ready(function() {

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#saveBtn').on('click', function () {

          $("#saveBtn").toggleClass('d-none');

        	var img = $('#feature_photo').val();
          $(".images .span4.cropme").html('');
          $("#uploadedImages").append(
            `<div class="image">
               <input type="hidden" name="images[]" value="${img}">
               <img src="${img}" alt="" width="200">
               <div class="image-overlay">
                 <i class="fas fa-times" onclick="removeimg(event)"></i>
               </div>
             </div>`
          );

      });

      $('.ok').on('click', function () {

        	var img = $('#feature_photo').val();
          // if featured image preview section contains the preview image then set the input field for featured image
          if ($(".featured-image .span4.cropme").children().is('img') > 0) {
            $("#featuredImage").val(img);
          }

          // if IMAGES preview section contains the preview image then show the SAVE TO GALLERY button
          if ($(".images .span4.cropme").children().is('img') > 0) {
            $("#saveBtn").toggleClass('d-none');
          }

      });

    });

    </script>


    {{-- get models for selected brand --}}
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

    </script>

  <script type="text/javascript">
    $(document).ready(function() {
        $(".myTags").tagit();
    });

    $(document).ready(function() {
        $('.searchable-select').select2();
    });
  </script>

  <script>
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
