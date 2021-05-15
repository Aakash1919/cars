@extends('layouts.front')

@section('content')
	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="pagetitle">
						{{ $langg->lang310 }}
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


	<!-- Contact Us Area Start -->
	<section class="contact-us">
		<div class="container">
			<div class="row justify-content-between">
					<div class="col-xl-5 col-lg-5">
							<div class="right-area">
								<div class="contact-info">
									<div class="left ">
											<div class="icon">
													<img src="{{asset('assets/front/images/matker.png')}}" alt="">
													<p class="lable">
														{{ $langg->lang311 }}
													</p>
											</div>
									</div>
									<div class="content d-flex align-self-center">
										<div class="content">
											{{ $ps->contact_email }}
										</div>
									</div>
								</div>
								<div class="contact-info">
										<div class="left">
												<div class="icon">
														<img src="{{asset('assets/front/images/envelop.png')}}" alt="">
														<p class="lable">
															{{ $langg->lang312 }}
														</p>
												</div>
										</div>
										<div class="content d-flex align-self-center">
											<div class="content">
													<p>
														{{ $ps->contact_address }}
													</p>
											</div>
										</div>
									</div>
									<div class="contact-info">
											<div class="left">
													<div class="icon">
															<img src="{{asset('assets/front/images/call.png')}}" alt="">
															<p class="lable">
																{{ $langg->lang313 }}
															</p>
													</div>
											</div>
											<div class="content d-flex align-self-center">
												@php
													$phones = explode(',', $ps->contact_phone)
												@endphp
												<div class="content">
													@foreach ($phones as $key => $phone)
														<a href="#">
																{{ $phone }}
														</a>
													@endforeach
												</div>
											</div>
										</div>
										<div class="social-links">
											<h4 class="title">{{ $langg->lang319 }} :</h4>
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
				<div class="col-xl-7 col-lg-7">
					<div class="left-area">
						<div class="contact-form">
							<div class="gocover" style="background: url({{ asset('assets/front/images/loader.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
							<form id="geniusform" action="{{ route('front.sendmail') }}" method="POST">
								@include('includes.admin.form-both')
								{{ csrf_field() }}
								<div class="row">
										<div class="col-lg-12">
												<div class="form-input">
														<input type="text" name="name" placeholder="{{ $langg->lang314 }} *" required>
														<i class="fas fa-user"></i>
													</div>
										</div>
										<div class="col-lg-12">
												<div class="form-input">
														<input type="email" name="email" placeholder="{{ $langg->lang315 }} *" required>
														<i class="fas fa-envelope"></i>
													</div>
										</div>
										<div class="col-lg-12">
												<div class="form-input">
														<input type="text" name="subject" placeholder="{{ $langg->lang316 }}" required>
														<i class="fas fa-pen-square"></i>
													</div>
										</div>
										<div class="col-lg-12">
												<div class="form-input">
														<textarea name="message" placeholder="{{ $langg->lang317 }} *" required></textarea>
												</div>
										</div>
										<div class="col-lg-12">
												<button class="submit-btn mybtn1" type="submit">{{ $langg->lang318 }}</button>
										</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Contact Us Area End-->
@endsection
