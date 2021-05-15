<!doctype html>
<html lang="en" dir="ltr">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="author" content="GeniusOcean">
			<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Title -->
		<title>{{$gs->title}}</title>
		<!-- favicon -->
		<link rel="icon"  type="image/x-icon" href="{{asset('assets/front/images/favicon.png')}}"/>
		<!-- Bootstrap -->
		<link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
		<!-- Fontawesome -->
		<link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome.css')}}">
		<!-- icofont -->
		<link rel="stylesheet" href="{{asset('assets/admin/css/icofont.min.css')}}">
		<!-- Sidemenu Css -->
		<link href="{{asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/admin/plugins/fullside-menu/waves.min.css')}}" rel="stylesheet" />

		<link href="{{asset('assets/admin/css/plugin.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}">
		<!-- Main Css -->
		<link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet" />
		@yield('styles')

	</head>
	<body>
		<div class="page">
			<div class="page-main">
				<!-- Header Menu Area Start -->
				<div class="header">
					<div class="container-fluid">
						<div class="d-flex justify-content-between py-2">
							<div class="menu-toggle-button">
								<a class="nav-link" href="javascript:;" id="sidebarCollapse">
									<div class="my-toggl-icon">
											<span class="bar1"></span>
											<span class="bar2"></span>
											<span class="bar3"></span>
									</div>
								</a>
							</div>

							<div class="right-eliment">
								<ul class="list">

									<li class="login-profile-area">
										<a class="dropdown-toggle-1" href="javascript:;">
											<div class="user-img">
												<img src="{{ Auth::user()->image ? asset('assets/user/propics/'.Auth::user()->image ):asset('assets/user/blank.png') }}" alt="">
											</div>
										</a>
										<div class="dropdown-menu">
											<div class="dropdownmenu-wrapper">
													<ul>
														<h5>{{ $langg->lang75 }} {{Auth::user()->username}}!</h5>
															<li>
																<a href="{{ route('user.profile') }}"><i class="fas fa-user"></i> {{ $langg->lang76 }}</a>
															</li>
															<li>
																<a href="{{ route('user.password') }}"><i class="fas fa-cog"></i> {{ $langg->lang77 }}</a>
															</li>
															<li>
																<a href="{{ route('user-logout') }}"><i class="fas fa-power-off"></i> {{ $langg->lang74 }}</a>
															</li>
														</ul>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Header Menu Area End -->
				<div class="wrapper">
					<!-- Side Menu Area Start -->
					<nav id="sidebar" class="nav-sidebar">
						<ul class="list-unstyled components" id="accordion">
							<li>
								<a href="{{ route('user-dashboard') }}" class="wave-effect active"><i class="fa fa-home mr-2"></i>{{ $langg->lang68 }}</a>
							</li>

							<li><a href="{{ route('user.car.create') }}"><i class="fas fa-plus"></i> {{ $langg->lang69 }}</a></li>
							<li><a href="{{ route('user.car.index') }}"><i class="fas fa-table"></i> {{ $langg->lang70 }}</a></li>
							<li><a href="{{ route('user.car.index', 'featured') }}"><i class="fas fa-table"></i> {{ $langg->lang71 }}</a></li>
							<li><a href="{{route('user-social-index')}}"><i class="fas fa-link"></i>{{ $langg->lang72 }}</a></li>
							<li><a href="{{route('user-package')}}"><i class="fas fa-box-open"></i>{{ $langg->lang73 }}</a></li>
							<li><a href="{{route('user-logout')}}"><i class="fas fa-sign-out-alt"></i>{{ $langg->lang74 }}</a></li>

						</ul>
					</nav>

					<!-- Main Content Area Start -->
					@yield('content')
					<!-- Main Content Area End -->
					</div>
				</div>
			</div>

		<script type="text/javascript">
		  var mainurl = "{{url('/')}}";
		</script>

		<!-- Dashboard Core -->
		<script src="{{asset('assets/admin/js/vendors/jquery-1.12.4.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/vendors/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/vendors/vue.js')}}"></script>
		<!-- Fullside-menu Js-->
		<script src="{{asset('assets/admin/plugins/fullside-menu/jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets/admin/plugins/fullside-menu/waves.min.js')}}"></script>

		<script src="{{asset('assets/admin/js/plugin.js')}}"></script>
		<script src="{{asset('assets/admin/js/Chart.min.js')}}"></script>
		<script src="{{asset('assets/admin/js/tag-it.js')}}"></script>
		<script src="{{asset('assets/admin/js/nicEdit.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{asset('assets/admin/js/notify.js') }}"></script>
		<script src="{{asset('assets/admin/js/load.js')}}"></script>
		<script src="{{asset('assets/admin/js/select2.min.js')}}"></script>
		<!-- Custom Js-->
		<script src="{{asset('assets/admin/js/custom.js')}}"></script>
		<!-- AJAX Js-->
		<script src="{{asset('assets/admin/js/myscript.js')}}"></script>
		@if (session()->has('success'))
			<script>
				$.notify("{{ session('success') }}", "success");
			</script>
		@endif
		@if (session()->has('error'))
			<script>
				$.notify("{{ session('error') }}", "error");
			</script>
		@endif
		@yield('scripts')
	</body>

</html>
