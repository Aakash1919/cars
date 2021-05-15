@extends('layouts.admin')
@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Blog Section </h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                        </li>
                        <li>
                          <a href="javascript:;">Home Page Settings </a>
                        </li>
                        <li>
                          <a href="{{ route('admin-ps-blogsection') }}">Blog Section </a>
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
                      <form id="geniusform" action="{{ route('admin-ps-update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        @include('includes.admin.form-both')

                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Small Text *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field" name="blog_stxt" placeholder="Small Text" required="" value="{{$data->blog_stxt}}">
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">Bold Text *</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <input type="text" class="input-field" name="blog_btxt" placeholder="Bold Text" required="" value="{{$data->blog_btxt}}">
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
