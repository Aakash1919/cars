@extends('layouts.load')
@section('content')

            <div class="content-area">
              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                      <div class="gocover" style="background: url({{ asset('assets/images/spinner.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>


                      <form id="geniusformdata" action="{{ route('admin-user-update') }}" method="POST" enctype="multipart/form-data" novalidate>
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{ $data->id }}">

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">First Name *</h4>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <input class="input-field" type="text" name="first_name" placeholder="Enter First Name" value="{{ $data->first_name }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">Last Name *</h4>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <input class="input-field" type="text" name="last_name" placeholder="Enter Last Name" value="{{ $data->last_name }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">Email Address *</h4>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <input class="input-field" type="email" name="email" placeholder="Enter E-mail Address" value="{{ $data->email }}" readonly>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">Phone </h4>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <input class="input-field myTags" type="text" name="phone" placeholder="Enter Phone Numbers" value="{{ $data->phone }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">Address </h4>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <input class="input-field" type="text" name="address" placeholder="Enter Address" value="{{ $data->address }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">Latitude </h4>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <input class="input-field" type="text" name="latitude" placeholder="Enter Latitude" value="{{ $data->latitude }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">Longitude </h4>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <input class="input-field" type="text" name="longitude" placeholder="Enter Longitude" value="{{ $data->longitude }}">
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">About </h4>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <textarea name="about" class="form-control" rows="8" cols="80">{{ $data->about }}</textarea>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-lg-3">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-8 text-center">
                            <button class="addProductSubmit-btn" type="submit">Submit</button>
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

  <script type="text/javascript">
    $(document).ready(function() {
        $(".myTags").tagit();
    });
  </script>

@endsection
