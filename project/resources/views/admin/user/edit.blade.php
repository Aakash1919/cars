@extends('layouts.load')
@section('content')

    <div class="content-area">
        <div class="add-product-content">
            <div class="row">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <form id="geniusformdata" class="row g-3" action="{{ route('admin-user-update') }}" method="POST"
                            enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ $data->id }}">

                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='bx bxs-user'></i></span>
                                    <input type="text" class="form-control border-start-0" id="first_name" name="first_name"
                                        placeholder="Enter First Name" value="{{ $data->first_name }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='bx bxs-user'></i></span>
                                    <input type="text" class="form-control border-start-0" id="last_name" name="last_name"
                                        placeholder="Enter Last Name" value="{{ $data->last_name }}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Customer ID</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='bx bxs-message'></i></span>
                                    <input type="text" class="form-control border-start-0" id="username" name="username"
                                        placeholder="Customer ID" value="{{ $data->username }}" readonly />
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='bx bxs-message'></i></span>
                                    <input type="email" class="form-control border-start-0" id="email" name="email"
                                        placeholder="Enter E-mail Address" value="{{ $data->email }}" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone No</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='bx bxs-microphone'></i></span>
                                    <input type="text" class="form-control border-start-0" id="phone" name="phone"
                                        placeholder="Enter Phone Numbers" value="{{ $data->phone }}" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputChoosePassword" class="form-label">Street</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='lni lni-apartment'></i></span>
                                    <input type="text" class="form-control border-start-0" id="inputChoosePassword"
                                        placeholder="Street Address" value="{{ $data->street }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="Suburb" class="form-label">Suburb</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='fadeIn animated bx bx-directions'></i></span>
                                    <input type="text" class="form-control border-start-0" id="Suburb" placeholder="Suburb"
                                        name="suburb" value="{{ $data->suburb }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="state" class="form-label">State</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='fadeIn animated bx bx-directions'></i></span>
                                    <select class="form-control border-start-0" id="state" placeholder="Confirm Password"
                                        name="state" value="{{ $data->phone }}">
                                        <option value="">Select State</option>
                                        <option value="Australian Capital Territory"
                                            {{ $data->state == 'Australian Capital Territory' ? 'selected' : '' }}>
                                            Australian Capital Territory</option>
                                        <option value="New South Wales"
                                            {{ $data->state == 'New South Wales' ? 'selected' : '' }}>New South Wales
                                        </option>
                                        <option value="Northern Territory"
                                            {{ $data->state == 'Northern Territory' ? 'selected' : '' }}>Northern
                                            Territory
                                        </option>
                                        <option value="Queensland" {{ $data->state == 'Queensland' ? 'selected' : '' }}>
                                            Queensland</option>
                                        <option value="South Australia"
                                            {{ $data->state == 'South Australia' ? 'selected' : '' }}>South Australia
                                        </option>
                                        <option value="Tasmania" {{ $data->state == 'Tasmania' ? 'selected' : '' }}>
                                            Tasmania</option>
                                        <option value="Victoria" {{ $data->state == 'Victoria' ? 'selected' : '' }}>
                                            Victoria</option>
                                        <option value="Western Australia"
                                            {{ $data->state == 'Western Australia' ? 'selected' : '' }}>Western Australia
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='lni lni-chevron-right-circle'></i></span>
                                    <select class="form-control border-start-0" id="inputConfirmPassword"
                                        placeholder="Country" name="country">
                                        <option value="">Select Country</option>
                                        <option value="Australia" {{ $data->country == 'Australia' ? 'selected' : '' }}>
                                            Australia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='lni lni-chevron-right-circle'></i></span>
                                    <input type="text" class="form-control border-start-0" id="postal_code" name="postal"
                                        placeholder="Postal Code" value="{{ $data->postal }}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="usertype" class="form-label">Select Profile Type</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='lni lni-chevron-right-circle'></i></span>
                                    <select class="form-control border-start-0" id="usertype" name="usertype"
                                        onchange="meThods(this)" required>
                                        <option value="">Please select a type</option>
                                        <option value="personal"
                                            {{ isset($data->usertype) && $data->usertype == 'personal' ? 'selected' : '' }}>
                                            Personal</option>
                                        <option value="business"
                                            {{ isset($data->usertype) && $data->usertype == 'business' ? 'selected' : '' }}>
                                            Business</option>
                                        <option value="dealer"
                                            {{ isset($data->usertype) && $data->usertype == 'dealer' ? 'selected' : '' }}>
                                            Dealer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 show-business" style="display:none;">
                                <div class="col-md-12">
                                    <label for="trading_name" class="form-label">Trading Name</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                class='lni lni-chevron-right-circle'></i></span>
                                        <input type="text" class="form-control border-start-0" id="trading_name"
                                            name="trading_name" placeholder="Enter Trading Name"
                                            value="{{ $data->trading_name }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="business_address" class="form-label">Business Address </label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                class='lni lni-chevron-right-circle'></i></span>
                                        <input type="text" class="form-control border-start-0" id="business_address"
                                            name="business_address" placeholder="Enter Business Address"
                                            value="{{ $data->business_address }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="abn" class="form-label">ABN</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                class='lni lni-chevron-right-circle'></i></span>
                                        <input type="text" class="form-control border-start-0" id="abn" name="abn"
                                            placeholder="Enter ABN" value="{{ $data->abn }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 show-dealer" style="display:none;">
                                <div class="col-md-12">
                                    <label for="licence" class="form-label">Licence Number</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                class='lni lni-chevron-right-circle'></i></span>
                                        <input type="text" class="form-control border-start-0" id="licence" name="licence"
                                            placeholder="Enter Licence" value="{{ $data->licence }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="status" class="form-label">Status</label>
                                <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                            class='lni lni-chevron-right-circle'></i></span>
                                    <select class="form-control border-start-0" id="status" name="status" required>
                                        <option value="">Please select a type</option>
                                        <option value="0"
                                            {{ isset($data->status) && $data->status == '0' ? 'selected' : '' }}>
                                            Inactive</option>
                                        <option value="1"
                                            {{ isset($data->status) && $data->status == '1' ? 'selected' : '' }}>
                                            Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-12">
                                    <button type="submit" class="addProductSubmit-btn  btn btn-primary px-5">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                {{-- <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                      <div class="gocover" style="background: url({{ asset('assets/images/spinner.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>


                     <form id="geniusformdata"  class="row g-3" action="{{ route('admin-user-update') }}" method="POST" enctype="multipart/form-data" novalidate>
                     {{csrf_field()}}
                     <input type="hidden" name="user_id" value="{{ $data->id }}">

                        <div class="col-md-6">
                          <label for="first_name" class="form-label">First Name</label>
                          <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                            <input type="text" class="form-control border-start-0" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ $data->first_name }}" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="last_name" class="form-label">Last Name</label>
                          <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-user'></i></span>
                            <input type="text" class="form-control border-start-0" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ $data->last_name }}" />
                          </div>
                        </div>
                        <div class="col-12">
                          <label for="email" class="form-label">Email Address</label>
                          <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-message' ></i></span>
                            <input type="email" class="form-control border-start-0" id="email" name="email" placeholder="Enter E-mail Address" value="{{ $data->email }}" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="phone" class="form-label">Phone No</label>
                          <div class="input-group"> <span class="input-group-text bg-transparent"><i class='bx bxs-microphone' ></i></span>
                            <input type="text" class="form-control border-start-0" id="phone" name="phone" placeholder="Enter Phone Numbers" value="{{ $data->phone }}" />
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <label for="inputChoosePassword" class="form-label">Street</label>
                          <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-apartment' ></i></span>
                            <input type="text" class="form-control border-start-0" id="inputChoosePassword" placeholder="Street Address" value="{{ $data->street }}"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="Suburb" class="form-label">Suburb</label>
                          <div class="input-group"> <span class="input-group-text bg-transparent"><i class='fadeIn animated bx bx-directions' ></i></span>
                            <input type="text" class="form-control border-start-0" id="Suburb" placeholder="Suburb" name="suburb" value="{{ $data->suburb }}"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="state" class="form-label">State</label>
                          <div class="input-group"> <span class="input-group-text bg-transparent"><i class='fadeIn animated bx bx-directions' ></i></span>
                            <select class="form-control border-start-0" id="state" placeholder="Confirm Password" name="state" value="{{ $data->phone }}">
                              <option value="">Select State</option>
                              <option value="Australian Capital Territory" {{ $data->state=='Australian Capital Territory' ? 'selected' : '' }}>Australian Capital Territory</option>
                              <option value="New South Wales" {{ $data->state=='New South Wales' ? 'selected' : '' }}>New South Wales</option>
                              <option value="Northern Territory" {{ $data->state=='Northern Territory' ? 'selected' : '' }}>Northern Territory</option>
                              <option value="Queensland" {{ $data->state=='Queensland' ? 'selected' : '' }}>Queensland</option>
                              <option value="South Australia" {{ $data->state=='South Australia' ? 'selected' : '' }}>South Australia</option>
                              <option value="Tasmania" {{ $data->state=='Tasmania' ? 'selected' : '' }}>Tasmania</option>
                              <option value="Victoria" {{ $data->state=='Victoria' ? 'selected' : '' }}>Victoria</option>
                              <option value="Western Australia" {{ $data->state=='Western Australia' ? 'selected' : '' }}>Western Australia</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="country" class="form-label">Country</label>
                          <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                            <select class="form-control border-start-0" id="inputConfirmPassword" placeholder="Country" name="country">
                              <option value="">Select Country</option>
                              <option value="Australia" {{ $data->country=='Australia' ? 'selected' : '' }}>Australia</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="postal_code" class="form-label">Postal Code</label>
                          <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                            <input type="text" class="form-control border-start-0" id="postal_code" name="postal" placeholder="Postal Code" value="{{ $data->postal }}"/>
                          </div>
                        </div> 
                        <div class="col-12">
                          <label for="usertype" class="form-label">Select Profile Type</label>
                          <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                          <select class="form-control border-start-0" id="usertype" name="usertype" onchange="meThods(this)" required>
                            <option value="">Please select a type</option>
                            <option value="personal" {{ isset($data->usertype) && $data->usertype=='personal' ? 'selected' :''}}>Personal</option>
                            <option value="business"{{ isset($data->usertype) && $data->usertype=='business' ? 'selected' :''}}>Business</option>
                            <option value="dealer"{{ isset($data->usertype) && $data->usertype=='dealer' ? 'selected' :''}}>Dealer</option>
                            </select>
                          </div>
                        </div>
                        <div class="show-business" style="display:none">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="trading_name" class="form-label">Trading Name</label>
                              <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                                <input type="text" class="form-control border-start-0" id="trading_name" name="trading_name" placeholder="Enter Trading Name" value="{{ $data->trading_name }}" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="business_address" class="form-label">Business Address </label>
                              <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                                <input type="text" class="form-control border-start-0" id="business_address" name="business_address" placeholder="Enter Business Address" value="{{ $data->business_address }}" />
                              </div>
                            </div>
                            <div class="col-md-6">
                            <label for="abn" class="form-label">ABN</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                              <input type="text" class="form-control border-start-0" id="abn" name="abn" placeholder="Enter ABN" value="{{ $data->abn }}" />
                            </div>
                            </div>
                          </div>	
                        </div>
                        <div class="show-dealer" style="display:none">
                        <div class="row">
                          <div class="col-md-6">
                              <label for="licence" class="form-label">Licence Number</label>
                              <div class="input-group"> <span class="input-group-text bg-transparent"><i class='lni lni-chevron-right-circle' ></i></span>
                                <input type="text" class="form-control border-start-0" id="licence" name="licence" placeholder="Enter Licence" value="{{ $data->licence }}" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <label for="about" class="form-label">About</label>
                          <textarea  class="form-control border-start-0" name="about" id="about">{{ $data->about }}</textarea>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="col-12">
                          <button type="submit" class="addProductSubmit-btn">Save</button>
                        </div>
                      </div>
                    </form>


                      </div>
                    </div>
                  </div> --}}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $(".myTags").tagit();
        });

        $(window).on('load', function() {
            var element = document.getElementById('usertype');
            meThods(element)
        });

        function meThods(val) {
            if (val.value == "business") {
                $('.show-business').show()
            } else if (val.value == "dealer") {
                $('.show-business').show()
                $('.show-dealer').show()

            } else {
                $('.show-business').hide()
                $('.show-dealer').hide()
            }
        }
    </script>

@endsection
