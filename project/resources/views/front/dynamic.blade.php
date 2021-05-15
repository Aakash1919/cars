@extends('layouts.front')

@section('content')
	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="pagetitle">
						{{$menu->title}}
					</h1>
					<ul class="pages">
						<li>
							<a href="{{ route('front.index') }}">
								{{ $langg->lang1 }}
							</a>
						</li>
						<li class="active">
							<a href="#">
									{{$menu->title}}
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Area End -->


	<!-- About Area Start -->
		<section class="about about-page">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h3 class="title">{{$menu->title}}</h3>
						<p>
							{{$menu->details}}
						</p>
					</div>
				</div>
			</div>
		</section>
	<!-- About Area End -->
@endsection
