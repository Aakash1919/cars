@extends('layouts.user')
@section('content')

						<div class="content-area">
							<div class="mr-breadcrumb">
								<div class="row">
									<div class="col-lg-12">
											<h4 class="heading">{{$langg->lang77}}</h4>
											<ul class="links">
												<li>
													<a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a>
												</li>
												<li>
													<a href="{{ route('user.password') }}">{{$langg->lang77}} </a>
												</li>
											</ul>
									</div>
								</div>
							</div>
							<div class="add-product-content">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">

				                        <div class="gocover" style="background: url({{ asset('assets/images/spinner.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
											<form id="geniusform" action="{{ route('user.password.update') }}" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}

                        @include('includes.admin.form-both')

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{$langg->lang78}} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="password" class="input-field" name="cpass" placeholder="{{$langg->lang101}} {{$langg->lang78}}" required="" value="">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{$langg->lang79}} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="password" class="input-field" name="newpass" placeholder="{{$langg->lang101}} {{$langg->lang79}}" required="" value="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{$langg->lang80}} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="password" class="input-field" name="renewpass" placeholder="{{$langg->lang80}}" required="" value="">
													</div>
												</div>

						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">

						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <button class="addProductSubmit-btn" type="submit">{{$langg->lang412}}</button>
						                          </div>
						                        </div>

											</form>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

@endsection
