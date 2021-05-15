@extends('layouts.admin')
@section('content')


          <div class="content-area">
            <div class="mr-breadcrumb">
              <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Website Breadcrumb</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                      </li>
                      <li>
                        <a href="javascript:;">Generel Settings</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-gs-bread') }}">Website Breadcrumb</a>
                      </li>
                    </ul>
                </div>
              </div>
            </div>

            <div class="add-logo-area">
              <div class="gocover" style="background: url({{ asset('assets/images/spinner.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
              <div class="row justify-content-center">
                <div class="col-lg-8">

                        @include('includes.admin.form-both')

                  <form class="uplogo-form" id="geniusform"  action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="currrent-logo">
                      <h4 class="title">
                        Current Photo :
                      </h4>

                        <img src="{{  asset('assets/front/images/breadcrumb.jpg') }}" alt="">

                    </div>
                    <div class="set-logo">
                      <h4 class="title">
                        Upload Image :
                      </h4>
                      <input class="img-upload1" type="file" name="breadcrumb">
                    </div>
                    <div class="submit-area">
                      <button type="submit" class="submit-btn">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>

@endsection
