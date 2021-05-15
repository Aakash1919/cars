@extends('layouts.admin')

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Website Footer</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                      </li>
                      <li>
                        <a href="javascript:;">General Settings</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-gs-footer') }}">Footer</a>
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
                        <form id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        @include('includes.admin.form-both')
                          <div class="row justify-content-center">
                            <div class="col-lg-8 offset-lg-2">
                              <div class="form-group">
                                <label for=""><strong>Footer Logo **</strong></label>
                                <div class="currrent-logo mb-3">
                                  @if (file_exists('./assets/front/images/footer_logo.png'))
                                    <img src="{{ asset('assets/front/images/footer_logo.png')}}" alt="">
                                  @else
                                    <img src="{{ asset('assets/images/noimage.png') }}" alt="">
                                  @endif
                                </div>
                                <div class="set-logo">
                                  <input class="img-upload1" type="file" name="footer_logo">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for=""><strong>Address **</strong></label>
                                <input type="text" class="form-control" name="footer_address" value="{{ $gs->footer_address }}" required maxlength="255">
                              </div>
                              <div class="form-group">
                                <label for=""><strong>Phone **</strong></label>
                                <input type="text" class="form-control" name="footer_phone" value="{{ $gs->footer_phone }}" required maxlength="30">
                              </div>
                              <div class="form-group">
                                <label for=""><strong>Email **</strong></label>
                                <input type="text" class="form-control" name="footer_email" value="{{ $gs->footer_email }}" required maxlength="255">
                              </div>
                              <div class="form-group">
                                <label for=""><strong>Text **</strong></label>
                                <div class="tawk-area">
                                  <textarea class="nic-edit"  name="footer" required=""> {{ $gs->footer }} </textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for=""><strong>Copyright **</strong></label>
                                <div class="tawk-area">
                                  <textarea class="nic-edit"  name="copyright" required=""> {{ $gs->copyright }} </textarea>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-8 offset-lg-2 text-center">
                            <button class="addProductSubmit-btn" type="submit">Submit</button>
                          </div>
                     </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
