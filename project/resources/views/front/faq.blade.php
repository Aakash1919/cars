@extends('layouts.front')

@section('content')
  <!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="title">
								{{ $langg->lang67 }}
						</h1>
						<ul class="pages">
							<li>
								<a href="{{ route('front.index') }}">
									{{ $langg->lang1 }}
								</a>
							</li>
							<li class="active">
								<a href="#">
									{{ $langg->lang67 }}
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
	</div>
	<!-- Breadcrumb Area End -->

	<!-- Faq Area Area Start -->
	<section class="faq-section">
		<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-10">
				<div id="accordion">

          @foreach ($faqs as $key => $faq)
            <!-- Question 1 -->
  					<h3 class="heading">{{ $faq->title }}</h3>
  					<div class="content">
  							<p>{{ $faq->details }} </p>
  					</div>
          @endforeach

				</div>
			</div>
		</div>
		</div>
	</section>
	<!-- Faq Area Area End -->
@endsection
