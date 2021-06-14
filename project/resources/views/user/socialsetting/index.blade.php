@extends('layouts.user')

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a></li>
                        <li class="breadcrumb-item active"  aria-current="page"><a href="#">{{$langg->lang140}} </a></li>
							</ol>
						</nav>
					</div>
  </div>
  <div class="card">
	<div class="card-body">

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
                    <button type="submit" class="submit-btn btn btn-primary btn-sm">{{$langg->lang134}}</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
                    </div>
@endsection
