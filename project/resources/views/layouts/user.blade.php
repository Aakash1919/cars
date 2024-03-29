<!doctype html>
<html lang="en" dir="ltr" class="semi-dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Title -->
        <title>{{$gs->title}}</title>
        <!-- favicon -->
        <link rel="icon"  type="image/x-icon" href="{{asset('assets/front/images/favicon.png')}}"/>
        <!-- Bootstrap -->
        <link href="{{asset('assets/theme/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
        <!-- Fontawesome -->
        <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome.css')}}">
        <!-- icofont -->
        <link rel="stylesheet" href="{{asset('assets/admin/css/icofont.min.css')}}">
        <!--favicon-->
        <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
        <!--plugins-->
        <link href="{{asset('assets/theme/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/theme/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/theme/assets/plugins/highcharts/css/highcharts.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/theme/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/theme/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/theme/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
		<link rel="stylesheet" href="{{asset('assets/theme/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}">
		<link href="{{asset('assets/theme/assets/plugins/datetimepicker/css/classic.time.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/theme/assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet" />
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <!-- Sidemenu Css 
        <link href="{{asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/admin/plugins/fullside-menu/waves.min.css')}}" rel="stylesheet" />
-->
        <link href="{{asset('assets/admin/css/plugin.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}">
        <link href="{{asset('assets/theme/assets/css/pace.min.css')}}" rel="stylesheet" />
	    <script src="{{asset('assets/theme/assets/js/pace.min.js')}}"></script>
        <!-- Main Css
        <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet" /> -->
        <link href="{{asset('assets/theme/assets/css/app.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/theme/assets/css/icons.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/theme/assets/css/dark-theme.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/theme/summernote/summernote.css')}}" rel="stylesheet">
        <link href="{{asset('assets/theme/assets/css/header-colors.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/theme/dropzone/dropzone.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/theme/dropzone/basic.css')}}" rel="stylesheet" />
		<script src="{{asset('assets/theme/assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets/theme/assets/js/jquery.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
        @yield('styles')

    </head>
    <body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('assets/front/images/loader.gif')}}" class="logo-icon" alt="{{$gs->title}}">
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
                <li><a href="{{ route('user-dashboard') }}" class="active"><i class='bx bx-home-circle'></i> &nbsp; {{ $langg->lang68 }}</a></li>
                @if (isset(Auth::user()->current_plan))
                <li>
                    <a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-car"></i> 
						</div>
						<div class="menu-title">Cars</div>
					</a>
                    <ul>
                        <li><a href="{{ route('user.car.create') }}"><i class="fadeIn animated bx bx-car"></i> &nbsp;{{ $langg->lang69 }}</a></li>
                        <li><a href="{{ route('user.car.index') }}"><i class="fadeIn animated bx bx-car"></i></i> &nbsp;{{ $langg->lang70 }}</a></li>
                        <li><a href="{{ route('user.car.index', 'featured') }}"><i class="fadeIn animated bx bx-car"></i></i> &nbsp;{{ $langg->lang71 }}</a></li>
                    </ul>
                </li>
                 <!--   <li><a href="{{route('user-social-index')}}"><i class="fas fa-link"></i> &nbsp;{{ $langg->lang72 }}</a></li>-->
                    <li><a href="{{route('user-transactions')}}"><i class="fas fa-money-check-alt"></i>&nbsp; Payment History</a></li>
                    <li><a href="{{route('user-notifications')}}"><i class="fadeIn animated bx bx-message-detail"></i>&nbsp; Notifications</a></li>


                @endif
                <li><a href="{{route('user-package')}}"><i class="fas fa-box-open"></i> &nbsp;{{ $langg->lang73 }}</a></li>
				<li><a href="{{ route('front.index') }}"><i class='fas fa-home'></i>&nbsp;Return To Home</a>
				</li>
                <li><a href="{{route('user-logout')}}"><i class="fas fa-sign-out-alt"></i>&nbsp; {{ $langg->lang74 }}</a></li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">{{count(get_notifications(Auth::user()->id))}}</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<ul style="list-style:none;">
										@foreach (get_notifications(Auth::user()->id) as $item)
											<li>

													<a style="color:black;" href="{{route('user-notifications')}}" class="msg-info">{!! ($item->status==0) ? "<i class='bx bx-bell'></i> ".$item->message." ": substr($item->message,0,30)!!} </a>
											</li>
										@endforeach
										</ul>
									</div>
									<a href="{{route('user-notifications')}}">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="user-img" src="{{ Auth::user()->image ? asset('assets/user/propics/'.Auth::user()->image ):asset('assets/user/blank.png') }}" alt="{{Auth::user()->username}}">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{Auth::user()->username}}</p>
								@if (empty(Auth::user()->current_plan))
									<p class="designattion mb-0">No Plan</p>
								@else
									<p class="designattion mb-0"> {{ get_plan_name(Auth::user()->current_plan) }}</p>
								@endif
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="bx bx-user"></i><span>Profile</span></a></li>
							<li><a class="dropdown-item" href="{{ route('user.password') }}"><i class="bx bx-cog"></i><span>Settings</span></a></li>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="{{ route('user-logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
            @yield('content')
            </div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
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
	 <div class="modal fade" id="CarResponseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carresponsetitle">Modal title</h5>
                
            </div>
            <div class="modal-body" id="carresponsebody">
               
            </div>
			<div class="modal-header">
				<button class="btn btn-primary" id="AlertSaveBtn">Save</button>
				<button class="btn btn-danger close" id="AlertCancelBtn" data-dismiss="modal" aria-label="Close">Close</button>
			</div>
            </div>
        </div>
     </div>
	<!--end wrapper-->
	
	<!-- Bootstrap JS -->
	
	<script src="{{asset('assets/theme/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/highcharts/js/highcharts.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/highcharts/js/exporting.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/highcharts/js/variable-pie.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/highcharts/js/export-data.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/highcharts/js/accessibility.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
	<script src="{{asset('assets/theme/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
	<script src="{{asset('assets/theme/assets/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/vendors/vue.js')}}"></script>
        <!-- Fullside-menu Js-->
        <script src="{{asset('assets/admin/plugins/fullside-menu/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/fullside-menu/waves.min.js')}}"></script>
		<script src="{{asset('assets/theme/assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js')}}"></script>
		<script src="{{asset('assets/theme/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/plugin.js')}}"></script>
        <script src="{{asset('assets/admin/js/Chart.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/tag-it.js')}}"></script>
        <script src="{{asset('assets/admin/js/nicEdit.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{asset('assets/admin/js/notify.js') }}"></script>
        <script src="{{asset('assets/admin/js/load.js')}}"></script>
        <script src="{{asset('assets/admin/js/select2.min.js')}}"></script>
		<script src="{{asset('assets/theme/dropzone/dropzone.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
		{{-- <script src="{{asset('assets/theme/tableexport/tableExport.js')}}"></script>
		<script src="{{asset('assets/theme/tableexport/html2canvas.js')}}"></script>
		<script src="{{asset('assets/theme/tableexport/jquery.base64.js')}}"></script>
		<script src="{{asset('assets/theme/tableexport/jspdf/libs/sprintf.js')}}"></script>
		<script src="{{asset('assets/theme/tableexport/jspdf/jspdf.js')}}"></script>
		<script src="{{asset('assets/theme/tableexport/jspdf/libs/base64.js')}}"></script> --}}
		<script src="{{asset('assets/theme/summernote/summernote.js')}}"></script>
		<script src="{{asset('assets/theme/assets/js/app.js')}}"></script>
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
		<script>
		/*	
		new PerfectScrollbar('.customers-list');
		new PerfectScrollbar('.store-metrics');
		new PerfectScrollbar('.product-list');
		*/
		// $(document).ready(function () {
		// 	$('#featuredimg').imageuploadify();
		// 	$('#gallery').imageuploadify();
		// });
		
	</script>
		        <script>
        function showpopup(status,title,message,action){
            $("#responsetitle").html(title);
            var ResponseMessage = '<div class="alert alert-' + status + '" role="alert">'+ message +'</div>';
            $("#responsebody").html(ResponseMessage);
            $('#ResponseModal').modal(action);
            }
        </script>	
    </body>

</html>
