@extends('layouts.user')
@section('styles')
@endsection

@section('content')
<div class="">
	<div class="">
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
										<img id="myprofileimage" src="{{ empty($user->image) ? asset('assets/user/blank.png') : asset('assets/user/propics/'.$user->image) }}" alt="{{Auth::user()->username}}" class="rounded-circle p-1 bg-primary" style="max-height:110px;max-width:110px;">
										<div class="mt-3">
											<h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
											@if (empty(Auth::user()->current_plan))
												<p class="text-secondary mb-1">No Plan subscribed yet</p>
											@else
												<p class="text-secondary mb-1">{{ get_plan_name(Auth::user()->current_plan) }}</p>
											@endif
											<p class="text-muted font-size-sm">Username: {{Auth::user()->username}}</p>
										</div>
									</div>
									<hr class="my-4" />
									<form id="profileimg" action="{{ route('user-propic-upload') }}" class="dropzone" method="post" enctype="multipart/form-data">
										<input type="hidden" name="_token" value={{csrf_token()}}>
										<div class="dz-message">
										<div class="font-22 text-primary">	<i class="lni lni-cloud-upload"></i>
										</div>	
										Drop files here or click to upload.
									
										</div>
										<div class="fallback"><input type="file" name="image" /></div>
									</form>
								</div>
							</div>
					</div>
					<div class="col-lg-8">
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<form id="geniusform" class="row g-3" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" novalidate>
									{{csrf_field()}}
									<div class="col-md-6">
										<label for="first_name" class="form-label">First Name</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
											<input type="text" class="form-control border-start-0" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ $user->first_name }}" />
										</div>
									</div>
									<div class="col-md-6">
										<label for="last_name" class="form-label">Last Name</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
											<input type="text" class="form-control border-start-0" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ $user->last_name }}" />
										</div>
									</div>
									<div class="col-12">
										<label for="email" class="form-label">Email Address</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
											<input type="email" class="form-control border-start-0" id="email" name="email" placeholder="Enter E-mail Address" value="{{ $user->email }}" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<label for="phone" class="form-label">Phone No</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-microphone' ></i></span>
											<input type="text" class="form-control border-start-0" id="phone" name="phone" placeholder="Enter Phone Numbers" value="{{ $user->phone }}" />
										</div>
									</div>
									
									<div class="col-md-6">
										<label for="inputChoosePassword" class="form-label">Street</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-apartment' ></i></span>
											<input type="text" class="form-control border-start-0" id="inputChoosePassword" placeholder="Street Address" value="{{ $user->address }}"/>
										</div>
									</div>
									<div class="col-md-6">
										<label for="Suburb" class="form-label">Suburb</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='fadeIn animated bx bx-directions' ></i></span>
											<input type="text" class="form-control border-start-0" id="Suburb" placeholder="Suburb" name="suburb" value="{{ $user->suburb }}"/>
										</div>
									</div>
									<div class="col-md-6">
										<label for="state" class="form-label">State</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='fadeIn animated bx bx-directions' ></i></span>
											<select class="form-control border-start-0" id="state" placeholder="Confirm Password" name="state" value="{{ $user->phone }}">
												<option value="">Select State</option>
												<option value="Australian Capital Territory" {{ $user->state=='Australian Capital Territory' ? 'selected' : '' }}>Australian Capital Territory</option>
												<option value="New South Wales" {{ $user->state=='New South Wales' ? 'selected' : '' }}>New South Wales</option>
												<option value="Northern Territory" {{ $user->state=='Northern Territory' ? 'selected' : '' }}>Northern Territory</option>
												<option value="Queensland" {{ $user->state=='Queensland' ? 'selected' : '' }}>Queensland</option>
												<option value="South Australia" {{ $user->state=='South Australia' ? 'selected' : '' }}>South Australia</option>
												<option value="Tasmania" {{ $user->state=='Tasmania' ? 'selected' : '' }}>Tasmania</option>
												<option value="Victoria" {{ $user->state=='Victoria' ? 'selected' : '' }}>Victoria</option>
												<option value="Western Australia" {{ $user->state=='Western Australia' ? 'selected' : '' }}>Western Australia</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<label for="country" class="form-label">Country</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
											<select class="form-control border-start-0" id="inputConfirmPassword" placeholder="Country" name="country">
												<option value="">Select Country</option>
												<option value="Australia" {{ $user->country=='Australia' ? 'selected' : '' }}>Australia</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<label for="postal_code" class="form-label">Postal Code</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
											<input type="text" class="form-control border-start-0" id="postal_code" name="postal" placeholder="Postal Code" value="{{ $user->postal }}"/>
										</div>
									</div> 
									<div class="col-12">
										<label for="usertype" class="form-label">Select Profile Type</label>
										<div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
										<select class="form-control border-start-0" id="usertype" name="usertype" onchange="meThods(this)" required>
											<option value="">Please select a type</option>
											<option value="personal" {{ isset($user->usertype) && $user->usertype=='personal' ? 'selected' :''}}>Personal</option>
											<option value="business"{{ isset($user->usertype) && $user->usertype=='business' ? 'selected' :''}}>Business</option>
											<option value="dealer"{{ isset($user->usertype) && $user->usertype=='dealer' ? 'selected' :''}}>Dealer</option>
											</select>
										</div>
									</div>
									<div class="show-business" style="display:none">
										<div class="row">
											<div class="col-md-6">
												<label for="trading_name" class="form-label">Trading Name</label>
												<div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
													<input type="text" class="form-control border-start-0" id="trading_name" name="trading_name" placeholder="Enter Trading Name" value="{{ $user->trading_name }}" />
												</div>
											</div>
											<div class="col-md-6">
												<label for="business_address" class="form-label">Business Address </label>
												<div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
													<input type="text" class="form-control border-start-0" id="business_address" name="business_address" placeholder="Enter Business Address" value="{{ $user->business_address }}" />
												</div>
											</div>
											<div class="col-md-6">
											<label for="abn" class="form-label">ABN</label>
											<div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
												<input type="text" class="form-control border-start-0" id="abn" name="abn" placeholder="Enter ABN" value="{{ $user->abn }}" />
											</div>
											</div>
										</div>	
									</div>
									<div class="show-dealer" style="display:none">
									<div class="row">
										<div class="col-md-6">
												<label for="licence" class="form-label">Licence Number</label>
												<div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
													<input type="text" class="form-control border-start-0" id="licence" name="licence" placeholder="Enter Licence" value="{{ $user->licence }}" />
												</div>
											</div>
										</div>
									</div>
									<div class="col-12">
										<label for="about" class="form-label">About</label>
										<textarea  class="form-control border-start-0" name="about" id="about">{{ $user->about }}</textarea>
									</div>
								</div>
								<div class="card-footer">
									<div class="col-12">
										<button type="submit" class="addProductSubmit-btn btn btn-primary px-5">Save</button>
									</div>
								</div>
							</form>
						</div>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Payment Information</h5>
								</div>
								<hr>
								<form action="{{route('user.profile.stripeUpdate')}}" method="post" id="payment-form">
									@if($errors->any())
										<h4>{{$errors->first()}}</h4>
									@endif
									<input type="hidden" name="_token" value={{csrf_token()}} />
									<div class="form-row">
									  <div id="card-element"></div>
									  <div id="card-errors" role="alert"></div>
									</div>
									<button class="btn btn-success btn-sm mt-2">update</button>
								</form>
							</div>
							@if(isset(Auth::user()->stripe_subscription_id))
							<div class="card-footer">
								<a href="{{route('stripe.unsubscribe')}}" class="btn btn-danger">Cancel Subscription</a>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endSection
