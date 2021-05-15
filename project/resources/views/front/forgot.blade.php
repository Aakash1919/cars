@extends('layouts.front')

@section('content')
	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="title">
								{{$langg->lang410}}
						</h1>
						<ul class="pages">
							<li>
								<a href="#">
									{{$langg->lang1}}
								</a>
							</li>
							<li class="active">
								<a href="#">
									{{$langg->lang410}}
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
	</div>
	<!-- Breadcrumb Area End -->

	<!-- About Area Start -->
		<section class="login-signup">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="log-reg-tab-wrapper">
                <div class="forgot-header">
                  <h3 class="text-white">{{$langg->lang410}}</h3>
                </div>
								<div class="login-area signup-area">

										<div class="login-form signup-form">
											@include('includes.admin.form-login')
											<form id="forgotform" action="{{ route('front-forgot-submit') }}" method="POST">
												{{ csrf_field() }}
												<div class="row">
													<div class="col-lg-12">
															<div class="form-input">
																	<input name="email" type="email" placeholder="{{$langg->lang411}}">
																	<i class="fas fa-envelope"></i>
																</div>
													</div>
												</div>
												<button class="submit-btn">{{$langg->lang412}}</button>
											</form>
										</div>
									</div>
						</div>
				</div>
			</div>
		</section>
	<!-- About Area End -->
@endsection

@section('scripts')
    <script>
        $('.refresh_code').on( "click", function() {
            $.get('{{url('refresh_code')}}', function(data, status){
                $('#codeimg').attr("src","{{url('assets/images')}}/capcha_code.png?time="+ Math.random());
            });
        })

    </script>
@stop
