@extends('layouts.user')
@section('content')
    <div class="content-area">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">		
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a></li>
						<li class="breadcrumb-item active"  aria-current="page"> <a href="{{ route('user.password') }}">{{ $langg->lang77 }} </a></li>
					</ol>
				</nav>
			</div>
		</div>
        <div class="col-lg-5 col-md-5">

        <div class="add-product-content">
            <div class="row">
                <div class="">
                    <div class="product-description">
                        <div class="body-area">

                            <div class="gocover"
                                style="background: url({{ asset('assets/images/spinner.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <div class="card">
                                <div class="card-body">
                            <form id="geniusform" action="{{ route('user.password.update') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include('includes.admin.form-both')

                                    <div class="col-12">
                                        <label for="cpass">Current Password</label>
                                        <input type="password" id="cpass" class="form-control" name="cpass" placeholder="{{ $langg->lang101 }} {{ $langg->lang178 }}" required="" value="">
                                    </div>
       

                                <div class="col-12">
                                        <label for="newpass">New Password</label>
                                        <input id="newpass" type="password" class="form-control" name="newpass" placeholder="{{ $langg->lang101 }} {{ $langg->lang179 }}" required="" value="">

                                </div>

                                <div class="col-12">
                                    <label for="renewpass">Confirm Password</label>
                                        <input id="renewpass" type="password" class="form-control" name="renewpass" placeholder="{{ $langg->lang180 }}" required="" value="">

                                </div>

                                       

                                </div>
                                <div class="card-footer"> <button class="btn btn-sm btn-primary addProductSubmit-btn" type="submit">Save Password</button></div>
                        </form>
                            </div>
                            
                    </div>
                    
                </div>
               
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