<!--end wrapper-->
@section('scripts')
<script  type="text/javascript">
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("form#profileimg", { 
		paramName: "image",
		maxFilesize: 10, 
		uploadMultiple :false,
		acceptedFiles : "image/*",
		addRemoveLinks: true,
		forceFallback: false,
		init: function() {
			this.on("success", function(file, responseText) {
				console.log(responseText);
				if(responseText.status==true){
					$("#myprofileimage").attr('src',responseText.message);
					$(".user-img").attr('src',responseText.message);
				}
			});
		}
	});
	$(window).on('load',function() {
      var element = document.getElementById('usertype');
      meThods(element)
    });
	function meThods(val) {
      if(val.value == "business") {
        $('.show-business').show()
      }else if(val.value == "dealer"){
        $('.show-business').show()
        $('.show-dealer').show()

      }else {
        $('.show-business').hide()
        $('.show-dealer').hide()
     }
    }
</script>
<script src="https://js.stripe.com/v3/"></script>
<script>
	var stripe = Stripe('{{ env('STRIPE_KEY') }}');
	var elements = stripe.elements();
	var style = {
		
	base: {
		// Add your base input styles here. For example:
		fontSize: '16px',
		color: '#32325d',
	},
	};
	var card = elements.create('card', {hidePostalCode: true, style: style});
	card.mount('#card-element');
	var form = document.getElementById('payment-form');
	form.addEventListener('submit', function(event) {
	event.preventDefault();
	stripe.createToken(card).then(function(result) {
		if (result.error) {
			var errorElement = document.getElementById('card-errors');
			errorElement.textContent = result.error.message;
		} else {
			stripeTokenHandler(result.token);
		}
	});
	});

	function stripeTokenHandler(token) {
		var form = document.getElementById('payment-form');
		var hiddenInput = document.createElement('input');
		hiddenInput.setAttribute('type', 'hidden');
		hiddenInput.setAttribute('name', 'stripeToken');
		hiddenInput.setAttribute('value', token.id);
		form.appendChild(hiddenInput);
		form.submit();
	}
</script>
@endsection
	