@extends('layouts.front')

@section('content')
<link href="{{asset('/assets/theme/assets/plugins/smart-wizard/css/smart_wizard_all.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome.css')}}">
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title">
                        {{ $langg->lang7 }}
                </h1>
                <ul class="pages">
                    <li>
                        <a href="#">
                            {{ $langg->lang1 }}
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            {{ $langg->lang7 }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-7 mx-auto">
       
        <div class="card">
            <div class="card-body">
                <form id="registerform" class="" action="{{ route('user.reg.submit') }}" method="post">
                    {{ csrf_field() }}
               
                <!-- SmartWizard html -->
                <div id="smartwizard">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#step-1">	<strong>Step 1</strong> 
                                <br>Login Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#step-2">	<strong>Step 2</strong> 
                                <br>Contact Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#step-3">	<strong>Step 3</strong> 
                                <br>Select Package</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#step-4">	<strong>Step 4</strong> 
                                <br>Payment</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                            <h3>Step 1 Login Details</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-input">
                                                <input name="first_name" type="text" placeholder="{{ $langg->lang402 }}">
                                                <i class="fas fa-user"></i>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-input">
                                                <input name="last_name" type="text" placeholder="{{ $langg->lang403 }}">
                                                <i class="fas fa-user"></i>
                                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-input">
                                                <input name="username" type="text" placeholder="{{ $langg->lang404 }}">
                                                <i class="fas fa-user"></i>
                                            </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-input">
                                                <input name="email" type="email" placeholder="{{ $langg->lang405 }}">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                        <div class="form-input">
                                                <input name="password" type="password" class="Password" placeholder="{{ $langg->lang406 }}">
                                                <i class="fas fa-key"></i>
                                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                        <div class="form-input">
                                                <input name="password_confirmation" type="password" class="Password" placeholder="{{ $langg->lang407 }} {{ $langg->lang406 }}">
                                                <i class="fas fa-key"></i>
                                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                        <div class="form-input">
                                                <input type="text" name="code" class="Password" placeholder="{{ $langg->lang408 }}" autocomplete="off">
                                                <i class="fas fa-code"></i>
                                            </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                        <div class="captcha-area">
                                            <div class="img">
                                                <img id="codeimg" src="{{asset('assets/images/capcha_code.png?time='.time())}}" alt="">
                                            </div>
                                            <div class="icon">
                                                    <i class="fas fa-sync refresh_code"></i>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        
                        </div>
                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                            <h3>Step 2 User Profile</h3>
                            <div>
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                        <input type="text" class="form-control border-start-0" id="first_name" name="first_name" placeholder="Enter First Name" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                                        <input type="text" class="form-control border-start-0" id="last_name" name="last_name" placeholder="Enter Last Name" value="" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email Address</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                                        <input type="email" class="form-control border-start-0" id="email" name="email" placeholder="Enter E-mail Address" value="" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone No</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-microphone' ></i></span>
                                        <input type="text" class="form-control border-start-0" id="phone" name="phone" placeholder="Enter Phone Numbers" value="" />
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="inputChoosePassword" class="form-label">Street</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-apartment' ></i></span>
                                        <input type="text" class="form-control border-start-0" id="inputChoosePassword" placeholder="Street Address" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="Suburb" class="form-label">Suburb</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='fadeIn animated bx bx-directions' ></i></span>
                                        <input type="text" class="form-control border-start-0" id="Suburb" placeholder="Suburb" name="suburb" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='fadeIn animated bx bx-directions' ></i></span>
                                        <select class="form-control border-start-0" id="state" placeholder="Confirm Password" name="state" value="">
                                            <option value="">Select State</option>
                                            <option value="Australian Capital Territory">Australian Capital Territory</option>
                                            <option value="New South Wales" >New South Wales</option>
                                            <option value="Northern Territory" >Northern Territory</option>
                                            <option value="Queensland" >Queensland</option>
                                            <option value="South Australia" >South Australia</option>
                                            <option value="Tasmania" >Tasmania</option>
                                            <option value="Victoria" >Victoria</option>
                                            <option value="Western Australia" >Western Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class="form-label">Country</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                                        <select class="form-control border-start-0" id="inputConfirmPassword" placeholder="Country" name="country">
                                            <option value="">Select Country</option>
                                            <option value="Australia">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                                        <input type="text" class="form-control border-start-0" id="postal_code" name="postal" placeholder="Postal Code" value=""/>
                                    </div>
                                </div> 
                                <div class="col-12">
                                    <label for="postal_code" class="form-label">Select Profile Type</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                                    <select class="form-control border-start-0" id="usertype" name="usertype" onchange="meThods(this)" required>
                                        <option value="">Please select a type</option>
                                        <option value="personal" >Personal</option>
                                        <option value="business">Business</option>
                                        <option value="dealer">Dealer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="show-business" style="display:none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="trading_name" class="form-label">Trading Name</label>
                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                                                <input type="text" class="form-control border-start-0" id="trading_name" name="trading_name" placeholder="Enter Trading Name" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="business_address" class="form-label">Business Address </label>
                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                                                <input type="text" class="form-control border-start-0" id="business_address" name="business_address" placeholder="Enter Business Address" value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="abn" class="form-label">ABN</label>
                                        <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                                            <input type="text" class="form-control border-start-0" id="abn" name="abn" placeholder="Enter ABN" value="" />
                                        </div>
                                        </div>
                                    </div>	
                                </div>
                                <div class="show-dealer" style="display:none">
                                <div class="row">
                                    <div class="col-md-6">
                                            <label for="licence" class="form-label">Licence Number</label>
                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                                                <input type="text" class="form-control border-start-0" id="licence" name="licence" placeholder="Enter Licence" value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="about" class="form-label">About</label>
                                    <textarea  class="form-control border-start-0" name="about" id="about"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                            Plan pricing table
                        </div>
                        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                            <h3>Step 4 Payment</h3>
                             Payment    
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    $('.refresh_code').on( "click", function() {
        $.get('{{url('refresh_code')}}', function(data, status){
            $('#codeimg').attr("src","{{url('assets/images')}}/capcha_code.png?time="+ Math.random());
        });
    })
    $(document).ready(function () {
			// Toolbar extra buttons
			var btnFinish = $('<button></button>').text('Finish').addClass('btn btn-primary').on('click', function () {
				alert('Finish Clicked');
			});
			var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click', function () {
				$('#smartwizard').smartWizard("reset");
			});
			// Step show event
			$("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
				$("#prev-btn").removeClass('disabled');
				$("#next-btn").removeClass('disabled');
				if (stepPosition === 'first') {
					$("#prev-btn").addClass('disabled');
				} else if (stepPosition === 'last') {
					$("#next-btn").addClass('disabled');
				} else {
					$("#prev-btn").removeClass('disabled');
					$("#next-btn").removeClass('disabled');
				}
			});
			// Smart Wizard
			$('#smartwizard').smartWizard({
				selected: 0,
				theme: 'dots',
				transition: {
					animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
				},
				toolbarSettings: {
					toolbarPosition: 'both', // both bottom
					toolbarExtraButtons: [btnFinish, btnCancel]
				}
			});
			// External Button Events
			$("#reset-btn").on("click", function () {
				// Reset wizard
				$('#smartwizard').smartWizard("reset");
				return true;
			});
			$("#prev-btn").on("click", function () {
				// Navigate previous
				$('#smartwizard').smartWizard("prev");
				return true;
			});
			$("#next-btn").on("click", function () {
				// Navigate next
				$('#smartwizard').smartWizard("next");
				return true;
			});
			// Demo Button Events
			$("#got_to_step").on("change", function () {
				// Go to step
				var step_index = $(this).val() - 1;
				$('#smartwizard').smartWizard("goToStep", step_index);
				return true;
			});
			$("#is_justified").on("click", function () {
				// Change Justify
				var options = {
					justified: $(this).prop("checked")
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
			$("#animation").on("change", function () {
				// Change theme
				var options = {
					transition: {
						animation: $(this).val()
					},
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
			$("#theme_selector").on("change", function () {
				// Change theme
				var options = {
					theme: $(this).val()
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
		});
</script>
@stop


