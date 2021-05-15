@extends('layouts.user')

@section('content')
<div class="content-area" id="contentArea">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">{{$langg->lang144}}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a>
                    </li>
                    <li>
                        <a href="{{ route('user-package') }}">{{$langg->lang144}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="add-product-content py-5">
        <div class="row px-5">
            <div class="col-lg-12">
                @if (empty(Auth::user()->current_plan))
                <div class="alert alert-warning" role="alert">
                    <p class="mb-0">You haven't bought any package yet. <strong>To publish your ad</strong> please buy a package from below options.</p>
                </div>
                @else
                <div class="alert alert-warning" role="alert">
                    <p class="mb-0">{{$langg->lang145}} <strong>{{ $boughtPlan->title }}</strong>.
                        @if (!empty($boughtPlan->days))
                        {{$langg->lang146}} <strong>{{ date('jS M, o', strtotime(Auth::user()->expired_date)) }}</strong>.
                        @else
                        The validity of this package is <strong>Lifetime</strong>.
                        @endif
                    </p>
                </div>
                @endif
            </div><!--
          </div>-->

            <div class="row px-5 pt-4">
                <!--        @if (count($plans) == 0)
                          <div class="col-lg-12">
                            <h4 class="text-center">NO PACKAGE FOUND</h4>
                          </div>
                        @else-->
                <!--@foreach ($plans as $key => $plan)-->
<!--                <div class="col-lg-4">
                    <div class="elegant-pricing-tables style-2 text-center px-4 pb-5">
                        <div class="pricing-head">
                            <h3>Seller</h3>
                            <span class="price">
                                <sup>$ </sup>
                                <span class="price-digit">0</span><br>
                                <span class="price-month">/ week</span>
                            </span>
                        </div>
                        <div class="pricing-detail">
                            <ul class="list">
                                <li>Basic Vehicle Information <i class="fa fa-check"></i></li>
                                <li>List Car $4.95 / per car</li>
                                <li>Full Vehicle Information <i class="fa fa-fa-close"></i></li>
                                <li>Bid On Vehicles <i class="fa fa-fa-close"></i></li>
                                <li></li>
                            </ul>
                            <span>{{ $plan->details }}</span>
                        </div>
                        <a href="#" class="btn btn-default mb-0">Get Started</a>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    <p class="mb-0 mt-4 text-center text-danger"><strong>{{$langg->lang150}}: {{$langg->lang151}}.</strong></p>
                </div>
                @endif
            </div>-->

        </div>
    </div>
    <div class="add-product-content py-5">
        <div class="row px-5">
            <div class="col-lg-4">
                <div class="elegant-pricing-tables style-2 text-center px-4 pb-5 custom-pricing">
                    <div class="pricing-head">
                        <h3>Seller</h3>
                        <span class="price">
                            <sup>$ </sup>
                            <span class="price-digit">0</span><br>
                            <span class="price-month">/ week</span>
                        </span>
                    </div>
                    <div class="pricing-detail">
                        <ul class="list">
                            <li>Basic Vehicle Information <i class="fa fa-check"></i></li>
                            <li>List Car Price <span class="badge custom-badge">$9.95 / per listing</span></li>
                            <li>Full Vehicle Information <i class="fa fa-times"></i></li>
                            <li>Bid On Vehicles <i class="fa fa-times"></i></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-default mb-0">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="elegant-pricing-tables style-2 text-center px-4 pb-5 custom-pricing">
                    <div class="pricing-head">
                        <h3>Buyer/Seller</h3>
                        <span class="price">
                            <sup>$ </sup>
                            <span class="price-digit">60</span><br>
                            <span class="price-month">/ week</span>
                        </span>
                    </div>
                    <div class="pricing-detail">
                        <ul class="list">
                            <li>Advanced Vehicle Information <i class="fa fa-check"></i></li>
                            <li>List Car price <span class="badge custom-badge">$4.95 / per listing</span></li>
                            <li>Full Vehicle Information <i class="fa fa-check"></i></li>
                            <li>Bid On Vehicles <i class="fa fa-check"></i></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-default mb-0">Get Started</a> 
                </div>
            </div>
            <div class="col-lg-4">
                <div class="elegant-pricing-tables style-2 text-center px-4 pb-5 custom-pricing">
                    <div class="pricing-head">
                        <h3>Wholesaler</h3>
                        <span class="price">
                            <sup>$ </sup>
                            <span class="price-digit">99</span><br>
                            <span class="price-month">/ week</span>
                        </span>
                    </div>
                    <div class="pricing-detail">
                        <ul class="list">
                            <li>Advanced  Vehicle Information <i class="fa fa-check"></i></li>
                            <li>Unlimited <span class="badge custom-badge">Free Listing</span></li>
                            <li>Full Vehicle Information <i class="fa fa-check"></i></li>
                            <li>Bid On Vehicles <i class="fa fa-check"></i></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-default mb-0">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    @endsection


