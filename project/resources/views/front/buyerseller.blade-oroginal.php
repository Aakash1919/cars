@extends('layouts.front')

@section('content')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="pagetitle">
                    Buyer/Seller
                </h1>
                <ul class="pages">
                    <li>
                        <a href="{{ route('front.index') }}">
                            {{ $langg->lang1 }}
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            {{ $langg->lang310 }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<section class="custom-section">
    <div class="container">
        <div class="user-intro">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <figure>
                        <img class="cars" src="{{asset('assets/front/images/buy-sell1.jpg')}}" alt="" alt="Generic placeholder image">
                    </figure>
                </div>
                <div class="col-xl-6 col-md-6">
                    <article class="section-heading">
                        <!--<h4>Happy Buying & Selling</h4>-->
                        <h2 class="title">Start Buying & Selling</h2>
                        <p>As a buyer we give you access to vehicles listed by private sellers, smash repairers, tow truck operators, motor dealers, motor vehicle recyclers, scrap dealers and more. Once your membership is active there are no additional fees or charges that regular auctions charge, the price you offer if accepted by the seller is the price you pay. </p>
                        <p><strong>Additionally, you will also be able to list vehicles on this site at a discounted rate of $4.95 per vehicle, If you choose to be a premium member you may list unlimited vehicles for sale at no additional cost</strong></p>
                        <ul class="icon-list">
                            <li><i class="fa fa-check"></i> 
                                <span>It is your responsibility and we highly recommend you do your own REVS check on any vehicle you are purchasing prior to exchanging money.</span></li>
                            <li><i class="fa fa-check"></i> 
                                <span>It is also your responsibility to organise transport for any vehicle you are purchasing at your own expense. </span></li>
                            <li><i class="fa fa-check"></i> 
                                <span>You can cancel your membership at Anytime without additional charges.</span></li>
                            <li><i class="fa fa-check"></i> 
                                <span>Cancel Anytime</span></li>
                        </ul>
                        <a href="#" class="btn btn-md btn-custom">Get Started</a>

                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray custom-section">
    <div class="container">
        <div class="user-benefits">
            <article class="section-heading">
                {{-- <h4>Benefits of</h4> --}}
                <h2 class="title">Becoming a Buyer/Seller</h2>
            </article>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="media">
                        <div class="step-circle">
                            <figure>
                                <img class="cars" src="{{asset('assets/front/images/bid.png')}}" alt="">
                                <div class="step-count">
                                    1
                                </div>
                            </figure>
                        </div>
                        <div class="media-body ml-5">
                            <h5 class="mt-0">Bid For Cars</h5>
                            As a member you can place your silent bid on any or all vehicles currently listed Australia wide
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="media">
                        <div class="step-circle">
                            <figure>
                                <img class="cars" src="{{asset('assets/front/images/no-commision-icon.png')}}" alt="">
                                <div class="step-count">
                                    2
                                </div>
                            </figure>
                        </div>
                        <div class="media-body ml-5">
                            <h5 class="mt-0">No Commission</h5>
                            What you bid is what you pay, No additional buyer fees or commissions.
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="media">
                        <div class="step-circle">
                            <figure>
                                <img class="cars" src="{{asset('assets/front/images/private-icon.png')}}" alt="">
                                <div class="step-count">
                                    3
                                </div>
                            </figure>
                        </div>                   
                        <div class="media-body ml-5">
                            <h5 class="mt-0">Private Bids</h5>
                            Only the seller can see the bid you have placed on their vehicle.
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="media">
                        <div class="step-circle">
                            <figure>
                                <img class="cars" src="{{asset('assets/front/images/discount.png')}}" alt="">
                                <div class="step-count">
                                    4
                                </div>
                            </figure>
                        </div>
                        <div class="media-body ml-5">
                            <h5 class="mt-0">Discounted Listing</h5>
                           Standard members can list vehicles for $4.95 inc GST and Premium Members can list unlimited vehicles for free.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="custom-section user-get-started">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6">
                <div class="elegant-pricing-tables style-2 text-center px-4 pb-5 custom-pricing">
                    <div class="pricing-head">
                        <span class="price">
                            <sup>$ </sup>
                            <span class="price-digit">66</span><br>
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
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 pl-xl-5 mt-sm-4">
                <article class="text-white">
                    <h2 class="custom-title">Get Started as a Buyer/Seller</h2>
                    <p>Get started on listing your car for as little as $4.95/per car and get the desired price you want from all the offers.</p>
                    <a href="#" class="btn btn-custom btn-md">Start Buying & Selling</a>
                </article>
            </div>
        </div>
    </div>
</section>


<section class="bg-gray custom-section">
    <div class="container">
        <div class="user-benefits">
            <article class="section-heading">
                {{-- <h4>Benefits of</h4> --}}
                <h2 class="title">Becoming a PREMIUM MEMBER </h2>
            </article>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="media">
                        <div class="step-circle">
                            <figure>
                                <img class="cars" src="{{asset('assets/front/images/bid.png')}}" alt="">
                                <div class="step-count">
                                    1
                                </div>
                            </figure>
                        </div>
                        <div class="media-body ml-5">
                            <h5 class="mt-0">Bid For Cars</h5>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. 
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="media">
                        <div class="step-circle">
                            <figure>
                                <img class="cars" src="{{asset('assets/front/images/no-commision-icon.png')}}" alt="">
                                <div class="step-count">
                                    2
                                </div>
                            </figure>
                        </div>
                        <div class="media-body ml-5">
                            <h5 class="mt-0">No Commission</h5>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. 
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="media">
                        <div class="step-circle">
                            <figure>
                                <img class="cars" src="{{asset('assets/front/images/private-icon.png')}}" alt="">
                                <div class="step-count">
                                    3
                                </div>
                            </figure>
                        </div>                   
                        <div class="media-body ml-5">
                            <h5 class="mt-0">Private Bids</h5>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="media">
                        <div class="step-circle">
                            <figure>
                                <img class="cars" src="{{asset('assets/front/images/discount.png')}}" alt="">
                                <div class="step-count">
                                    4
                                </div>
                            </figure>
                        </div>
                        <div class="media-body ml-5">
                            <h5 class="mt-0">Discounted Listing</h5>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="custom-section user-get-started">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6">
                <div class="elegant-pricing-tables style-2 text-center px-4 pb-5 custom-pricing">
                    <div class="pricing-head">
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
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 pl-xl-5 mt-sm-4">
                <article class="text-white">
                    <h2 class="custom-title">Get Started as a Premium Member</h2>
                    <a href="#" class="btn btn-custom btn-md">Start Buying & Selling</a>
                </article>
            </div>
        </div>
    </div>
</section>


@endsection
