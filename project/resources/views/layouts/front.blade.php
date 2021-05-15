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
	<link rel="shortcut icon" href="{{asset('assets/front/images/favicon.png')}}" type="image/x-icon">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
	<!-- Plugin css -->
	<link rel="stylesheet" href="{{asset('assets/front/css/plugin.css')}}">
	<!-- stylesheet -->
	<link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">
	<!-- custom -->
	<link rel="stylesheet" href="{{asset('assets/front/css/custom.css')}}">
	<!-- base color -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors)) }}">
	<script async src = "https://www.googletagmanager.com/gtag/js?id={{ $seo->google_analytics }}" ></script>
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

	@if($gs->is_loader == 1)
		<div class="preloader" id="preloader" style="background: url({{asset('assets/front/images/loader.gif')}}) no-repeat scroll center center #FFF;"></div>
	@endif


	<!--Main-Menu Area Start-->
	<div class="mainmenu-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="{{ route('front.index') }}">
							<img src="{{asset('assets/front/images/logo.png')}}" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse fixed-height" id="main_menu">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link @if(request()->path() == '/') active @endif" href="{{ route('front.index') }}">{{ $langg->lang1 }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link @if(request()->path() == 'cars') active @endif" href="{{ route('front.cars') }}">{{ $langg->lang2 }}</a>
								</li>
								@if (!empty($menus))
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle @if (request()->is('*/pages')) active	@endif" href="#" role="button" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											{{ $langg->lang3 }}
										</a>
										<div class="dropdown-menu">
											@foreach ($menus as $key => $menu)
												<a class="dropdown-item @if (request()->is("$menu->slug/pages")) active	@endif" href="{{route('front.dynamicPage', $menu->slug)}}">{{$menu->title}}</a>
											@endforeach
										</div>
									</li>
								@endif
								@if ($gs->is_faq == 1)
								<li class="nav-item">
									<a class="nav-link @if(request()->path() == 'faq') active @endif" href="{{ route('front.faq') }}">{{ $langg->lang4 }}</a>
								</li>
								@endif

								<li class="nav-item">
									<a class="nav-link @if(request()->path() == 'blog') active @endif" href="{{ route('front.blog') }}">{{ $langg->lang5 }}</a>
								</li>

								@if ($ps->is_contact == 1)
									<li class="nav-item">
										<a class="nav-link @if(request()->path() == 'contact') active @endif" href="{{ route('front.contact') }}">{{ $langg->lang6 }} </a>
									</li>
								@endif
							</ul>
							<a href="{{ route('user.login-signup') }}" class="mybtn1 ml-4">
								@auth
									{{ $langg->lang8 }}
								@endauth
								@guest
									{{ $langg->lang7 }}
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
								<img src="{{ asset('assets/front/images/footer_logo.png')}}" alt="">
							</a>
						</div>
						<div class="text">
							<p>
								{{ $gs->footer }}
							</p>
						</div>

					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget address-widget">
						<h4 class="title">
							{{ $langg->lang18 }}
						</h4>
						<ul class="about-info">
							<li>
								<p>
										<i class="fas fa-globe"></i>
									{{ $gs->footer_address }}
								</p>
							</li>
							<li>
								<p>
										<i class="fas fa-phone"></i>
										{{ $gs->footer_phone }}
								</p>
							</li>
							<li>
								<p>
										<i class="far fa-envelope"></i>
										{{ $gs->footer_email }}
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
						<div class="footer-widget  footer-newsletter-widget">
							<h4 class="title">
								{{ $langg->lang19 }}
							</h4>
							@include('includes.admin.form-both')
							<div class="gocover" style="background: url({{ asset('assets/front/images/loader.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
							<div class="newsletter-form-area">
								<form id="geniusform" action="{{ route('front.subscribe') }}" method="post">
									{{ csrf_field() }}
									<input type="email" name="email" placeholder="Your email address..." required>
									<button type="submit">
										<i class="far fa-paper-plane"></i>
									</button>
								</form>
							</div>
							<div class="social-links">
								<h4 class="title">
										{{ $langg->lang20 }} :
								</h4>
								<div class="fotter-social-links">
									<ul>
										@if ($gs->f_status == 1)
	                  <li>
	                     <a href="{{$gs->facebook}}" target="_blank">
	                     <i class="fab fa-facebook-f"></i>
	                     </a>
	                  </li>
	                  @endif
	                  @if ($gs->t_status == 1)
	                  <li>
	                     <a href="{{$gs->twitter}}" target="_blank">
	                     <i class="fab fa-twitter"></i>
	                     </a>
	                  </li>
	                  @endif
	                  @if ($gs->i_status == 1)
	                  <li>
	                     <a href="{{$gs->instagram}}" target="_blank">
	                     <i class="fab fa-instagram"></i>
	                     </a>
	                  </li>
	                  @endif
	                  @if ($gs->g_status == 1)
	                  <li>
	                     <a href="{{$gs->gplus}}" target="_blank">
	                     <i class="fab fa-google-plus-g"></i>
	                     </a>
	                  </li>
	                  @endif
	                  @if ($gs->l_status == 1)
	                  <li>
	                     <a href="{{$gs->linkedin}}" target="_blank">
	                     <i class="fab fa-linkedin-in"></i>
	                     </a>
	                  </li>
	                  @endif
	                  @if ($gs->d_status == 1)
	                  <li>
	                     <a href="{{$gs->dribble}}" target="_blank">
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
									<p>{{$gs->copyright }}</p>
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

	<!-- jquery -->
	<script src="{{asset('assets/front/js/jquery.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
	<!-- popper -->
	<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
	<!-- plugin js-->
	<script src="{{asset('assets/front/js/plugin.js')}}"></script>
	<script src="{{asset('assets/front/js/toltip.js')}}"></script>
	<!-- main -->
	<script src="{{asset('assets/front/js/main.js')}}"></script>
	<script>
		var gs = @php echo json_encode($gs) @endphp;
	</script>
	<!-- custom -->
	<script src="{{asset('assets/front/js/custom.js')}}"></script>

	@yield('scripts')
</body>

</html>
