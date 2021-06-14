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
<div class="page-wrapper">
			<div class="page-content">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a></li>
                        <li class="breadcrumb-item active"  aria-current="page"><a href="{{ route('user.profile') }}">{{ $langg->lang165 }}</a></li>
							</ol>
						</nav>
					</div>
  </div>
  @if (!isset(Auth::user()->stripe_customer_id))
  <div class="card">
  	<div class="card-body">
	  <div class="row mb-4">
                          <div class="col-lg-7 offset-lg-3">
                            <div class="alert alert-warning" role="alert">
                              <p class="mb-0">Please complete your profile first, To post an Ad. Thanks</p>
                            </div>
                          </div>
       </div>
	</div>
  </div>
  @endif
  <div class="gocover" style="background: url({{ asset('assets/images/spinner.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
  <div class="container">
  @include('includes.admin.form-both')
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="{{ empty($user->image) ? asset('assets/user/blank.png') : asset('assets/user/propics/'.$user->image) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
												@if (empty(Auth::user()->current_plan))
												<p class="text-secondary mb-1">No Plan subscribed yet</p>
												@else
												<p class="text-secondary mb-1">User plan here</p>
												@endif
												
												<p class="text-muted font-size-sm">Username: {{Auth::user()->username}}</p>
											</div>
										</div>
										<hr class="my-4" />
										<form id="profileimg" action="{{ route('user-propic-upload') }}" class="dropzone" method="post" enctype="multipart/form-data">
  @csrf
											<div class="fallback">
											<input type="image" name="image" />
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="John Doe" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="john@example.com" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="(239) 816-9029" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Mobile</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="(320) 380-4539" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value="Bay Area, San Francisco, CA" />
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="button" class="btn btn-primary px-4" value="Save Changes" />
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endofsection
	<!--end wrapper-->
	@section('scripts')
	<script  type="text/javascript">
	Dropzone.autoDiscover = false;
	var myDropzone = new Dropzone("form#profileimg", { 
			maxFilesize: 10, 
			uploadMultiple :false,
			acceptedFiles : "image/*",
			addRemoveLinks: true,
			forceFallback: false,
			init: function() {
				this.on("success", function(file, responseText) {
					console.log(responseText);
				});
			}
		});
	</script>
	@endsection
	