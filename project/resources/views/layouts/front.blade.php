<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @if (request()->is('blog/*'))
        @yield('meta-infos')
    @else
        <meta name="keywords" content="{{ $seo->meta_keys }}">
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gs->title }}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/front/images/favicon.png') }}" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugin.css') }}">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}">
    <!-- base color -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color=' . str_replace('#', '', $gs->colors)) }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">
    <script src="{{ asset('assets/front/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.countdownTimer.min.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $seo->google_analytics }}"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{ $seo->google_analytics }}');
    </script>
</head>

<body>
    @if ($gs->is_loader == 1)
        <div class="preloader" id="preloader"
            style="background: url({{ asset('assets/front/images/loader.gif') }}) no-repeat scroll center center #FFF;">
        </div>
    @endif

    <body>


        <!--Main-Menu Area Start-->
        <div class="mainmenu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{ route('front.index') }}">
                                <img src="{{ asset('assets/front/images/logo.png') }}" alt="">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu"
                                aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse fixed-height" id="main_menu">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link @if (request()->path() == 'cars') active @endif"
                                            href="{{ route('front.cars') }}">{{ $langg->lang2 }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/seller">Seller</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/buyer-seller">Buyer/Seller</a>
                                    </li>
                                </ul>
                                @auth
                                    <a href="{{ route('user.login-signup') }}"
                                        class="mybtn1 ml-4">{{ $langg->lang8 }}</a>
                                @endauth
                                @guest
                                    <a href="{{ route('user.login-signup') }}" class="mybtn1 ml-2">Login</a>
                                    <a href="{{ route('user.login-signup1') }}" class="mybtn1 ml-2">Register</a>
                                @endguest

                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--Main-Menu Area Start-->
        @yield('content')

        <!-- Footer Area Start -->
        <footer class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="footer-widget about-widget">
                            <div class="footer-logo">
                                <a href="{{ route('front.index') }}">
                                    <img src="{{ asset('assets/front/images/footer-logo.png') }}" alt="">
                                </a>
                            </div>
                            <div class="text">
                                <p>
                                    {!! $gs->footer !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="footer-widget address-widget">
                            <h4 class="title">
                                Navigation
                            </h4>
                            <ul class="foot-list">
                                <li><a href="#"><i class="fas fa-angle-right"></i> How It Works</a></li>
                                <li><a href="#"><i class="fas fa-angle-right"></i> Rev Checks</a></li>
                                <li><a href="/login"><i class="fas fa-angle-right"></i> Sign In </a></li>
                                <li><a href="/register1"><i class="fas fa-angle-right"></i> Register</a></li>
                                <li><a href="#"><i class="fas fa-angle-right"></i> Support</a></li>
                                <li><a href="/termsandconditions"><i class="fas fa-angle-right"></i> Terms & Conditions</a></li>
                                <li><a href="/privacy"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="footer-widget  footer-newsletter-widget">
                            <h4 class="title">
                                Support
                            </h4>
                            <ul class="foot-list">
                                <li><a href="#"><i class="fas fa-phone"></i> 123456789</a></li>
                                <li><a href="#"><i class="fas fa-envelope"></i> support@carsalvagesales.com</a></li>
                            </ul>

                            <div class="social-links">
                                <h4 class="title">
                                    {{ $langg->lang20 }} :
                                </h4>
                                <div class="fotter-social-links">
                                    <ul>
                                        @if ($gs->f_status == 1)
                                            <li>
                                                <a href="{{ $gs->facebook }}" target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($gs->t_status == 1)
                                            <li>
                                                <a href="{{ $gs->twitter }}" target="_blank">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($gs->i_status == 1)
                                            <li>
                                                <a href="{{ $gs->instagram }}" target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($gs->g_status == 1)
                                            <li>
                                                <a href="{{ $gs->gplus }}" target="_blank">
                                                    <i class="fab fa-google-plus-g"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($gs->l_status == 1)
                                            <li>
                                                <a href="{{ $gs->linkedin }}" target="_blank">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($gs->d_status == 1)
                                            <li>
                                                <a href="{{ $gs->dribble }}" target="_blank">
                                                    <i class="fas fa-basketball-ball"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content">
                                <div class="content">
                                    <p>&copy; Copyright 2021. All Rights Reserved. Car Salvage Sales</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End -->

        <!-- Back to Top Start -->
        <div class="bottomtotop">
            <i class="fas fa-chevron-right"></i>
        </div>
        <!-- Back to Top End -->
        <div class="modal fade" id="ResponseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="responsetitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="responsebody">
               
            </div>
            </div>
        </div>
        </div>
        <!-- jquery -->
       
        <!-- bootstrap -->
        <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
        <!-- popper -->
        <script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
        <!-- plugin js-->
        <script src="{{ asset('assets/front/js/plugin.js') }}"></script>
        <script src="{{ asset('assets/front/js/toltip.js') }}"></script>
        <!-- main -->
        <script src="{{ asset('assets/front/js/main.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        @include('includes.form-success')
        <!-- custom -->
        <script src="{{ asset('assets/front/js/custom.js') }}"></script>
        
        <script src="{{ asset('/assets/theme/assets/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
        @yield('scripts')
        <script>
        function showpopup(status,title,message,action){
            $("#responsetitle").html(title);
            var ResponseMessage = '<div class="alert alert-' + status + '" role="alert">'+ message +'</div>';
            $("#responsebody").html(ResponseMessage);
            $('#ResponseModal').modal(action);
            }
         function showTimer(auctiondate,mydiv){
             console.log('executed');
            var expiredDays = auctiondate;
            var countDownDate = new Date(expiredDays).getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                $("#"+ mydiv).innerHTML = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    $("#"+ mydiv).innerHTML = "EXPIRED";
                }
            }, 1000);
         }
        </script>
    </body>

</html>
