@extends('layouts.front')

@section('content')
<link href="{{ asset('/assets/theme/assets/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet"
      type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/admin/css/fontawesome.css') }}">
<!--    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="pagetitle">
                       Register
                    </h1>
                    <ul class="pages">
                        <li>
                            <a href="#">
                                {{ $langg->lang1 }}
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                Register
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>-->
<section class="login-signup">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card-body" id="pills-signup">
                    <h3 class="mb-4">Register</h3>
                    @include('includes.admin.form-login')
                    <form id="registerform1" action="{{ route('user.reg.submitNew') }}" method="post"
                          novalidate>
                        {{ csrf_field() }}

                        <div id="smartwizard">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-1"> <strong>Step 1</strong>
                                        <br>User Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-2"> <strong>Step 2</strong>
                                        <br>Additional Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-3"> <strong>Step 3</strong>
                                        <br>Select Package</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-4"> <strong>Step 4</strong>
                                        <br>Payment</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                    <!--<h4 class="custom-step-title"><span>Step 1</span> Login Details</h4>-->
                                    <div class="card custom-card-register">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" class="form-control border-start-0" id="first_name"
                                                           placeholder="First Name" name="first_name" required="required">

                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input name="last_name" class="form-control border-start-0" type="text"
                                                           placeholder="{{ $langg->lang403 }}" id="last_name" onchange="makeid();">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="username" class="form-label">Customer Number</label>
                                                    <input name="username" class="form-control border-start-0" type="text"
                                                           placeholder="Customer Number" id="username" readonly>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input name="email" class="form-control border-start-0" type="email"
                                                           placeholder="{{ $langg->lang405 }}" id="email">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input name="password" class="form-control border-start-0"
                                                           type="password" placeholder="{{ $langg->lang406 }}"
                                                           id="password">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="password_confirmation" class="form-label">Confirm
                                                        Password</label>
                                                    <input name="password_confirmation" class="form-control border-start-0"
                                                           type="password" placeholder="{{ $langg->lang407 }}"
                                                           id="password_confirmation">
                                                </div>
                                                <!--<div class="col-lg-6">-->
                                                <!--    <label for="code" class="form-label">{{ $langg->lang408 }}</label>-->
                                                <!--    <input name="code" class="form-control border-start-0 Password" type="text"-->
                                                <!--        placeholder="{{ $langg->lang408 }}" id="code" autocomplete="off">-->
                                                <!--</div>-->
                                                <!--<div class="col-lg-6">-->
                                                <!--    <label for="code" class="form-label">Captcha</label>-->
                                                <!--    <div class="img">-->
                                                <!--        <img id="codeimg"-->
                                                <!--            src="{{ asset('assets/images/capcha_code.png?time=' . time()) }}"-->
                                                <!--            alt="">-->
                                                <!--    </div>-->
                                                <!--    <div class="icon">-->
                                                <!--        <i class="fas fa-sync refresh_code"></i>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                    <!--<h3>Step 2 User Profile</h3>-->
                                    <div class="card custom-card-register">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="Street" class="form-label">Street</label>

                                                    <input type="text" class="form-control border-start-0" id="Street"
                                                           placeholder="Street Address" name="street" value="" />

                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="Suburb" class="form-label">Suburb</label>

                                                    <input type="text" class="form-control border-start-0" id="Suburb"
                                                           placeholder="Suburb" name="suburb" value="" />

                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="state" class="form-label">State</label>

                                                    <select class="form-control border-start-0" id="state"
                                                            placeholder="Confirm Password" name="state" value="">
                                                        <option value="">Select State</option>
                                                        <option value="Australian Capital Territory">Australian Capital
                                                            Territory</option>
                                                        <option value="New South Wales">New South Wales</option>
                                                        <option value="Northern Territory">Northern Territory</option>
                                                        <option value="Queensland">Queensland</option>
                                                        <option value="South Australia">South Australia</option>
                                                        <option value="Tasmania">Tasmania</option>
                                                        <option value="Victoria">Victoria</option>
                                                        <option value="Western Australia">Western Australia</option>
                                                    </select>

                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="country" class="form-label">Country</label>

                                                    <select class="form-control border-start-0" id="country"
                                                            placeholder="Country" name="country">
                                                        <option value="">Select Country</option>
                                                        <option value="Australia">Australia</option>
                                                    </select>

                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="postal_code" class="form-label">Post Code</label>
                                                    <input type="text" class="form-control border-start-0" id="postal_code"
                                                           name="postal" placeholder="Postal Code" value="" />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="text" class="form-control border-start-0" id="phone"
                                                           name="phone" placeholder="Enter Phone Number" value="" />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="usertype" class="form-label">Select Profile Type</label>
                                                    <select class="form-control border-start-0" id="usertype"
                                                            name="usertype" onchange="meThods(this)" required>
                                                        <option value="">Please select a type</option>
                                                        <option value="personal">Personal</option>
                                                        <option value="business">Business</option>
                                                        <option value="dealer">Dealer</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="coupon" class="form-label">Promotion Code</label>
                                                    <input type="text" class="form-control border-start-0" id="coupon"
                                                           name="coupon" placeholder="Coupon Code" value="" />
                                                </div>
                                                <div class="show-business col-lg-12" style="display:none">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label for="trading_name" class="form-label">Trading
                                                                Name</label>

                                                            <input type="text" class="form-control border-start-0"
                                                                   id="trading_name" name="trading_name"
                                                                   placeholder="Enter Trading Name" value="" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="business_address" class="form-label">Business
                                                                Address </label>
                                                            <input type="text" class="form-control border-start-0"
                                                                   id="business_address" name="business_address"
                                                                   placeholder="Enter Business Address" value="" />
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="abn" class="form-label">ABN</label>
                                                            <input type="text" class="form-control border-start-0" id="abn"
                                                                   name="abn" placeholder="Enter ABN" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="show-dealer col-lg-12" style="display:none">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label for="licence" class="form-label">Licence Number</label>
                                                            <input type="text" class="form-control border-start-0"
                                                                   id="licence" name="licence" placeholder="Enter Licence"
                                                                   value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                    <div class="card custom-card-register">
                                        <div class="card-body">
                                            <div class="pricing-table">
                                                <div class="row">
                                                    @foreach ($plans as $key => $plan)
                                                    <div class="col-lg-4">
                                                        <div class="card <?php
                                                        if ($plan->title == 'Seller') {
                                                            echo 'bg-pack1';
                                                        }
                                                        if ($plan->title == 'Buyer/Seller') {
                                                            echo 'bg-pack2';
                                                        }
                                                        if ($plan->title == 'Wholesaler') {
                                                            echo 'bg-pack3';
                                                        }
                                                        ?>">
                                                            <div class="card-body">
                                                                <h5
                                                                    class="card-title grey-text text-uppercase text-center">
                                                                    {{ $plan->title ?? 'Lorem' }}</h5>
                                                                <h6 class="card-price text-center">
                                                                    ${{ number_format($plan->price, 0) ?? 0 }}<span
                                                                        class="term">/week</span></h6>
                                                                <hr class="my-4">
                                                                <div class="pricing-detail">
                                                                    {!! $plan->details ?? 'No Detail Dound' !!}
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="plan" id="plan_{{ $plan->id ?? null }}"
                                                                           value="{{ $plan->id ?? null }}"
                                                                           {{ $key == 0 ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                           for="plan_{{ $plan->id ?? null }}">
                                                                        {{ $plan->title ?? '' }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 offset-md-3" >
                                        <div class="card custom-card-register">
                                            <div class="form-group">

                                                <div id="card-element" class="form-control"></div>
                                                <div id="card-errors" role="alert"></div>
                                            </div>

                                            <br>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                                    <label class="form-check-label" for="terms">I have understood and agree with the Car Salvage Sales <a target="_blank" href="/termsu/pages">Terms and Conditions</a> and <a target="_blank" href="/privacy/pages">Privacy Policy</a></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


@endsection

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render=6LcrZYEbAAAAAArdCM0eiZFYecpHat8g817Qvv6j"></script>

<script src="https://js.stripe.com/v3/"></script>
<script>
                                                                // $('.refresh_code').on("click", function() {
                                                                //     $.get('{{ url('refresh_code') }}', function(data, status) {
                                                                //         $('#codeimg').attr("src", "{{ url('assets/images') }}/capcha_code.png?time=" + Math
                                                                //             .random());
                                                                //     });
                                                                // })
                                                                $(document).ready(function () {
                                                                    // Toolbar extra buttons
                                                                    var btnFinish = $('<button id="finish-btn"></button>').text('Finish').addClass('btn btn-success submit-btn').on('click', function (
                                                                            e) {
                                                                        // e.preventDefault();

                                                                    });
                                                                    var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click',
                                                                            function () {
                                                                                $('#smartwizard').smartWizard("reset");
                                                                            });

                                                                    $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
                                                                        //console.log(stepNumber);
                                                                        if (stepNumber == 1) {
                                                                            validatestep1();
                                                                        }
                                                                        if (stepNumber == 2) {
                                                                            validatestep2();
                                                                        }
                                                                        if (stepNumber == 4) {
                                                                            validatestep2();
                                                                        }
                                                                        $("#prev-btn").removeClass('disabled');
                                                                        $("#next-btn").removeClass('disabled');
                                                                        $("#finish-btn").attr('disabled', true);
                                                                        if (stepPosition === 'first') {
                                                                            $("#prev-btn").addClass('disabled');
                                                                        } else if (stepPosition === 'last') {
                                                                            $("#next-btn").addClass('disabled');
                                                                            $("#finish-btn").attr('disabled', false);
                                                                        } else {
                                                                            $("#prev-btn").removeClass('disabled');
                                                                            $("#next-btn").removeClass('disabled');
                                                                            $("#finish-btn").attr('disabled', true);
                                                                        }
                                                                    });
                                                                    // Smart Wizard

                                                                    $('#smartwizard').smartWizard({
                                                                        selected: 0,
                                                                        theme: 'dots',
                                                                        autoAdjustHeight: true,
                                                                        transition: {
                                                                            animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                                                                        },
                                                                        toolbarSettings: {
                                                                            toolbarPosition: 'bottom', // both bottom
                                                                            toolbarExtraButtons: [btnFinish, btnCancel]
                                                                        }
                                                                    });

                                                                });
                                                                $(window).load(function () {
                                                                    var element = document.getElementById('usertype');
                                                                    meThods(element)
                                                                });
                                                                function validatesetp4() {
                                                                    if ($('input[name="terms"]').is(':checked'))
                                                                    {
                                                                        return true
                                                                    } else
                                                                    {
                                                                        showpopup('danger', 'Please fix following Errors', 'Please check Agree terms and conditions');
                                                                        return false;
                                                                    }
                                                                }
                                                                function validatestep2() {
                                                                    var Suburb = $("#Suburb").val();
                                                                    if (Suburb.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 1);
                                                                        $("#Suburb").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#Suburb").removeClass('bad');
                                                                        $("#Suburb").addClass('good');
                                                                    }
                                                                    var state = $("#state").val();
                                                                    if (state.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 1);
                                                                        $("#state").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#state").removeClass('bad');
                                                                        $("#state").addClass('good');
                                                                    }
                                                                    var state = $("#state").val();
                                                                    if (state.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 1);
                                                                        $("#state").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#state").removeClass('bad');
                                                                        $("#state").addClass('good');
                                                                    }
                                                                    var country = $("#country").val();
                                                                    if (country.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 1);
                                                                        $("#country").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#country").removeClass('bad');
                                                                        $("#country").addClass('good');
                                                                    }
                                                                    var postal_code = $("#postal_code").val();
                                                                    if (postal_code.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 1);
                                                                        $("#postal_code").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#postal_code").removeClass('bad');
                                                                        $("#postal_code").addClass('good');
                                                                    }
                                                                    var phone = $("#phone").val();
                                                                    if (phone.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 1);
                                                                        $("#phone").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#phone").removeClass('bad');
                                                                        $("#phone").addClass('good');
                                                                    }
                                                                    var usertype = $("#usertype").val();
                                                                    if (usertype.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 1);
                                                                        $("#usertype").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#usertype").removeClass('bad');
                                                                        $("#usertype").addClass('good');
                                                                    }
                                                                }
                                                                function validatestep1() {
                                                                    var first_name = $("#first_name").val();
                                                                    if (first_name.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 0);
                                                                        $("#first_name").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#first_name").removeClass('bad');
                                                                        $("#first_name").addClass('good');
                                                                    }

                                                                    var last_name = $("#last_name").val();
                                                                    if (last_name.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 0);
                                                                        $("#last_name").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#last_name").removeClass('bad');
                                                                        $("#last_name").addClass('good');
                                                                    }
                                                                    var username = $("#username").val();
                                                                    if (username.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 0);
                                                                        $("#username").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#username").removeClass('bad');
                                                                        $("#username").addClass('good');
                                                                    }

                                                                    var email = $("#email").val();
                                                                    if (email.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 0);
                                                                        $("#email").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#email").removeClass('bad');
                                                                        $("#email").addClass('good');
                                                                    }

                                                                    var password = $("#password").val();
                                                                    if (password.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 0);
                                                                        $("#password").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#password").removeClass('bad');
                                                                        $("#password").addClass('good');
                                                                    }

                                                                    var password_confirmation = $("#password_confirmation").val();
                                                                    if (password_confirmation.length == 0) {
                                                                        $('#smartwizard').smartWizard("goToStep", 0);
                                                                        $("#password_confirmation").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#password_confirmation").removeClass('bad');
                                                                        $("#password_confirmation").addClass('good');
                                                                    }

                                                                    if (password_confirmation.length !== password.length) {
                                                                        $('#smartwizard').smartWizard("goToStep", 0);
                                                                        $("#password_confirmation").addClass('bad');
                                                                        return false;
                                                                    } else {
                                                                        $("#password_confirmation").removeClass('bad');
                                                                        $("#password_confirmation").addClass('good');
                                                                    }


                                                                    // var code = $("#code").val();
                                                                    // if(code.length == 0){
                                                                    //     $('#smartwizard').smartWizard("goToStep", 0);
                                                                    //     $("#code").addClass('bad'); 
                                                                    //     return false;
                                                                    // }else{
                                                                    //     $("#code").removeClass('bad'); 
                                                                    //     $("#code").addClass('good'); 
                                                                    // }
                                                                }
                                                                function meThods(val) {
                                                                    if (val.value == "business") {
                                                                        $('.show-business').show()
                                                                        $('.show-dealer').hide()
                                                                        $('.tab-content').css('height', "auto");
                                                                    } else if (val.value == "dealer") {
                                                                        $('.show-business').show()
                                                                        $('.show-dealer').show()
                                                                        $('.tab-content').css('height', "auto");
                                                                    } else {
                                                                        $('.show-business').hide()
                                                                        $('.show-dealer').hide()
                                                                        $('.tab-content').css('height', "auto");
                                                                    }
                                                                }

