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
                                                    <label for="postal_code" class="form-label">Postal Code</label>
                                                    <input type="text" class="form-control border-start-0" id="postal_code"
                                                           name="postal" placeholder="Postal Code" value="" />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="phone" class="form-label">Phone No</label>
                                                    <input type="text" class="form-control border-start-0" id="phone"
                                                           name="phone" placeholder="Enter Phone Numbers" value="" />
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
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="card custom-card-register">
                                            <div class="card-body">

                                                <div id="card-element"></div>
                                                <div id="card-errors" role="alert"></div>
                                            </div>

                                            <br>
                                            <div class="card-footer">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                                    <label class="form-check-label" for="terms">I agree with <a target="_blank" href="/termsu/pages">terms and conditions</a></label>
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
<!--            <div class="col-lg-5">
                <figure>
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 317.63 414.67"><defs><style>.cls-1{fill:#f0f0f0;}.cls-2{fill:#263238;}.cls-3{fill:#01ae4f;}.cls-4{fill:#455a64;}.cls-10,.cls-5{fill:#fff;}.cls-10,.cls-14,.cls-6,.cls-8{isolation:isolate;}.cls-7{fill:#e8e8e3;}.cls-8{opacity:0.1;}.cls-9{fill:#e0e0e0;}.cls-10,.cls-11,.cls-14{opacity:0.2;}.cls-12{fill:#ffbe9d;}.cls-13{fill:#eb996e;}</style></defs><g id="freepik--background-simple--inject-37"><path class="cls-1" d="M359.37,131.38c-36.62-32-86.19,0-134.35,67.34s-71.06,39-112,68.68S61.13,418.66,205.37,406.84,455.1,214.92,359.37,131.38Z" transform="translate(-86.21 -38.72)"/></g><g id="freepik--Floor--inject-37"><path class="cls-2" d="M403.84,453.13c0,.14-69.44.26-155.07.26s-155.1-.12-155.1-.26,69.43-.26,155.1-.26S403.84,453,403.84,453.13Z" transform="translate(-86.21 -38.72)"/></g><g id="freepik--Plant--inject-37"><path class="cls-3" d="M336.18,330.71c-15.45-10.79-18.95-30.82-18.34-48.83.1-3-.23-6.18,1.2-8.81s4.77-4.44,7.46-3.18c2.23,1.05,3.2,3.65,4.45,5.8a17.56,17.56,0,0,0,7.05,6.73c1.91,1,4.28,1.6,6.17.56,2.6-1.43,2.9-5,2.88-8q0-8.37-.1-16.72a27.69,27.69,0,0,1,.9-8.88c.93-2.84,3-5.47,5.83-6.27s6.36.85,7,3.77a28.89,28.89,0,0,1,.09,3.72,3.23,3.23,0,0,0,1.83,3c1.17.38,2.39-.49,3.29-1.37,3.08-3,5.18-6.91,7.13-10.77s3.86-7.83,6.66-11.12,6.67-5.9,11-6.15,8.84,2.41,9.92,6.61-1.37,8.49-4,11.9A67.14,67.14,0,0,1,382.71,256a5.46,5.46,0,0,0-2.33,2.49c-.65,2,1.24,4,3.21,4.63,2.23.74,4.65.51,7,.79s4.85,1.3,5.74,3.5c1.22,3.06-1.34,6.26-3.85,8.36a57.44,57.44,0,0,1-16.92,9.77c-2.2.8-4.51,1.51-6.29,3.05s-2.84,4.23-1.77,6.34,3.82,2.78,6.13,2.35,4.36-1.67,6.56-2.5c4.11-1.55,9.41-1.27,12,2.28a9.44,9.44,0,0,1,1,8.37,21.85,21.85,0,0,1-4.53,7.39A57.61,57.61,0,0,1,364,330c-9.53,3.3-18.36,4.2-27.83.73" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M396.2,226.66s-.09.1-.29.28l-.89.79c-.78.7-1.93,1.72-3.38,3.07a112,112,0,0,0-11.42,12.33c-2.23,2.77-4.54,5.91-7,9.32s-5,7.09-7.52,11a134,134,0,0,0-7.37,12.78c-1.16,2.29-2.18,4.68-3.23,7.12L352,290.8a272.67,272.67,0,0,0-10.66,28.77,134.11,134.11,0,0,0-5,24.53,97.22,97.22,0,0,0-.28,16.89c.16,2,.31,3.53.45,4.57.06.5.1.9.14,1.19v.41a2.59,2.59,0,0,1-.09-.4c-.05-.29-.11-.68-.19-1.18-.18-1-.37-2.58-.55-4.58a93.06,93.06,0,0,1,.1-16.94,131.74,131.74,0,0,1,4.89-24.64,268.48,268.48,0,0,1,10.63-28.84l3.18-7.42c1.05-2.43,2.08-4.84,3.25-7.14a135,135,0,0,1,7.43-12.81c2.56-4,5.14-7.62,7.57-11s4.78-6.54,7-9.3a107.12,107.12,0,0,1,11.57-12.24c1.48-1.33,2.66-2.33,3.46-3l.93-.75A1.9,1.9,0,0,1,396.2,226.66Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M358,276a6.15,6.15,0,0,1-.29-1.27c-.16-.83-.34-2-.55-3.52-.43-3-.87-7.11-1.34-11.66s-1-8.67-1.44-11.64c-.23-1.48-.43-2.67-.57-3.5a5.15,5.15,0,0,1-.17-1.3,5.45,5.45,0,0,1,.37,1.25c.22.82.47,2,.75,3.49.57,3,1.13,7.08,1.6,11.64s.87,8.56,1.18,11.67c.15,1.4.28,2.59.38,3.54A5.68,5.68,0,0,1,358,276Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M396.48,268.82A7.39,7.39,0,0,1,395,269c-1,.09-2.42.21-4.18.41-3.52.38-8.36,1.08-13.67,2.08s-10.08,2.13-13.51,3c-1.71.44-3.09.84-4,1.11a7.8,7.8,0,0,1-1.5.36,9,9,0,0,1,1.44-.57c.94-.33,2.3-.79,4-1.28,3.41-1,8.18-2.19,13.51-3.21a136.57,136.57,0,0,1,13.65-1.9c1.77-.15,3.2-.21,4.2-.23A7.94,7.94,0,0,1,396.48,268.82Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M341.3,318.72a2,2,0,0,1-.26-.47l-.66-1.39c-.57-1.21-1.34-3-2.26-5.19-1.86-4.4-4.23-10.56-6.75-17.4s-4.84-13-6.6-17.45c-.86-2.16-1.57-3.93-2.1-5.25l-.56-1.43a1.85,1.85,0,0,1-.16-.52,2,2,0,0,1,.26.47l.66,1.39c.56,1.21,1.34,3,2.26,5.19,1.86,4.4,4.23,10.56,6.75,17.4s4.84,13,6.6,17.45c.86,2.16,1.57,3.93,2.09,5.25.23.57.42,1,.57,1.43A1.85,1.85,0,0,1,341.3,318.72Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M392.38,302.25a2.28,2.28,0,0,1-.51.21l-1.48.5-5.47,1.77c-4.62,1.5-11,3.64-18,6s-13.41,4.46-18.06,5.86c-2.32.71-4.21,1.25-5.52,1.61l-1.51.39a2.59,2.59,0,0,1-.54.11,2.28,2.28,0,0,1,.51-.21l1.48-.5,5.47-1.77c4.62-1.5,11-3.64,18-6s13.4-4.46,18.05-5.86c2.33-.71,4.21-1.25,5.53-1.61l1.51-.39A2.59,2.59,0,0,1,392.38,302.25Z" transform="translate(-86.21 -38.72)"/></g><g id="freepik--Padlock--inject-37"><path class="cls-3" d="M371.54,59.68l-5.15,1.84-2.21-6.73c-4.06-12.41-17-19-28.89-14.81s-18.22,17.8-14.16,30.21l2.21,6.73-5.17,1.85a8.22,8.22,0,0,0-4.82,10.28l14.33,43.79A7.72,7.72,0,0,0,337.3,138l.24-.07,53.37-19.09a8.26,8.26,0,0,0,4.87-10.38L381.44,64.69a7.71,7.71,0,0,0-9.64-5.1Zm-40.68,7a13.19,13.19,0,0,1,7.76-16.55,12.36,12.36,0,0,1,15.7,7.69c0,.14.09.28.13.42l2.2,6.73-23.59,8.44Zm30,38.86,3.66,11.18a.91.91,0,0,1-.57,1.12l-5.13,1.83a.82.82,0,0,1-1-.54L354.13,108a10,10,0,0,1-9-7,10.5,10.5,0,0,1,6.19-13.18A9.85,9.85,0,0,1,363.83,94c0,.1.07.21.1.32a10.69,10.69,0,0,1-3.06,11.29Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M366.16,61.4c0,.14-9.55,3.73-21.43,8s-21.57,7.7-21.62,7.6,9.55-3.72,21.44-8S366.11,61.27,366.16,61.4Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M377.5,63.24c0,.09.08.18.11.27s.17.46.29.78l1.07,3,3.84,11.18c1.6,4.74,3.51,10.36,5.63,16.6,1,3.13,2.18,6.39,3.28,9.82a15,15,0,0,1,.75,5.49,7.26,7.26,0,0,1-.81,2.77,7.51,7.51,0,0,1-1.89,2.23,17.93,17.93,0,0,1-5.08,2.59l-5.15,1.85-9.75,3.49-16.51,5.88-11.15,3.92-3,1-.8.26a.9.9,0,0,1-.27.07.52.52,0,0,0,.25-.12l.78-.31,3-1.13,11.09-4.08,16.48-6,9.73-3.52,5.15-1.86a17,17,0,0,0,4.93-2.51,7.16,7.16,0,0,0,1.76-2.07,6.63,6.63,0,0,0,.75-2.57,14.39,14.39,0,0,0-.72-5.29c-1.08-3.4-2.22-6.69-3.25-9.82-2.08-6.25-4-11.89-5.52-16.63s-2.8-8.55-3.68-11.23c-.42-1.31-.74-2.33-1-3.07l-.24-.8A1.07,1.07,0,0,1,377.5,63.24Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M349.34,49.45s-.53-.26-1.51-.66a13.34,13.34,0,0,0-4.37-.88A14.93,14.93,0,0,0,337,49.13a14.4,14.4,0,0,0-6.11,5.11,13.52,13.52,0,0,0-2.35,7.59,23.42,23.42,0,0,0,1,6.55c.52,1.82,1.06,3.27,1.42,4.28a10.82,10.82,0,0,1,.52,1.58,9.44,9.44,0,0,1-.71-1.51c-.41-1-1-2.42-1.58-4.25A22.82,22.82,0,0,1,328,61.83a13.68,13.68,0,0,1,2.4-7.88,14.61,14.61,0,0,1,6.35-5.26,15,15,0,0,1,6.65-1.14,12.54,12.54,0,0,1,4.43,1.05,7.6,7.6,0,0,1,1.08.6A1.62,1.62,0,0,1,349.34,49.45Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M349.8,88.58a3.33,3.33,0,0,1,.5-.25,9.52,9.52,0,0,1,1.55-.55,10.8,10.8,0,0,1,2.59-.44,8.93,8.93,0,0,1,3.51.53c2.56.9,4.91,3.51,6.07,7a10,10,0,0,1,0,5.74A13,13,0,0,1,360.8,106l.06-.27c1.33,3.65,2.78,7.61,4.28,11.74l.09.25-.25.09-2.29.76-5,1.67-.25.08-.08-.25c-1.37-4.14-2.87-8-4-11.79l.22.17a10,10,0,0,1-5.36-2.11,12.09,12.09,0,0,1-3.35-4,9.13,9.13,0,0,1-1.06-4.5A10.85,10.85,0,0,1,348,89.58a6.35,6.35,0,0,1,1.73-1c-.56.34-1.11.7-1.64,1.09A10.63,10.63,0,0,0,345,94.06a9.47,9.47,0,0,0,.31,8.07,11.74,11.74,0,0,0,3.27,3.84,9.55,9.55,0,0,0,5.11,2h.17l.05.15c1.1,3.72,2.61,7.61,4,11.77l-.33-.16,5-1.67,2.28-.77-.16.34c-1.49-4.13-2.93-8.1-4.25-11.75v-.15l.12-.12a12.75,12.75,0,0,0,3.16-5.17,9.68,9.68,0,0,0,0-5.49c-1.09-3.36-3.34-5.91-5.78-6.81a8.52,8.52,0,0,0-3.39-.57,11.69,11.69,0,0,0-2.56.35C350.51,88.29,349.81,88.63,349.8,88.58Z" transform="translate(-86.21 -38.72)"/></g><g id="freepik--Device--inject-37"><path class="cls-4" d="M318.89,377.32,219,376.86A21.77,21.77,0,0,1,197.35,355l1.06-250.41a21.75,21.75,0,0,1,21.84-21.66h0l99.88.46a21.77,21.77,0,0,1,21.66,21.85l-1.06,250.4a21.77,21.77,0,0,1-21.86,21.68Z" transform="translate(-86.21 -38.72)"/><path class="cls-5" d="M320,92H300.64a4.81,4.81,0,0,0-4.72,4.9h0v3.51a4.8,4.8,0,0,1-4.71,4.89h0l-37.74-.17a4.82,4.82,0,0,1-4.69-4.94V96.68a4.83,4.83,0,0,0-4.68-4.94h-6.81l-16.95-.08A15.24,15.24,0,0,0,205,106.75l-1,244.42a15.23,15.23,0,0,0,15.16,15.3h0l99.68.46a15.24,15.24,0,0,0,15.31-15.17h0l1-244.42A15.25,15.25,0,0,0,320,92Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M306.59,334.32,232.47,334c-.77,0-1.39-.84-1.38-1.86l.08-19.39c0-1,.63-1.86,1.4-1.86l74.12.34a1.68,1.68,0,0,1,1.38,1.87L308,332.47C308,333.5,307.36,334.33,306.59,334.32Z" transform="translate(-86.21 -38.72)"/><g class="cls-6"><path class="cls-7" d="M253,323l.71-.06a1.58,1.58,0,0,0,.24.73,1.28,1.28,0,0,0,.57.46,2.19,2.19,0,0,0,1.64,0,1.1,1.1,0,0,0,.49-.36.88.88,0,0,0,.16-.51.81.81,0,0,0-.15-.49,1.16,1.16,0,0,0-.52-.35,9.82,9.82,0,0,0-1-.29,5.57,5.57,0,0,1-1.11-.37,1.53,1.53,0,0,1-.6-.55,1.38,1.38,0,0,1-.2-.75,1.54,1.54,0,0,1,.24-.83,1.48,1.48,0,0,1,.72-.6,2.68,2.68,0,0,1,1-.2,2.76,2.76,0,0,1,1.12.21,1.61,1.61,0,0,1,.75.63,1.92,1.92,0,0,1,.28.93l-.73.06a1.24,1.24,0,0,0-.39-.85,1.52,1.52,0,0,0-1-.29,1.58,1.58,0,0,0-1,.26.82.82,0,0,0-.32.63.69.69,0,0,0,.23.53,2.77,2.77,0,0,0,1.13.42,7.61,7.61,0,0,1,1.27.38,1.72,1.72,0,0,1,.73.61,1.48,1.48,0,0,1,.24.84,1.71,1.71,0,0,1-.26.9,1.83,1.83,0,0,1-.75.65,2.61,2.61,0,0,1-1.1.23,3.29,3.29,0,0,1-1.3-.23,1.89,1.89,0,0,1-.82-.71A2.06,2.06,0,0,1,253,323Z" transform="translate(-86.21 -38.72)"/><path class="cls-7" d="M258.65,325V319h.75V325Z" transform="translate(-86.21 -38.72)"/><path class="cls-7" d="M263.4,322.62v-.7h2.42v2.2a4.38,4.38,0,0,1-1.15.7,3.37,3.37,0,0,1-1.21.23,3.12,3.12,0,0,1-1.53-.37,2.39,2.39,0,0,1-1-1.09,3.56,3.56,0,0,1-.35-1.58,3.83,3.83,0,0,1,.35-1.62,2.44,2.44,0,0,1,1-1.12,3.09,3.09,0,0,1,1.51-.36,2.9,2.9,0,0,1,1.12.21,1.86,1.86,0,0,1,.78.58,2.64,2.64,0,0,1,.43,1l-.68.2a2.31,2.31,0,0,0-.32-.72,1.34,1.34,0,0,0-.54-.41,1.86,1.86,0,0,0-.79-.16,2.21,2.21,0,0,0-.89.17,1.46,1.46,0,0,0-.61.43,1.87,1.87,0,0,0-.36.58,3.16,3.16,0,0,0-.22,1.2,3.09,3.09,0,0,0,.26,1.33,1.69,1.69,0,0,0,.77.79,2.19,2.19,0,0,0,1.06.26,2.45,2.45,0,0,0,1-.19,2.65,2.65,0,0,0,.71-.42v-1.11Z" transform="translate(-86.21 -38.72)"/><path class="cls-7" d="M266.92,325V319h.78l3,4.66V319h.73V325h-.78l-3-4.67V325Z" transform="translate(-86.21 -38.72)"/><path class="cls-7" d="M278.64,319h.75v3.43a4.19,4.19,0,0,1-.19,1.42,1.77,1.77,0,0,1-.7.86,2.44,2.44,0,0,1-1.34.33,2.57,2.57,0,0,1-1.31-.29,1.58,1.58,0,0,1-.72-.83,4,4,0,0,1-.22-1.49V319h.75v3.43a3.56,3.56,0,0,0,.14,1.14,1.05,1.05,0,0,0,.48.56,1.49,1.49,0,0,0,.82.2,1.56,1.56,0,0,0,1.19-.39,2.38,2.38,0,0,0,.35-1.51Z" transform="translate(-86.21 -38.72)"/><path class="cls-7" d="M280.65,325V319h2.15a4.75,4.75,0,0,1,.87.06,1.77,1.77,0,0,1,.7.27,1.5,1.5,0,0,1,.46.58,1.78,1.78,0,0,1,.17.81,1.86,1.86,0,0,1-.46,1.28,2.17,2.17,0,0,1-1.67.53H281.4V325Zm.75-3.12h1.48a1.52,1.52,0,0,0,1-.28,1,1,0,0,0,.3-.8,1.12,1.12,0,0,0-.18-.64.9.9,0,0,0-.47-.35,3.54,3.54,0,0,0-.71-.05H281.4Z" transform="translate(-86.21 -38.72)"/></g><rect class="cls-3" x="232.02" y="153.29" width="4.72" height="25.72" transform="translate(-19.04 361.06) rotate(-89.74)"/><rect class="cls-8" x="232.02" y="153.29" width="4.72" height="25.72" transform="translate(-19.04 361.06) rotate(-89.74)"/><path class="cls-9" d="M322.65,192.83a2.41,2.41,0,0,0,.59-.14,1.6,1.6,0,0,0,1-1.35V178.06a1.89,1.89,0,0,0-.28-1.31,1.51,1.51,0,0,0-1.19-.61h-16l-83.64-.31a1.33,1.33,0,0,0-1.1.55,1.94,1.94,0,0,0-.26,1.31v12a8.18,8.18,0,0,0,0,1.4,1.35,1.35,0,0,0,.78.9,1.48,1.48,0,0,0,.62.11h5.09l22.21.12,37.6.23,25.35.2,6.89.08H288.06l-37.6-.12-22.21-.09h-5.09a2.08,2.08,0,0,1-.82-.14,1.9,1.9,0,0,1-1.08-1.25,2.68,2.68,0,0,1-.06-.8V177.59a5.34,5.34,0,0,1,0-.8,1.74,1.74,0,0,1,.33-.81,1.84,1.84,0,0,1,1.52-.77l83.64.46,14.45.1h1.56a1.7,1.7,0,0,1,1.4.73,2.11,2.11,0,0,1,.32,1.47v6.39c0,3-.07,5.3-.09,6.9a1.62,1.62,0,0,1-1.05,1.39A1.18,1.18,0,0,1,322.65,192.83Z" transform="translate(-86.21 -38.72)"/><rect class="cls-3" x="143.05" y="142.13" width="47.04" height="4.41"/><rect class="cls-10" x="143.05" y="142.13" width="47.04" height="4.41"/><rect class="cls-3" x="231.85" y="196.35" width="4.72" height="25.72" transform="translate(-62.27 403.75) rotate(-89.74)"/><rect class="cls-8" x="231.85" y="196.35" width="4.72" height="25.72" transform="translate(-62.27 403.75) rotate(-89.74)"/><path class="cls-9" d="M322,235.89a4.21,4.21,0,0,0,.6-.11,2.06,2.06,0,0,0,1.26-1.14,2.75,2.75,0,0,0,.18-1.27V221.44a2.11,2.11,0,0,0-.29-1.32,1.93,1.93,0,0,0-1.09-.85,5.9,5.9,0,0,0-1.51-.08H306.76l-83.35-.31a1.85,1.85,0,0,0-1.83,1.61v12a5.46,5.46,0,0,0,.06,1.4,1.84,1.84,0,0,0,.73,1,2.08,2.08,0,0,0,1.24.32h4.28l22.13.11,37.47.23,25.26.2,6.87.08H287.49l-37.49,0-22.13-.08h-4.35a2.51,2.51,0,0,1-1.53-.41,2.39,2.39,0,0,1-.94-1.31,6.13,6.13,0,0,1-.08-1.54v-12a2.37,2.37,0,0,1,2.35-2.07l83.35.46,14.39.11a6.13,6.13,0,0,1,1.6.11,2.22,2.22,0,0,1,1.23,1,2.4,2.4,0,0,1,.32,1.46v12a2.79,2.79,0,0,1-.21,1.31,2.13,2.13,0,0,1-1.35,1.14A1.78,1.78,0,0,1,322,235.89Z" transform="translate(-86.21 -38.72)"/><rect class="cls-3" x="231.65" y="241.28" width="4.72" height="25.72" transform="translate(-107.39 448.28) rotate(-89.74)"/><rect class="cls-8" x="231.65" y="241.28" width="4.72" height="25.72" transform="translate(-107.39 448.28) rotate(-89.74)"/><path class="cls-9" d="M321.8,280.8a4.21,4.21,0,0,0,.6-.11,2.07,2.07,0,0,0,1.26-1.13,2.75,2.75,0,0,0,.18-1.27V266.35a2.11,2.11,0,0,0-.29-1.32,2,2,0,0,0-1.09-.84,6.36,6.36,0,0,0-1.51-.09H306.56l-83.35-.31a1.85,1.85,0,0,0-1.83,1.61v12a5.4,5.4,0,0,0,.06,1.39,1.84,1.84,0,0,0,.73,1,2,2,0,0,0,1.24.32h4.35l22.13.12,37.47.23,25.26.2,6.87.08H287.36l-37.47-.11-22.13-.09h-4.35a2.44,2.44,0,0,1-1.53-.41,2.39,2.39,0,0,1-.94-1.31,6.13,6.13,0,0,1-.08-1.54v-12a2.36,2.36,0,0,1,2.34-2.07l83.35.46,14.39.11a6.13,6.13,0,0,1,1.6.11,2.22,2.22,0,0,1,1.23,1,2.4,2.4,0,0,1,.32,1.46v12a2.67,2.67,0,0,1-.21,1.31,2.13,2.13,0,0,1-1.35,1.14A1.63,1.63,0,0,1,321.8,280.8Z" transform="translate(-86.21 -38.72)"/><rect class="cls-3" x="249.56" y="203.74" width="4.41" height="47.04" transform="translate(-62.84 439.27) rotate(-89.74)"/><rect class="cls-10" x="249.56" y="203.74" width="4.41" height="47.04" transform="translate(-62.84 439.27) rotate(-89.74)"/><path class="cls-3" d="M232.51,272.64a2.06,2.06,0,1,1-2-2.21A2.12,2.12,0,0,1,232.51,272.64Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M238.88,272.67a2.06,2.06,0,0,1-4.11.29,1.41,1.41,0,0,1,0-.29,2.06,2.06,0,0,1,4.11-.29A1.41,1.41,0,0,1,238.88,272.67Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M245.26,272.7a2.06,2.06,0,1,1-2-2.21A2.12,2.12,0,0,1,245.26,272.7Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M251.63,272.73a2.06,2.06,0,1,1-2-2.21A2.12,2.12,0,0,1,251.63,272.73Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M258,272.75a2.06,2.06,0,1,1-2-2.2A2.13,2.13,0,0,1,258,272.75Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M264.38,272.78a2.06,2.06,0,1,1-2.05-2.2A2.13,2.13,0,0,1,264.38,272.78Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M270.75,272.81a2.06,2.06,0,1,1-4.11.29,1.41,1.41,0,0,1,0-.29,2.06,2.06,0,0,1,4.11-.29A1.41,1.41,0,0,1,270.75,272.81Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M277.12,272.84a2.06,2.06,0,1,1-2.05-2.2A2.13,2.13,0,0,1,277.12,272.84Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M283.49,272.87a2.06,2.06,0,1,1-2-2.2A2.13,2.13,0,0,1,283.49,272.87Z" transform="translate(-86.21 -38.72)"/><g class="cls-11"><path class="cls-5" d="M232.51,272.64a2.06,2.06,0,1,1-2-2.21A2.12,2.12,0,0,1,232.51,272.64Z" transform="translate(-86.21 -38.72)"/><path class="cls-5" d="M238.88,272.67a2.06,2.06,0,0,1-4.11.29,1.41,1.41,0,0,1,0-.29,2.06,2.06,0,0,1,4.11-.29A1.41,1.41,0,0,1,238.88,272.67Z" transform="translate(-86.21 -38.72)"/><path class="cls-5" d="M245.26,272.7a2.06,2.06,0,1,1-2-2.21A2.12,2.12,0,0,1,245.26,272.7Z" transform="translate(-86.21 -38.72)"/><path class="cls-5" d="M251.63,272.73a2.06,2.06,0,1,1-2-2.21A2.12,2.12,0,0,1,251.63,272.73Z" transform="translate(-86.21 -38.72)"/><path class="cls-5" d="M258,272.75a2.06,2.06,0,1,1-2-2.2A2.13,2.13,0,0,1,258,272.75Z" transform="translate(-86.21 -38.72)"/><path class="cls-5" d="M264.38,272.78a2.06,2.06,0,1,1-2.05-2.2A2.13,2.13,0,0,1,264.38,272.78Z" transform="translate(-86.21 -38.72)"/><path class="cls-5" d="M270.75,272.81a2.06,2.06,0,1,1-4.11.29,1.41,1.41,0,0,1,0-.29,2.06,2.06,0,0,1,4.11-.29A1.41,1.41,0,0,1,270.75,272.81Z" transform="translate(-86.21 -38.72)"/><path class="cls-5" d="M277.12,272.84a2.06,2.06,0,1,1-2.05-2.2A2.13,2.13,0,0,1,277.12,272.84Z" transform="translate(-86.21 -38.72)"/><path class="cls-5" d="M283.49,272.87a2.06,2.06,0,1,1-2-2.2A2.13,2.13,0,0,1,283.49,272.87Z" transform="translate(-86.21 -38.72)"/></g><path class="cls-3" d="M274.44,128.51a3.88,3.88,0,0,0,2.31-3.59,3.64,3.64,0,1,0-7.27-.38,2.41,2.41,0,0,0,0,.38,3.87,3.87,0,0,0,2.32,3.63c-5.6.84-5.35,6.92-5.35,6.92l13.24.06S280,129.34,274.44,128.51Z" transform="translate(-86.21 -38.72)"/><path class="cls-8" d="M274.44,128.51a3.88,3.88,0,0,0,2.31-3.59,3.64,3.64,0,1,0-7.27-.38,2.41,2.41,0,0,0,0,.38,3.87,3.87,0,0,0,2.32,3.63c-5.6.84-5.35,6.92-5.35,6.92l13.24.06S280,129.34,274.44,128.51Z" transform="translate(-86.21 -38.72)"/><rect class="cls-3" x="269.53" y="118.57" width="5.64" height="47.19" transform="translate(42.74 375.14) rotate(-89.74)"/><rect class="cls-10" x="269.53" y="118.57" width="5.64" height="47.19" transform="translate(42.74 375.14) rotate(-89.74)"/></g><g id="freepik--speech-bubble--inject-37"><path class="cls-3" d="M122.47,168.68H122l-1.36.1a14.59,14.59,0,0,0-2.19.29c-.47.07-.93.16-1.39.27l-1.55.43a25.38,25.38,0,0,0-7.37,3.65,25.89,25.89,0,0,0-7.26,8.08,27.31,27.31,0,0,0-2.54,5.81,27.85,27.85,0,0,0-1.11,6.78,27.31,27.31,0,0,0,.06,3.62,14.76,14.76,0,0,0,.25,1.84,11.82,11.82,0,0,0,.35,1.85,26.37,26.37,0,0,0,15,18.33,23.77,23.77,0,0,0,8.59,1.93,23.15,23.15,0,0,0,9-1.29l.88-.33h.12l.1.06,12.61,6.4-.37.32c-1.35-4.18-2.65-8.23-3.91-12.12v-.15l.11-.11a27,27,0,0,0,6.62-11,27.67,27.67,0,0,0,1-11.72,27.35,27.35,0,0,0-3.31-9.94,26.91,26.91,0,0,0-5.7-7,27.65,27.65,0,0,0-6.19-3.94,26.8,26.8,0,0,0-5.24-1.65l-2-.33-1.45-.11-.88-.06h.89l1.45.06,2,.29a26.6,26.6,0,0,1,5.31,1.59,27.39,27.39,0,0,1,6.3,3.93,27,27,0,0,1,5.82,7,27.46,27.46,0,0,1,3.41,10.07,28.11,28.11,0,0,1-.93,11.92,27.31,27.31,0,0,1-6.72,11.23l.06-.26c1.26,3.89,2.57,7.94,3.93,12.11l.19.61L144,227l-12.61-6.39h.22l-.9.33a24,24,0,0,1-9.17,1.32,24.33,24.33,0,0,1-8.77-2A26.32,26.32,0,0,1,100.25,209a26.59,26.59,0,0,1-2.83-7.4,15,15,0,0,1-.35-1.89c-.08-.63-.21-1.25-.24-1.87a29.65,29.65,0,0,1,1.11-10.56,26.9,26.9,0,0,1,2.61-5.88,26.19,26.19,0,0,1,7.41-8.13,25.21,25.21,0,0,1,7.49-3.62l1.57-.4a13.23,13.23,0,0,1,1.4-.25,13.71,13.71,0,0,1,2.21-.24l1.37,0A3.71,3.71,0,0,1,122.47,168.68Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M128.17,192h-1.85l-4-5.62v-3.69s-2.86-.18-2.52,4.65,0,3.6,0,3.6-6.07,0-6.57.55-.53,6.41-.6,9.68a3.54,3.54,0,0,0,2.51,3.56,2.37,2.37,0,0,0,.65.09c1.52,0,9.25-1.23,9.25-1.23h3.19Z" transform="translate(-86.21 -38.72)"/><polygon class="cls-3" points="47.25 152.29 46.11 164.93 42.95 164.93 42.95 152.55 47.25 152.29"/></g><g id="freepik--Character--inject-37"><path class="cls-3" d="M171.15,448.34v-8.55l-15.33-.11-.13,12.93.95.07c4.23.27,21.52.67,24.36-.21C184.16,451.49,171.15,448.34,171.15,448.34Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M181.36,451.67c0,.14-5.74.26-12.81.26s-12.81-.12-12.81-.26,5.74-.26,12.81-.26S181.36,451.53,181.36,451.67Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M171.42,450.09c-.13-.07,0-.52.31-1s.73-.68.83-.58-.11.48-.41.89S171.55,450.16,171.42,450.09Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M172.4,450.65c-.14,0-.07-.56.23-1.09s.7-.85.81-.77-.07.53-.35,1S172.53,450.7,172.4,450.65Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M160.36,451.63c-.06,0-.29-.18-.62-.56a9.43,9.43,0,0,0-1.34-1.34,3.51,3.51,0,0,0-1.66-.73c-.47-.06-.77,0-.8-.06s.26-.27.81-.31a3.09,3.09,0,0,1,2,.68,5.61,5.61,0,0,1,1.32,1.55C160.3,451.3,160.42,451.59,160.36,451.63Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M171.47,448.48c.07.12-.19.42-.63.58s-.83.1-.85,0,.29-.31.67-.45S171.39,448.36,171.47,448.48Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M171.23,447.65c0,.15-.4.27-.92.28s-.93-.11-.92-.25.42-.27.92-.28S171.21,447.51,171.23,447.65Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M208.9,448.34v-8.55l-15.33-.11-.13,12.8.95.07c4.23.27,21.53.8,24.36-.08C221.91,451.49,208.9,448.34,208.9,448.34Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M219.11,451.69c0,.14-5.73.26-12.81.26s-12.8-.12-12.8-.26,5.73-.26,12.8-.26S219.11,451.55,219.11,451.69Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M209.17,450.09c-.12-.07,0-.52.31-1s.73-.68.83-.58-.11.48-.41.89S209.3,450.16,209.17,450.09Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M210.15,450.65c-.13,0-.07-.56.24-1.09s.7-.85.81-.77-.08.53-.36,1S210.29,450.7,210.15,450.65Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M198.11,451.63c-.06,0-.28-.18-.62-.56a9.43,9.43,0,0,0-1.34-1.34,3.51,3.51,0,0,0-1.66-.73c-.46-.06-.77,0-.8-.06s.26-.27.81-.31a3.09,3.09,0,0,1,2,.68,5.61,5.61,0,0,1,1.32,1.55C198.05,451.3,198.17,451.59,198.11,451.63Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M209.22,448.48c.07.12-.19.42-.63.58s-.83.1-.85,0,.29-.31.67-.45S209.14,448.36,209.22,448.48Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M209,447.65c0,.15-.4.27-.92.28s-.92-.11-.91-.25.41-.27.91-.28S209,447.51,209,447.65Z" transform="translate(-86.21 -38.72)"/><path class="cls-12" d="M265.38,194.44c-.4-.41-1.39-.21-1.39-.21a5.08,5.08,0,0,0,0-1.74c-.18-.56-1.44-.45-1.44-.45a5.62,5.62,0,0,1,0-1.42.52.52,0,0,0-.29-.51,4.68,4.68,0,0,0-1.88-.34c-.77-.55,2.35-4.92,3.51-6.32s.95-2.49-.08-2.49c-.71,0-4.35,4.2-5.47,5.61s-4.09,5.33-4.19,2.2-1.36-5.49-2.15-5.89-1.63.54-1.2,1.41a11.29,11.29,0,0,1,.7,3.08,7.36,7.36,0,0,1-.11,2.52,29.72,29.72,0,0,1-1.35,4.52H250s-21.82,20.93-23.4,22.42c-1.41,1.34-29.77-1.59-35.46-2.19a38,38,0,0,0-5.84-.4c-2.47.11-2.91.46-5.37.49a121.29,121.29,0,0,0-18.54,1.63,15.37,15.37,0,0,0-12.06,10.46c-5.73,17.9-18.71,60.27-21,84.07a102.46,102.46,0,0,0-4.68,9.67c-1.61,4.38-1.22,4.53-.68,4.63,1.46.27,3.12-7.59,3.74-5.69s-3.15,9.37-1.62,9.59c2,.28,3.59-8,3.78-8.66s1.18-.45,1,.17c-.29.88-3.1,10.21-1.14,10.51,1.08.16,1.2-1.81,1.2-1.81s2-8.93,2.91-8.75-.06,5.45-.52,7.21.18,2.65,1.12,2.22c.64-.3,2.17-5.65,2.59-7.39s1.47-6.56,2.88-3.77,3.55,4.41,4.43,4.45a1,1,0,0,0,.88-1.11,1,1,0,0,0-.39-.68,11.14,11.14,0,0,1-1.93-2.5,7.46,7.46,0,0,1-1-2.34,25.38,25.38,0,0,1-.7-5.06l-.16-1c2.24-11.09,8.69-43.64,18-64.43l3.82,7.86,1.66,5.82L153.3,285l43.42-.57-6.48-24.94,7.87-26h0c8.51.19,30.36.51,34-1.14,4.58-2,28.27-31.92,28.27-31.92h0a55.64,55.64,0,0,0,4.43-3.84S266.25,195.34,265.38,194.44Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M151.39,266.39c1.26-4.3,7.73-25.56,7.73-25.56s3.18,17.33,2.34,19.42a37.41,37.41,0,0,1-2.73,5.16c-7.34,11.17-6.38,16.76-6.38,16.76l44.35-1.35c.1-6.2-3.57-20.62-4.33-22.92s1.77-9.83,1.77-9.83,5-5.09,4.82-7.71a42.39,42.39,0,0,0-.87-7l27,1-.85-18.3-38.78-3.88c-1.35,3.81-13.56,1.94-13.56,1.94-13.18.44-14,2.86-19.48,7.12s-14.55,40.82-14.55,40.82Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M177.61,262.06a9.1,9.1,0,0,1-2.33.12c-1.45,0-3.44-.1-5.63-.32s-4.17-.53-5.58-.81a9.35,9.35,0,0,1-2.27-.58,12.18,12.18,0,0,1,2.33.22c1.42.18,3.39.43,5.57.65s4.16.37,5.59.47A12,12,0,0,1,177.61,262.06Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M180.65,258.29a9.9,9.9,0,0,1-2.42.83A44.28,44.28,0,0,1,166,260.57a9.86,9.86,0,0,1-2.54-.24,16.57,16.57,0,0,1,2.54-.13c1.57-.05,3.73-.16,6.11-.44s4.5-.68,6-1A16.71,16.71,0,0,1,180.65,258.29Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M195.57,241.47a10.17,10.17,0,0,1-.31,2.26c-.26,1.39-.66,3.29-1.17,5.37s-1,4-1.44,5.3a10.24,10.24,0,0,1-.78,2.15,10.67,10.67,0,0,1,.42-2.24c.38-1.56.81-3.36,1.29-5.33s.94-3.77,1.32-5.33A9.82,9.82,0,0,1,195.57,241.47Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M151.86,263.84a47,47,0,0,1-6.83-1.59,47.72,47.72,0,0,1-6.7-2.1,47,47,0,0,1,6.83,1.59A46.44,46.44,0,0,1,151.86,263.84Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M198.57,233.14a3.63,3.63,0,0,1-1.14,0,11.91,11.91,0,0,1-3.05-.73,12.52,12.52,0,0,1-7.24-7.11,12.9,12.9,0,0,1-.89-5.63,8.75,8.75,0,0,1,1.37-4.46,4.62,4.62,0,0,1,2.53-1.87,3.05,3.05,0,0,1,.85-.11h.3a3.24,3.24,0,0,0-1.09.27,4.53,4.53,0,0,0-2.29,1.87c-1.36,2.14-1.74,6-.29,9.7a12.13,12.13,0,0,0,3.09,4.52,13.08,13.08,0,0,0,3.79,2.44A19.08,19.08,0,0,0,198.57,233.14Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M221.88,234a83.43,83.43,0,0,1-.24-9.22,83.27,83.27,0,0,1,.28-9.21,83.25,83.25,0,0,1,.24,9.21A81.07,81.07,0,0,1,221.88,234Z" transform="translate(-86.21 -38.72)"/><path class="cls-12" d="M185.2,213.3c.11-2.23.34-4.75.34-4.75s5.52-.61,5.85-6.31,0-18.85,0-18.85l-10-5.12L170.29,187,172,215.5l10.18.65A2.94,2.94,0,0,0,185.2,213.3Z" transform="translate(-86.21 -38.72)"/><path class="cls-13" d="M186.19,197.73a.46.46,0,0,1-.09.24.74.74,0,0,1-.63.28c-.64,0-1.26-.74-1.48-1.6a2.73,2.73,0,0,1,0-1.27,1.11,1.11,0,0,1,.6-.86.49.49,0,0,1,.65.23.28.28,0,0,1,0,.27.29.29,0,0,0-.1-.2.36.36,0,0,0-.47-.1.86.86,0,0,0-.41.71,2.69,2.69,0,0,0,0,1.13c.2.78.74,1.41,1.22,1.47a.68.68,0,0,0,.53-.15C186.13,197.8,186.17,197.72,186.19,197.73Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M194.82,180.31c-.77-2.62-3.56-3.92-6.1-4.64-3.87-1.1-8.05-1.58-11.83-.19s-8.32,3.83-8.32,8c-2.23-.18-3.51,1.77-4.39,4.19a15.78,15.78,0,0,0-1,4.6h0c-.28,5.46-1.81,13-5.35,17-2,2.23-4.77,3.77-5.91,6.55-1,2.41-.48,5.27-1.41,7.71-.83,2.15-2.66,3.68-4,5.55a14.88,14.88,0,0,0-.95,14.39,18.24,18.24,0,0,0,10.89,9.4,25.48,25.48,0,0,0,14.35.14,23.91,23.91,0,0,0,9.62-4.77A16.06,16.06,0,0,0,186,239c.71-4.08-.43-8.23-1.28-12.29-2.66-12.83-1.9-13.5,1.46-25.41.08-.21.12-.43.18-.64s.09-.31.13-.47h0a6.88,6.88,0,0,0,.15-1.43,2.76,2.76,0,0,1-2.89-.62,3,3,0,0,1-.68-3,4.36,4.36,0,0,1,2.58-2.43c1.11-.46,2.3-.7,3.39-1.21,2.31-1.1,3.91-3.38,5-5.77A7.92,7.92,0,0,0,194.82,180.31Z" transform="translate(-86.21 -38.72)"/><path class="cls-3" d="M186.59,198a4.75,4.75,0,0,1,.52,1c.3.63.7,1.52,1.14,2.55l.08.19h-.21l-1,.09c-.69,0-1.27.13-2,.12a.36.36,0,0,1-.26-.23.45.45,0,0,1,0-.28,2.88,2.88,0,0,1,.09-.4l.18-.71a6.66,6.66,0,0,1,.42-1.38,7,7,0,0,1-.21,1.43l-.14.71c-.05.24-.14.61,0,.58.5,0,1.21-.11,1.87-.15l1-.09-.13.22c-.43-1-.79-1.94-1-2.59A4,4,0,0,1,186.59,198Z" transform="translate(-86.21 -38.72)"/><path class="cls-2" d="M152.35,282.17l44.35-1.35L216,356.16l-3.55,86.42H189L191.87,358l-17.15-52.45,2.64,140.38-23.7.35-2.49-131.95c-.11-3.67-1.31-11.94-.86-15.58Z" transform="translate(-86.21 -38.72)"/><path class="cls-4" d="M180.62,306.62a8.77,8.77,0,0,1-2.17-.13c-1.34-.16-3.17-.44-5.18-.84s-3.81-.86-5.11-1.23a8,8,0,0,1-2-.72c0-.15,3.26.63,7.26,1.44S180.64,306.47,180.62,306.62Z" transform="translate(-86.21 -38.72)"/><path class="cls-4" d="M212.21,437.84c0,.14-5.31.26-11.86.26s-11.87-.12-11.87-.26,5.31-.26,11.87-.26S212.21,437.69,212.21,437.84Z" transform="translate(-86.21 -38.72)"/><path class="cls-4" d="M177.15,442.28c0,.15-5.16.26-11.52.26s-11.51-.11-11.51-.26,5.16-.26,11.51-.26S177.15,442.14,177.15,442.28Z" transform="translate(-86.21 -38.72)"/><path class="cls-4" d="M174.09,441.92c-.14,0-.76-30.67-1.39-68.5s-1-68.52-.87-68.52.77,30.66,1.39,68.51S174.24,441.92,174.09,441.92Z" transform="translate(-86.21 -38.72)"/><path class="cls-4" d="M209.06,437.84a2.81,2.81,0,0,1,0-.41v-1.2c0-1.08.08-2.63.14-4.6.14-4,.34-9.81.59-16.93.54-14.32,1.3-34.06,2.13-55.85v-.52c-5.25-21-10-40.06-13.45-53.85l-4-16.31c-.46-1.91-.81-3.4-1.06-4.44-.12-.49-.2-.87-.27-1.16a1.76,1.76,0,0,1-.07-.4,2.91,2.91,0,0,1,.12.39c.08.28.18.66.32,1.14.27,1,.66,2.52,1.16,4.42,1,3.86,2.41,9.42,4.17,16.27,3.48,13.78,8.28,32.79,13.6,53.82v.66c-.89,21.79-1.7,41.52-2.29,55.84-.31,7.13-.57,12.9-.75,16.92-.1,2-.18,3.52-.23,4.6,0,.51-.06.91-.07,1.2A1.84,1.84,0,0,1,209.06,437.84Z" transform="translate(-86.21 -38.72)"/><path class="cls-4" d="M201.41,356.5a26.94,26.94,0,0,1-5.18,1.15c-2.16.37-4,.63-4.83.67v-.2c.27.08.41.13.41.17s-.17,0-.45,0h-.6l.6-.18c.78-.23,2.62-.61,4.78-1A26.7,26.7,0,0,1,201.41,356.5Z" transform="translate(-86.21 -38.72)"/><path class="cls-4" d="M201,359.37a26.05,26.05,0,0,1-4.67-.21,26,26,0,0,1-4.65-.51A29.81,29.81,0,0,1,201,359.37Z" transform="translate(-86.21 -38.72)"/><path class="cls-14" d="M152.16,283.76a6.1,6.1,0,0,0,4.38,2.33,19.71,19.71,0,0,0,5.37-.1c11.45-1.27,23.58-2.44,34.79-5.17-14.51.81-29.84.54-44.35,1.35l-.15,1.24" transform="translate(-86.21 -38.72)"/><g class="cls-11"><polygon points="80.9 265.49 89.08 297.23 88.51 266.83 80.9 265.49"/></g></g></svg
                </figure>
            </div>-->
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
        },
    };
    var card = elements.create('card', {
        hidePostalCode: true,
        style: style
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
