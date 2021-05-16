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
            </div>

            <div class="row px-5">
                @if (count($plans) == 0)
                    <div class="col-lg-12">
                        <h4 class="text-center">NO PACKAGE FOUND</h4>
                    </div>
                @else
                    @foreach ($plans as $key => $plan)
                    <div class="col-lg-4">
                        <div class="elegant-pricing-tables style-2 text-center px-4 pb-5 custom-pricing">
                            <div class="pricing-head">
                                <h3>{{$plan->title ?? 'Lorem'}}</h3>
                                <span class="price">
                                    <sup>$ </sup>
                                    <span class="price-digit">{{ number_format($plan->price,0) ?? 0}}</span><br>
                                    <span class="price-month">/ week</span>
                                </span>
                            </div>
                            <div class="pricing-detail">
                                {!!  $plan->details ?? 'No Detail Dound' !!}
                            </div>
                            @if ($plan->id == Auth::user()->current_plan)
                                <a href="{{ route('user-select-payment', $plan->id) }}" class="btn btn-default mb-0">{{$langg->lang149}}</a>
                            @else
                                <a href="{{ route('user-select-payment', $plan->id) }}" class="btn btn-default mb-0">{{$langg->lang148}}</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12">
                        <p class="mb-0 mt-4 text-center text-danger"><strong>{{$langg->lang150}}: {{$langg->lang151}}.</strong></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endsection


