@extends('layouts.front')

@section('content')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="pagetitle">
                    Wholesaler
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
                        <img class="cars" src="{{asset('assets/front/images/wholesaler.jpg')}}" alt="" alt="Generic placeholder image">
                    </figure>
                </div>
                <div class="col-xl-6 col-md-6">
                    <article class="section-heading">
                        <!--<h4>Happy Buying & Selling</h4>-->
                        <h2 class="title">Bulk Buying & Selling</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                        <p><strong>Additionally, you will also be able to list vehicles on this site at a discounted rate.</strong></p>
                        <ul class="icon-list">
                            <li><i class="fa fa-check"></i> 
                                <span>It is your responsibility and we highly recommend you do your own REVS check on any vehicle you are purchasing prior to exchanging money. </span></li>
                            <li><i class="fa fa-check"></i> 
                                <span>It is also your responsibility to organise transport for any vehicle you are purchasing and any cost that it incurs. </span></li>
                            <li><i class="fa fa-check"></i> 
                                <span>As a premium member you may list unlimited vehicles for sale at no additional cost.</span></li>
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
                <h4>Benefits of</h4>
                <h2 class="title">Becoming a Wholesaler</h2>
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
                                <img class="cars" src="{{asset('assets/front/images/free.png')}}" alt="">
                                <div class="step-count">
                                    4
                                </div>
                            </figure>
                        </div>
                        <div class="media-body ml-5">
                            <h5 class="mt-0">Free Listing</h5>
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
                            <li>Unlimited Listints<span class="badge custom-badge">Free Listing</span></li>
                            <li>Full Vehicle Information <i class="fa fa-check"></i></li>
                            <li>Bid On Vehicles <i class="fa fa-check"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 pl-xl-5 mt-sm-4">
                <article class="text-white">
                    <h2 class="custom-title">Get Started as a Wholesaler</h2>
                    <p>Get started on listing your car for free as a wholesaler and get the desired price you want from all the offers.</p>
                    <a href="#" class="btn btn-custom btn-md">Start Buying & Selling</a>
                </article>
            </div>
        </div>
    </div>
</section>



@endsection
