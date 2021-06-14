@extends('layouts.user')

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a></li>
        <li class="breadcrumb-item active"  aria-current="page"><a href="{{ route('user-package') }}">{{$langg->lang144}}</a></li>
            </ol>
        </nav>
    </div>
  </div>
  <div class="card">
      <div class="card-body">
      <div class="col-lg-12">
                @if (empty(Auth::user()->current_plan))
                    <div class="alert alert-warning" role="alert">
                        <p class="mb-0">You haven't bought any package yet. <strong>To publish your ad</strong> please buy a package from below options.</p>
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        <p class="mb-0">{{$langg->lang145}} <strong>{{ $boughtPlan->title }}</strong>.
                        </p>
                    </div>
                @endif
            </div>
      </div>
      
  </div>


    <div class="card">
        
        <div class="card-body">
        <div class="pricing-table">
            <div class="row">
                @if (count($plans) == 0)
                    <div class="col-lg-12">
                        <h4 class="text-center">NO PACKAGE FOUND</h4>
                    </div>
                @else
                    @foreach ($plans as $key => $plan)

                    <div class="col">
                        <div class="card <?php if($plan->title=="Seller"){echo "bg-info";} ?><?php if($plan->title=="Buyer/Seller"){echo "bg-success";} ?><?php if($plan->title=="Wholesaler"){echo "bg-primary";} ?>">
                        <div class="card-body">
                            <h5 class="card-title grey-text text-uppercase text-center">{{$plan->title ?? 'Lorem'}}</h5>
                            <h6 class="card-price text-center">${{ number_format($plan->price,0) ?? 0}}<span class="term">/week</span></h6>
                            <hr class="my-4">
                            <div class="pricing-detail">
                                {!!  $plan->details ?? 'No Detail Dound' !!}
                            </div>
                            <div class="d-grid">
                            @if ($plan->id == Auth::user()->current_plan)
                                <a href="{{ route('user-select-payment', $plan->id) }}" class="btn btn-white my-2 radius-30">{{$langg->lang149}}</a>
                            @else
                                <a href="{{ route('user-select-payment', $plan->id) }}" class="btn btn-white my-2 radius-30">{{$langg->lang148}}</a>
                            @endif
                            </div>
                        </div>
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


