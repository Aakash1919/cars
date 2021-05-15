@extends('layouts.front')

@section('meta-infos')
	<meta name="keywords" content="{{ $blog->meta_tag }}">
	<meta name="description" content="{{ $blog->meta_description }}">
@endsection

@section('content')
  <!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="title">
							{{ $langg->lang309 }}
						</h1>
						<ul class="pages">
							<li>
								<a href="{{ route('front.index') }}">
									{{ $langg->lang1 }}
								</a>
							</li>
							<li class="active">
								<a href="#">
									{{ $langg->lang309 }}
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<!-- Breadcrumb Area Start -->

	<!-- Blog Area Start -->
	<section class="blog blog-details">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="blog-box blog-details-box">
						<div class="blog-images">
								<div class="img">
									<img class="img-fluid" src="{{ asset('assets/images/blogs/'.$blog->photo) }}" alt="">
								</div>
								<div class="date d-flex justify-content-center">
									<div class="box align-self-center">
										<p>{{date('d', strtotime($blog->created_at))}}</p>
										<p>{{date('M', strtotime($blog->created_at))}}</p>
									</div>
								</div>
						</div>
						<div class="details">
								<h4 class="blog-title">
									{{ $blog->title }}
								</h4>
								<ul class="post-meta">
									<li>
										<a href="#">
											<i class="fas fa-user"></i>
											{{ $langg->lang16 }}
										</a>
									</li>
								</ul>
							<div class="content">
									<p class="blog-text">
											{{ $blog->details }}
									</p>
							</div>
						</div>
						<div class="social-link">
							<ul class="social-links">
                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://plus.google.com/share?url={{urlencode(url()->current()) }}"><i class="fab fa-google-plus-g"></i></a></li>
                <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary"><i class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				<div class="col-lg-4">
					<div class="blog-aside">
						<div class="serch-widget">
							<h4 class="title">
								{{ $langg->lang301 }}
							</h4>
							<form action="{{ route('front.blogsearch') }}">
								<input type="text" value="{{ request()->input('search') }}" name="search" placeholder="{{ $langg->lang302 }}" required="">
								<button class="submit" type="submit">{{ $langg->lang301 }}</button>
							</form>
						</div>
						<div class="categori">
							<h4 class="title">{{ $langg->lang303 }}</h4>
							<ul class="categori-list">
                @foreach($bcats as $cat)
                <li>
                  <a href="{{ route('front.blogcategory',$cat->slug) }}" @if(!empty($bcat) && $bcat->slug == $cat->slug) class="active"  @endif>
                    <span>{{ $cat->name }}</span>
                    <span>({{ $cat->blogs()->count() }})</span>
                  </a>
                </li>
                @endforeach
							</ul>
						</div>
						<div class="recent-post-widget">
							<h4 class="title">{{ $langg->lang304 }}</h4>
							<ul class="post-list">
                @foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get() as $blog)
                <li>
                  <div class="post">
                    <div class="post-img">
                      <img src="{{ asset('assets/images/blogs/'.$blog->photo) }}" alt="">
                    </div>
                    <div class="post-details">
                      <a href="{{ route('front.blogshow',$blog->id) }}">
                          <h4 class="post-title">
                              {{strlen($blog->title) > 45 ? substr($blog->title,0,45)." .." : $blog->title}}
                          </h4>
                      </a>
                      <p class="date">
                          {{ date('M d - Y',(strtotime($blog->created_at))) }}
                      </p>
                    </div>
                  </div>
                </li>
                @endforeach
							</ul>
						</div>
						<div class="newsletter-widget">
							<h4 class="title">
									{{ $langg->lang305 }}
							</h4>
							<div class="gocover" style="background: url({{ asset('assets/front/images/loader.gif') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
							<form id="geniusform" action="{{ route('front.subscribe') }}" method="POST">
								{{ csrf_field() }}
								@include('includes.admin.form-both')
								<input type="text" name="email" placeholder="{{ $langg->lang306 }}" required>
								<button class="submit" type="submit">{{ $langg->lang307 }}</button>
							</form>
						</div>
						<div class="tags">
							<h4 class="title">{{ $langg->lang308 }}</h4>
							<span class="separator"></span>
							<ul class="tags-list">
                @foreach($tags as $tag)
                  @if(!empty($tag))
                  <li>
                    <a href="{{ route('front.blogtags',$tag) }}">{{ $tag }} </a>
                  </li>
                  @endif
                @endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog Area End-->

@endsection

@section('scripts')
<script>

setTimeout(function() {
	$(".commentCount").each(function(i) {
		// console.log($(this).html());
		if ($(this).html() == 'Comments') {
			$(this).html('0 Comments');
		}
	});
}, 2000);



</script>
@endsection
