@extends('layouts.admin')

@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">Language Settings</h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                        </li>
                        <li>
                          <a href="{{ route('admin-lang-edit',1) }}">Language Settings</a>
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
                      <form id="geniusform" action="{{route('admin-lang-update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                      @include('includes.admin.form-both')
                        {{-- <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Language *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="language" placeholder="Language" value="{{$data->language}}" required="">
                          </div>
                        </div>

                      <hr> --}}
                      <input type="hidden" name="language" value="{{$data->language}}">
                        <h4 class="text-center">HEADER</h4>

                      <hr>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Home *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang1" placeholder="Home" required="" value="{{ $lang->lang1 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Cars *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang2" placeholder="Cars" required="" value="{{ $lang->lang2 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Pages *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang3" placeholder="Pages" required="" value="{{ $lang->lang3 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">FAQ *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang4" placeholder="FAQ" required="" value="{{ $lang->lang4 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Blog *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang5" placeholder="Blog" required="" value="{{ $lang->lang5 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Contact *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang6" placeholder="Contact" required="" value="{{ $lang->lang6 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Login/Register *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang7" placeholder="Login/Register" required="" value="{{ $lang->lang7 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Dashboard *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang8" placeholder="Dashboard" required="" value="{{ $lang->lang8 }}">
                          </div>
                        </div>

                        <hr>

                          <h4 class="text-center">HOME PAGE</h4>

                        <hr>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Brand *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang9" placeholder="Brand" required="" value="{{ $lang->lang9 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Condition *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang10" placeholder="Condition" required="" value="{{ $lang->lang10 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Pricing Range (USD) *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang11" placeholder="Pricing Range (USD)" required="" value="{{ $lang->lang11 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Search *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang12" placeholder="Search" required="" value="{{ $lang->lang12 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Views *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang13" placeholder="Views" required="" value="{{ $lang->lang13 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Days ago *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang14" placeholder="Days ago" required="" value="{{ $lang->lang14 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">View More *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang15" placeholder="View More" required="" value="{{ $lang->lang15 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Admin *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang16" placeholder="Admin" required="" value="{{ $lang->lang16 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Read More *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang17" placeholder="Read More" required="" value="{{ $lang->lang17 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Address *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang18" placeholder="Address" required="" value="{{ $lang->lang18 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Newsletter *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang19" placeholder="Newsletter" required="" value="{{ $lang->lang19 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">FOLLOW US*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang20" placeholder="FOLLOW US" required="" value="{{ $lang->lang20 }}">
                          </div>
                        </div>

                      <hr>

                        <h4 class="text-center">CARS PAGE</h4>

                      <hr>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Search*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang21" placeholder="Search" required="" value="{{ $lang->lang21 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Filter Results By*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang22" placeholder="Filter Results By" required="" value="{{ $lang->lang22 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Sort By*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang23" placeholder="Sort By" required="" value="{{ $lang->lang23 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Latest*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang24" placeholder="Latest" required="" value="{{ $lang->lang24 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Oldest *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang25" placeholder="Oldest" required="" value="{{ $lang->lang25 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Price: High to Low *</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang26" placeholder="Price: High to Low" required="" value="{{ $lang->lang26 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Price: Low to High*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang27" placeholder="Price: Low to High" required="" value="{{ $lang->lang27 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">View*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang28" placeholder="View" required="" value="{{ $lang->lang28 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">10*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang29" placeholder="10" required="" value="{{ $lang->lang29 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">20*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang30" placeholder="20" required="" value="{{ $lang->lang30 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">30*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang31" placeholder="30" required="" value="{{ $lang->lang31 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">40*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang32" placeholder="40" required="" value="{{ $lang->lang32 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">50*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang33" placeholder="50" required="" value="{{ $lang->lang33 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Apply*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang34" placeholder="Apply" required="" value="{{ $lang->lang34 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">All Categories*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang35" placeholder="All Categories" required="" value="{{ $lang->lang35 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Brand*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang36" placeholder="Brand" required="" value="{{ $lang->lang36 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Apply*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang37" placeholder="Apply" required="" value="{{ $lang->lang37 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Show More*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang38" placeholder="Show More" required="" value="{{ $lang->lang38 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Show Less*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang39" placeholder="Show Less" required="" value="{{ $lang->lang39 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Fuel Types*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang40" placeholder="Fuel Types" required="" value="{{ $lang->lang40 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Select Fuel Type*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang41" placeholder="Select Fuel Type" required="" value="{{ $lang->lang41 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Transmission Type*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang42" placeholder="Transmission Type" required="" value="{{ $lang->lang42 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Select Transmission*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang43" placeholder="Select Transmission" required="" value="{{ $lang->lang43 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Condition*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang44" placeholder="Condition" required="" value="{{ $lang->lang44 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Select a condition*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang45" placeholder="Select a condition" required="" value="{{ $lang->lang45 }}">
                          </div>
                        </div>

                        <hr>

                          <h4 class="text-center">CAR DETAILS PAGE</h4>

                        <hr>


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">DETAILS INFO*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang46" placeholder="DETAILS INFO" required="" value="{{ $lang->lang46 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">CATEGORY*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang47" placeholder="CATEGORY" required="" value="{{ $lang->lang47 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">PRICE*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang48" placeholder="PRICE" required="" value="{{ $lang->lang48 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">NEGOTIABLE*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang49" placeholder="NEGOTIABLE" required="" value="{{ $lang->lang49 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">CONDITION*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang50" placeholder="CONDITION" required="" value="{{ $lang->lang50 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">TOP SPEED*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang51" placeholder="TOP SPEED" required="" value="{{ $lang->lang51 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">YEAR*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang52" placeholder="YEAR" required="" value="{{ $lang->lang52 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">MILEAGE*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang53" placeholder="MILEAGE" required="" value="{{ $lang->lang53 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">BRAND*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang54" placeholder="BRAND" required="" value="{{ $lang->lang54 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">MODEL*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang55" placeholder="MODEL" required="" value="{{ $lang->lang55 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">BODY TYPE*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang56" placeholder="BODY TYPE" required="" value="{{ $lang->lang56 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">FUEL TYPE*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang57" placeholder="FUEL TYPE" required="" value="{{ $lang->lang57 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">TRANSMISSION*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang58" placeholder="TRANSMISSION" required="" value="{{ $lang->lang58 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">RELATED CARS*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang59" placeholder="RELATED CARS" required="" value="{{ $lang->lang59 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Product Details*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang60" placeholder="Product Details" required="" value="{{ $lang->lang60 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Contact Info*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang61" placeholder="Contact Info" required="" value="{{ $lang->lang61 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Name*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang62" placeholder="Name" required="" value="{{ $lang->lang62 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Address*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang63" placeholder="Address" required="" value="{{ $lang->lang63 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Phone*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang64" placeholder="Phone" required="" value="{{ $lang->lang64 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Email*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang65" placeholder="Email" required="" value="{{ $lang->lang65 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Views*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang66" placeholder="Views" required="" value="{{ $lang->lang66 }}">
                          </div>
                        </div>


                        <hr>

                          <h4 class="text-center">FAQ PAGE</h4>

                        <hr>


                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">FAQ*</h4>
                                  <p class="sub-heading">(In Any Language)</p>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <input type="text" class="input-field" name="lang67" placeholder="FAQ" required="" value="{{ $lang->lang67 }}">
                            </div>
                          </div>


                      <hr>

                        <h4 class="text-center">BLOG PAGE</h4>

                      <hr>


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Comments*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang300" placeholder="Comments" required="" value="{{ $lang->lang300 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Search*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang301" placeholder="Search" required="" value="{{ $lang->lang301 }}">
                        </div>
                      </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Search Posts*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang302" placeholder="Search Posts" required="" value="{{ $lang->lang302 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Categories*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang303" placeholder="Categories" required="" value="{{ $lang->lang303 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Recent Post*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang304" placeholder="Recent Post" required="" value="{{ $lang->lang304 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Newsletter*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang305" placeholder="Newsletter" required="" value="{{ $lang->lang305 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Enter your Email*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang306" placeholder="Enter your Email" required="" value="{{ $lang->lang306 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Subscribe*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang307" placeholder="Subscribe" required="" value="{{ $lang->lang307 }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">Tags*</h4>
                                <p class="sub-heading">(In Any Language)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="lang308" placeholder="Tags" required="" value="{{ $lang->lang308 }}">
                          </div>
                        </div>


                        <hr>

                          <h4 class="text-center">BLOG DETAILS PAGE</h4>

                        <hr>


                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">Blog Details*</h4>
                                  <p class="sub-heading">(In Any Language)</p>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <input type="text" class="input-field" name="lang309" placeholder="Blog Details" required="" value="{{ $lang->lang309 }}">
                            </div>
                          </div>

                          <hr>

                            <h4 class="text-center">CONTACT PAGE</h4>

                          <hr>


                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">Contact Us*</h4>
                                    <p class="sub-heading">(In Any Language)</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="lang310" placeholder="Contact Us" required="" value="{{ $lang->lang310 }}">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">Email*</h4>
                                    <p class="sub-heading">(In Any Language)</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="lang311" placeholder="Email" required="" value="{{ $lang->lang311 }}">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">Address*</h4>
                                    <p class="sub-heading">(In Any Language)</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="lang312" placeholder="Address" required="" value="{{ $lang->lang312 }}">
                              </div>
                            </div>


                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">Phones*</h4>
                                    <p class="sub-heading">(In Any Language)</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="lang313" placeholder="Phones" required="" value="{{ $lang->lang313 }}">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">Name*</h4>
                                    <p class="sub-heading">(In Any Language)</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="lang314" placeholder="Name" required="" value="{{ $lang->lang314 }}">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">Email Address*</h4>
                                    <p class="sub-heading">(In Any Language)</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="lang315" placeholder="Email Address" required="" value="{{ $lang->lang315 }}">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">Subject*</h4>
                                    <p class="sub-heading">(In Any Language)</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="lang316" placeholder="Subject" required="" value="{{ $lang->lang316 }}">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">Your Message*</h4>
                                    <p class="sub-heading">(In Any Language)</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="lang317" placeholder="Your Message" required="" value="{{ $lang->lang317 }}">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">Send Message*</h4>
                                    <p class="sub-heading">(In Any Language)</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="lang318" placeholder="Send Message" required="" value="{{ $lang->lang318 }}">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">Find us here*</h4>
                                    <p class="sub-heading">(In Any Language)</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="lang319" placeholder="Find us here" required="" value="{{ $lang->lang319 }}">
                              </div>
                            </div>

                            <hr>

                              <h4 class="text-center">Login / Register</h4>

                            <hr>


                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Login*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang400" placeholder="Login" required="" value="{{ $lang->lang400 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Register*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang401" placeholder="Register" required="" value="{{ $lang->lang401 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">First Name*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang402" placeholder="First Name" required="" value="{{ $lang->lang402 }}">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Last Name*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang403" placeholder="Last Name" required="" value="{{ $lang->lang403 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Enter Your Username*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang404" placeholder="Enter Your Username" required="" value="{{ $lang->lang404 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Enter Your Email Address*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang405" placeholder="Enter Your Email Address" required="" value="{{ $lang->lang405 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Password*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang406" placeholder="Password" required="" value="{{ $lang->lang406 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Confirm*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang407" placeholder="Confirm" required="" value="{{ $lang->lang407 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Enter the code below*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang408" placeholder="the code below" required="" value="{{ $lang->lang408 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Forgotten your password*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang409" placeholder="Forgotten your password" required="" value="{{ $lang->lang409 }}">
                                </div>
                              </div>

                              <hr>

                                <h4 class="text-center">FOGOT PASSWORD</h4>

                              <hr>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">FOGOT PASSWORD*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang410" placeholder="FOGOT PASSWORD" required="" value="{{ $lang->lang410 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Enter Your Email Address*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang411" placeholder="Enter Your Email Address" required="" value="{{ $lang->lang411 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Submit*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang412" placeholder="Submit" required="" value="{{ $lang->lang412 }}">
                                </div>
                              </div>

                              <hr>

                                <h4 class="text-center">USER PANEL</h4>

                              <hr>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Dashboard*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang68" placeholder="Dashboard" required="" value="{{ $lang->lang68 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Add Car*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang69" placeholder="Add Car" required="" value="{{ $lang->lang69 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Manage Cars*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang70" placeholder="Manage Cars" required="" value="{{ $lang->lang70 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Featured Cars*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang71" placeholder="Featured Cars" required="" value="{{ $lang->lang71 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Social Links*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang72" placeholder="Social Links" required="" value="{{ $lang->lang72 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Packages*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang73" placeholder="Packages" required="" value="{{ $lang->lang73 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Logout*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang74" placeholder="Logout" required="" value="{{ $lang->lang74 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Welcome*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang75" placeholder="Welcome" required="" value="{{ $lang->lang75 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Edit Profile*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang76" placeholder="Edit Profile" required="" value="{{ $lang->lang76 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Change Password*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang77" placeholder="Change Password" required="" value="{{ $lang->lang77 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Total Cars*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang78" placeholder="Total Cars" required="" value="{{ $lang->lang78 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Featured Cars*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang79" placeholder="Featured Cars" required="" value="{{ $lang->lang79 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Total Social Links*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang80" placeholder="Total Social Links" required="" value="{{ $lang->lang80 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">View All*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang1000" placeholder="View All" required="" value="{{ $lang->lang1000 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Recently Added Cars By You*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang81" placeholder="Recently Added Cars By You" required="" value="{{ $lang->lang81 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Title*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang82" placeholder="Title" required="" value="{{ $lang->lang82 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Brand*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang83" placeholder="Brand" required="" value="{{ $lang->lang83 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Model*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang84" placeholder="Model" required="" value="{{ $lang->lang84 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Year*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang85" placeholder="Year" required="" value="{{ $lang->lang85 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Featured*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang86" placeholder="Featured" required="" value="{{ $lang->lang86 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Actions*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang87" placeholder="Actions" required="" value="{{ $lang->lang87 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Yes*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang88" placeholder="Yes" required="" value="{{ $lang->lang88 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">No*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang89" placeholder="No" required="" value="{{ $lang->lang89 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Edit*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang90" placeholder="Edit" required="" value="{{ $lang->lang90 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Cars*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang91" placeholder="Cars" required="" value="{{ $lang->lang91 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Car Management*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang92" placeholder="Car Management" required="" value="{{ $lang->lang92 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Status*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang93" placeholder="Status" required="" value="{{ $lang->lang93 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Active*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang94" placeholder="Active" required="" value="{{ $lang->lang94 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Deactive*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang95" placeholder="Deactive" required="" value="{{ $lang->lang95 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Add Car*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang96" placeholder="Add Car" required="" value="{{ $lang->lang96 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Edit Car*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang1001" placeholder="Edit Car" required="" value="{{ $lang->lang1001 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Your current package is*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang97" placeholder="Your current package is" required="" value="{{ $lang->lang97 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">You have*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang98" placeholder="You have" required="" value="{{ $lang->lang98 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">ads left*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang99" placeholder="ads left" required="" value="{{ $lang->lang99 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">The validity of this package will end on*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang100" placeholder="The validity of this package will end on" required="" value="{{ $lang->lang100 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Enter*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang101" placeholder="Enter" required="" value="{{ $lang->lang101 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Title*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang102" placeholder="Title" required="" value="{{ $lang->lang102 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Category*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang103" placeholder="Category" required="" value="{{ $lang->lang103 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Select a category*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang104" placeholder="Select a category" required="" value="{{ $lang->lang104 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Currency Code*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang105" placeholder="Currency Code" required="" value="{{ $lang->lang105 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Currency Symbol*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang106" placeholder="Currency Symbol" required="" value="{{ $lang->lang106 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Regular Price*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang107" placeholder="Regular Price" required="" value="{{ $lang->lang107 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Sale Price*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang108" placeholder="Sale Price" required="" value="{{ $lang->lang108 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Negotiable*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang109" placeholder="Negotiable" required="" value="{{ $lang->lang109 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Top Speed*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang110" placeholder="Top Speed" required="" value="{{ $lang->lang110 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">KMH*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang111" placeholder="KMH" required="" value="{{ $lang->lang111 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Year*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang112" placeholder="Year" required="" value="{{ $lang->lang112 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Mileage*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang113" placeholder="Mileage" required="" value="{{ $lang->lang113 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Brand*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang114" placeholder="Brand" required="" value="{{ $lang->lang114 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Select a brand*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang115" placeholder="Select a brand" required="" value="{{ $lang->lang115 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Model*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang116" placeholder="Model" required="" value="{{ $lang->lang116 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Select a model*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang117" placeholder="Select a model" required="" value="{{ $lang->lang117 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Body Type*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang118" placeholder="Body Type" required="" value="{{ $lang->lang118 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Select a body type*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang119" placeholder="Select a body type" required="" value="{{ $lang->lang119 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Fuel Type*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang120" placeholder="Fuel Type" required="" value="{{ $lang->lang120 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Select a fuel type*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang121" placeholder="Select a fuel type" required="" value="{{ $lang->lang121 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Transmission Type*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang122" placeholder="Transmission Type" required="" value="{{ $lang->lang122 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Select a transmission type*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang123" placeholder="Select a transmission type" required="" value="{{ $lang->lang123 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Condition*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang124" placeholder="Condition" required="" value="{{ $lang->lang124 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Select a condition*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang125" placeholder="Select a condition" required="" value="{{ $lang->lang125 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Description*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang126" placeholder="Description" required="" value="{{ $lang->lang126 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Slider Images*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang127" placeholder="Slider Images" required="" value="{{ $lang->lang127 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">CHOOSE IMAGE*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang128" placeholder="CHOOSE IMAGE" required="" value="{{ $lang->lang128 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Featured Image*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang129" placeholder="Featured Image" required="" value="{{ $lang->lang129 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Specifications*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang130" placeholder="Specifications" required="" value="{{ $lang->lang130 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Label*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang131" placeholder="Label" required="" value="{{ $lang->lang131 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Value*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang132" placeholder="Value" required="" value="{{ $lang->lang132 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Add Specification*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang133" placeholder="Add Specification" required="" value="{{ $lang->lang133 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">SUBMIT*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang134" placeholder="SUBMIT" required="" value="{{ $lang->lang134 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">You haven't bought any package yet*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang135" placeholder="You haven't bought any package yet" required="" value="{{ $lang->lang135 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">To publish your ad*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang136" placeholder="To publish your ad" required="" value="{{ $lang->lang136 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">please buy a package*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang137" placeholder="please buy a package" required="" value="{{ $lang->lang137 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Click Here*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang138" placeholder="Click Here" required="" value="{{ $lang->lang138 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">to buy a package*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang139" placeholder="to buy a package" required="" value="{{ $lang->lang139 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Social Links*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang140" placeholder="Social Links" required="" value="{{ $lang->lang140 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Facebook*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang141" placeholder="Facebook" required="" value="{{ $lang->lang141 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Twitter*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang142" placeholder="Twitter" required="" value="{{ $lang->lang142 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Linkedin*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang143" placeholder="Linkedin" required="" value="{{ $lang->lang143 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Packages*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang144" placeholder="Packages" required="" value="{{ $lang->lang144 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Your current package is*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang145" placeholder="Your current package is" required="" value="{{ $lang->lang145 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">The validity of this package will end on*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang146" placeholder="The validity of this package will end on" required="" value="{{ $lang->lang146 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Day(s)*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang147" placeholder="Day(s)" required="" value="{{ $lang->lang147 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Get Started*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang148" placeholder="Get Started" required="" value="{{ $lang->lang148 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Renew Plan*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang149" placeholder="Renew Plan" required="" value="{{ $lang->lang149 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">NB*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang150" placeholder="NB" required="" value="{{ $lang->lang150 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">If you buy a package it will replace the previous package features*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang151" placeholder="If you buy a package it will replace the previous package features" required="" value="{{ $lang->lang151 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">You haven't bought any package yet*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang152" placeholder="You haven't bought any package yet" required="" value="{{ $lang->lang152 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">To publish your ad*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang153" placeholder="To publish your ad" required="" value="{{ $lang->lang153 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">please buy a package from below options*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang154" placeholder="please buy a package from below options" required="" value="{{ $lang->lang154 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">SELECTED PLAN DETAILS*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang155" placeholder="SELECTED PLAN DETAILS" required="" value="{{ $lang->lang155 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">NAME*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang156" placeholder="NAME" required="" value="{{ $lang->lang156 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">PRICE*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang157" placeholder="PRICE" required="" value="{{ $lang->lang157 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">ADS*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang158" placeholder="ADS" required="" value="{{ $lang->lang158 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">DURATION*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang159" placeholder="DURATION" required="" value="{{ $lang->lang159 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">SELECT PAYMENT METHOD*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang160" placeholder="SELECT PAYMENT METHOD" required="" value="{{ $lang->lang160 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Card*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang161" placeholder="Card" required="" value="{{ $lang->lang161 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Cvv*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang162" placeholder="Cvv" required="" value="{{ $lang->lang162 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Month*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang163" placeholder="Month" required="" value="{{ $lang->lang163 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Year*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang164" placeholder="Year" required="" value="{{ $lang->lang164 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Select a payment method*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang165" placeholder="Select a payment method" required="" value="{{ $lang->lang165 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Edit Profile*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang165" placeholder="Edit Profile" required="" value="{{ $lang->lang165 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Profile Picture*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang166" placeholder="Profile Picture" required="" value="{{ $lang->lang166 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">UPLOAD IMAGE*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang167" placeholder="UPLOAD IMAGE" required="" value="{{ $lang->lang167 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">First Name*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang168" placeholder="First Name" required="" value="{{ $lang->lang168 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Last Name*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang169" placeholder="Last Name" required="" value="{{ $lang->lang169 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Email Address*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang171" placeholder="Email Address" required="" value="{{ $lang->lang171 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Phone*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang172" placeholder="Phone" required="" value="{{ $lang->lang172 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Address*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang173" placeholder="Address" required="" value="{{ $lang->lang173 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Latitude*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang174" placeholder="Latitude" required="" value="{{ $lang->lang174 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Longitude*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang175" placeholder="Longitude" required="" value="{{ $lang->lang175 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">About*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang176" placeholder="About" required="" value="{{ $lang->lang176 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Change Password*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang177" placeholder="Change Password" required="" value="{{ $lang->lang177 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Current Password*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang178" placeholder="Current Password" required="" value="{{ $lang->lang178 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">New Password*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang179" placeholder="New Password" required="" value="{{ $lang->lang179 }}">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">Re-Type New Password*</h4>
                                      <p class="sub-heading">(In Any Language)</p>
                                  </div>
                                </div>
                                <div class="col-lg-7">
                                  <input type="text" class="input-field" name="lang180" placeholder="Re-Type New Password" required="" value="{{ $lang->lang180 }}">
                                </div>
                              </div>


                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">

                              </div>
                            </div>
                            <div class="col-lg-7">
                              <button class="addProductSubmit-btn" type="submit">Submit</button>
                            </div>
                          </div>
                      </form>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