</script>
<style>
    .good{border:1px solid green;}
    .bad{border:1px solid red;}
</style>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var style = {
        base: {
            fontSize: '16px',
            color: '#32325d',
            padding: '20px 0 0 0',
        },
    };
    var card = elements.create('card', {
        hidePostalCode: true,
        style: style,
        coupon:true
    });
    card.mount('#card-element');
    var form = document.getElementById('registerform1');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        stripe.createToken(card).then(function (result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token, event);
            }
        });
    });

    function stripeTokenHandler(token, event) {
        showpopup('info', 'Please Wait', "Your request is processing please wait.", 'show');
        var form = document.getElementById('registerform1');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        grecaptcha.ready(function () {
            grecaptcha.execute('6LcrZYEbAAAAAArdCM0eiZFYecpHat8g817Qvv6j', {action: 'submit'}).then(function (token) {
                register(event)
            });
        });
    }
    function register(e) {
        e.preventDefault();
        $('#preloader').fadeOut(1000);
        //showpopup('info','Please Wait',"Your request is processing please wait.",'show');
        $('#pills-signup button.submit-btn').prop('disabled', true);
        // $('#pills-signup .alert-info').show();
        // $('#pills-signup .alert-info p').html($('#processdata').val());
        var form = $('form')[0];
        $("#finish-btn").attr('disabled', true);
        $.ajax({
            method: "POST",
            url: $('#registerform1').prop('action'),
            data: new FormData(form),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                //showpopup('info','Please Wait',"Your request is processing please wait.",'hide');
                if ((data.errors)) {
                    // $('#pills-signup .alert-success').hide();
                    // $('#pills-signup .alert-info').hide();
                    // $('#pills-signup .alert-danger').show();
                    // $('#pills-signup .alert-danger ul').html(''); 

                    for (var error in data.errors) {
                        $('#pills-signup .alert-danger p').html(data.errors[error]);

                        showpopup('danger', 'Please fix following Errors', data.errors[error], 'show');

                    }

                    $('#pills-signup button.submit-btn').prop('disabled', false);
                } else {
                    // $('#pills-signup .alert-info').hide();
                    // $('#pills-signup .alert-danger').hide();
                    // $('#pills-signup .alert-success').show();
                    // $('#pills-signup .alert-success p').html(data);
                    $('#pills-signup button.submit-btn').prop('disabled', false);

                    $('#registerform1').trigger("reset");
                    showpopup('success', 'Thank you for registering with us.', data, 'show');
                }
            }
        });
    }

    function makeid() {
        var text = "";
        var possible = "0123456789";

        for (var i = 0; i < 15; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        //return text;
        $("#username").val(text);
    }

</script>
<style> 
    .col-lg-6 {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .col-lg-12 {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .col-lg-4 {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    ul.list li {
        color: white;
    }

</style>
@stop
