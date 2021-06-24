@extends('layouts.front')

@section('content')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="pagetitle">
                    Seller
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
                        <img class="cars" src="{{asset('assets/front/images/happy-seller-1.jpg')}}" alt="" alt="Generic placeholder image">
                    </figure>
                </div>
                <div class="col-xl-6 col-md-6">
                    <article class="section-heading">
                        <h4>Happy Selling</h4>
                        <h2 class="title">Get The Best Value Out of Your Sale</h2>
                        <p>At car salvage sales we are connecting sellers of vehicles that are damaged, un-road worthy, unregistered or just unwanted, with hundreds of potential buyers for their vehicles, in the past these vehicles would have gone to scrap yards or metal recyclers for a fraction of their value. </p>
                        <p><strong>Dont think that your vehicle has no value left in it and accept a fraction of its true value.</strong></p>
                        <ul class="icon-list">
                            <li><i class="fa fa-check"></i> 
                                <span>While your add is running you will directly receive offers from registered professional buyers.</span></li>
                            <li><i class="fa fa-check"></i> 
                                <span>There is no option or need to put a reserve price on your vehicle, as it is totally up to you if you choose to accept an offer and contact the buyer.</span></li>
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
                <h2 class="title">Becoming a Seller</h2>
            </article>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="media">
                        <div class="step-circle">
                            <figure>
                                <img class="cars" src="{{asset('assets/front/images/receive-icon.png')}}" alt="">
                                <div class="step-count">
                                    1
                                </div>
                            </figure>
                        </div>
                        <div class="media-body ml-5">
                            <h5 class="mt-0">Recieve Offers</h5>
                            Once you have listed your vehicle it will be seen by professional buyers who will value your vehicle and make genuine offers on it, buyers can not see what their competitors have offered giving you the upper hand 
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
                            Buyers do not get charged buyers fees or commissions if they successfully make you a winning offer allowing them to pass these savings on and offer you more for your vehicle 
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
                            <h5 class="mt-0">Private Contact Details</h5>
                            Your privacy is of the upmost importance to us and for that reason at no time will we give prospective buyers your contact details, you will receive offers through our private messaging system and it is totally up to you if you choose to contact a buyer that has made an offer on your vehicle 
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="media">
                        <div class="step-circle">
                            <figure>
                                <img class="cars" src="{{asset('assets/front/images/cancel-icon.png')}}" alt="">
                                <div class="step-count">
                                    4
                                </div>
                            </figure>
                        </div>
                        <div class="media-body ml-5">
                            <h5 class="mt-0">End Anytime</h5>
                            Wether you choose for you vehicle to listed for 24hrs, 72hrs or 7days you a free to end your add at anytime. Again we recommend you allow your add to run as long as possible cause you never know the next offer could be the best offer 
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
                <div class="elegant-pricing-tables style-2 text-center px-4 pb-5 custom-pricing mb-md-5">
                    <div class="pricing-head">
                        <!--<h3>Seller</h3>-->
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
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 pl-xl-5 mt-sm-4">
                <article class="text-white">
                    <h2 class="custom-title">Get Started as a Seller</h2>
                    <p>Get started on listing your car for as little as $9.95/per car and get the desired price you want from all the offers.</p>
                    <a href="#" class="btn btn-custom btn-md">List My Car</a>
                </article>
            </div>
        </div>
    </div>
</section>



@endsection
