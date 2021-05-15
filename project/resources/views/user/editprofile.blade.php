@extends('layouts.user')

@section('styles')
  <link href="{{asset('assets/admin/css/jquery.Jcrop.css')}}" rel="stylesheet"/>
  <link href="{{asset('assets/admin/css/Jcrop-style.css')}}" rel="stylesheet"/>
  <style media="screen">
  .span4.cropme {
      width: 300px;
      height: 300px;
  }
  </style>
@endsection

@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ $langg->lang165 }} </h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('user-dashboard') }}">{{ $langg->lang8 }} </a>
                        </li>
                        <li>
                          <a href="{{ route('user.profile') }}">{{ $langg->lang165 }} </a>
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

                      <div class="row">
                        <div class="col-lg-7 offset-lg-3">
                          @include('includes.admin.form-both')
                        </div>
                        <div class="col-lg-3">
                          <div class="left-area">
                              <h4 class="heading">{{ $langg->lang166 }} *</h4>
                          </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="panel panel-body">
                              <div class="span4 cropme text-center" id="landscape">
                              </div>
                            </div>

                            <a href="javascript:;" id="crop-image" class="d-inline-block mybtn1 mt-2">
                              <i class="icofont-upload-alt"></i> {{ $langg->lang167 }}
                            </a>
                        </div>
                      </div>
                      <input type="hidden" id="feature_photo" name="image" value="{{ $user->image }}">

                      <form id="geniusform" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" novalidate>
                        {{csrf_field()}}
                        <input type="hidden" name="image" value="">

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ $langg->lang168 }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input class="input-field" type="text" name="first_name" placeholder="Enter First Name" value="{{ $user->first_name }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ $langg->lang169 }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input class="input-field" type="text" name="last_name" placeholder="Enter Last Name" value="{{ $user->last_name }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ $langg->lang171 }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input class="input-field" type="email" name="email" placeholder="Enter E-mail Address" value="{{ $user->email }}" readonly>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ $langg->lang172 }} </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input class="input-field myTags" type="text" name="phone" placeholder="Enter Phone Numbers" value="{{ $user->phone }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ $langg->lang173 }} </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input class="input-field" type="text" name="address" placeholder="Enter Address" value="{{ $user->address }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ $langg->lang174 }} </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input class="input-field" type="text" name="latitude" placeholder="Enter Latitude" value="{{ $user->latitude }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ $langg->lang175 }} </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input class="input-field" type="text" name="longitude" placeholder="Enter Longitude" value="{{ $user->longitude }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ $langg->lang176 }} </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <textarea name="about" class="form-control" rows="8" cols="80">{{ $user->about }}</textarea>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7 text-center">
                            <button class="addProductSubmit-btn" type="submit">{{ $langg->lang412 }}</button>
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
  <script src="{{asset('assets/admin/js/jquery.Jcrop.js')}}"></script>
  <script>
    var v_aspX = 540;
    var v_aspY = 540;
  </script>
  <script src="{{asset('assets/admin/js/jquery.SimpleCropper.js')}}"></script>

  <script type="text/javascript">

    $('.cropme').simpleCropper();
    $('#crop-image').on('click',function(){
      $('.cropme').click();
    });
  </script>


    <script type="text/javascript">
    $(document).ready(function() {

      let html = `<img src="{{ empty($user->image) ? asset('assets/user/blank.png') : asset('assets/user/propics/'.$user->image) }}" alt="">`;
      $(".span4.cropme").html(html);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    });


    $('.ok').on('click', function () {

       setTimeout(
          function() {


        	var img = $('#feature_photo').val();


            $.ajax({
              url: "{{ route('user-propic-upload') }}",
              type: "POST",
              data: {"image":img},
              success: function (data) {
                if (data.status) {
                  $.notify("Saved successfully!", "success");
                }
                if ((data.errors)) {
                  for(var error in data.errors)
                  {
                    $.notify(data.errors[error], "danger");
                  }
                }
              }
            });

          }, 1000);



      });

    </script>

  <script type="text/javascript">
    $(document).ready(function() {
        $(".myTags").tagit();
    });
  </script>

@endsection
