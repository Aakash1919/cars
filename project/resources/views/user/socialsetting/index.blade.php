@extends('layouts.user')

@section('content')

<div class="content-area">
            <div class="mr-breadcrumb">
              <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{$langg->lang140}}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a>
                      </li>
                      <li>
                        <a href="{{ route('user-social-index') }}">{{$langg->lang140}}</a>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="social-links-area">
            <div class="gocover" style="background: url({{ asset('assets/images/spinner.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
              <form id="geniusform" class="form-horizontal" action="{{ route('user-social-update') }}" method="POST">
              {{ csrf_field() }}

              @include('includes.admin.form-both')

                <div class="row">
                  <label class="control-label col-sm-3" for="facebook">{{$langg->lang141}}</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="facebook" id="facebook" placeholder="http://facebook.com/" type="text" value="{{$data ? $data->facebook : ''}}">
                  </div>
                  <div class="col-sm-3">
                    <label class="switch">
                      <input type="checkbox" name="f_status" value="1" {{$data ? $data->f_status==1?"checked":"" : ""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <label class="control-label col-sm-3" for="twitter">{{$langg->lang142}}</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="twitter" id="twitter" placeholder="http://twitter.com/" type="text" value="{{$data ? $data->twitter : ''}}">
                  </div>
                  <div class="col-sm-3">
                    <label class="switch">
                      <input type="checkbox" name="t_status" value="1" {{$data ? $data->t_status==1?"checked":"" : ""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <label class="control-label col-sm-3" for="linkedin">{{$langg->lang143}}</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="linkedin" id="linkedin" placeholder="http://linkedin.com/" type="text" value="{{$data ? $data->linkedin : ""}}">
                  </div>
                  <div class="col-sm-3">
                    <label class="switch">
                      <input type="checkbox" name="l_status" value="1" {{$data ? $data->l_status==1?"checked":"" : ""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="submit-btn">{{$langg->lang134}}</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

@endsection
