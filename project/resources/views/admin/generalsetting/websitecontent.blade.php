@extends('layouts.admin')

@section('content')

<div class="content-area">
  <div class="mr-breadcrumb">
    <div class="row">
      <div class="col-lg-12">
          <h4 class="heading">Website Contents</h4>
        <ul class="links">
          <li>
            <a href="{{ route('admin.dashboard') }}">Dashboard </a>
          </li>
          <li>
            <a href="javascript:;">Generel Settings</a>
          </li>
          <li>
            <a href="{{ route('admin-gs-contents') }}">Website Contents</a>
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
            <form action="{{ route('admin-gs-update') }}" id="geniusform" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

            @include('includes.admin.form-both')

            <div class="row justify-content-center">
              <div class="col-lg-3">
                <div class="left-area">
                    <h4 class="heading">Website Title *
                      </h4>
                </div>
              </div>
              <div class="col-lg-6">
                <input type="text" class="input-field" placeholder="Write Your Site Title Here" name="title" value="{{ $gs->title }}" required="">
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-lg-3">
                <div class="left-area">
                    <h4 class="heading">Theme Color *</h4>
                </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                    <div class="input-group colorpicker-component cp">
                      <input type="text" name="colors" value="{{ $gs->colors }}"  class="form-control cp"  />
                      <span class="input-group-addon"><i></i></span>
                    </div>
                  </div>

              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-lg-3">
                <div class="left-area">

                </div>
              </div>
              <div class="col-lg-6">
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
