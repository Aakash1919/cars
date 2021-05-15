@extends('layouts.admin')
@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Contact Page </h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                        </li>
                        <li>
                          <a href="javascript:;">Menu Page Settings </a>
                        </li>
                        <li>
                          <a href="{{ route('admin-ps-header') }}">Contact Page </a>
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
                      <form id="geniusform" action="{{ route('admin-ps-upcontact') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        @include('includes.admin.form-both')
                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                      <div class="left-area">
                                        <h4 class="heading">
                                            Contact Page:
                                        </h4>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="action-list">
                                            <select class="process select droplinks {{ $ps->is_contact == 1 ? 'drop-success' : 'drop-danger' }}">
                                              <option data-val="1" value="{{route('admin-ps-iscontact',1)}}" {{ $ps->is_contact == 1 ? 'selected' : '' }}>Active</option>
                                              <option data-val="0" value="{{route('admin-ps-iscontact',0)}}" {{ $ps->is_contact == 0 ? 'selected' : '' }}>Deactive</option>
                                            </select>
                                          </div>
                                    </div>
                                  </div>

                                    <div class="row mt-5">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Phone *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field myTags" name="contact_phone" placeholder="Phone Number" required="" value="{{$data->contact_phone}}" maxlength="255">
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Email Address *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field" name="contact_email" placeholder="Email Address" required="" value="{{$data->contact_email}}" maxlength="255">
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Address *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field" name="contact_address" placeholder="Address" required="" value="{{$data->contact_address}}">
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                      </div>
                                      <div class="col-lg-7">
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
