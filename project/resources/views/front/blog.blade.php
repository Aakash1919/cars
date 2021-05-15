@extends('layouts.front')
@section('content')


  <!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="title">
							{{ $langg->lang5 }}
						</h1>
						<ul class="pages">
							{{-- Category Breadcumbs --}}

		          @if(isset($bcat))

		              <li>
		                <a href="{{ route('front.index') }}">
		                  {{ $langg->lang1 }}
		                </a>
		              </li>
		              <li class="active">
		                <a href="{{ route('front.blog') }}">
		                  {{ $langg->lang5 }}
		                </a>
		              </li>
		              <li>
		                <a href="{{ route('front.blogcategory',$bcat->slug) }}">
		                  {{ $bcat->name }}
		                </a>
		              </li>

		          @elseif(isset($slug))

		              <li>
		                <a href="{{ route('front.index') }}">
		                  {{ $langg->lang1 }}
		                </a>
		              </li>
		              <li class="active">
		                <a href="{{ route('front.blog') }}">
		                  {{ $langg->lang5 }}
		                </a>
		              </li>
		              <li>
		                <a href="{{ route('front.blogtags',$slug) }}">
		                  {{ $langg->lang308 }}: {{ $slug }}
		                </a>
		              </li>

		          @elseif(isset($search))

		              <li>
		                <a href="{{ route('front.index') }}">
		                  {{ $langg->lang1 }}
		                </a>
		              </li>
		              <li class="active">
		                <a href="{{ route('front.blog') }}">
		                  {{ $langg->lang5 }}
		                </a>
		              </li>
		              <li>
		                <a href="Javascript:;">
		                  {{ $langg->lang12 }}
		                </a>
		              </li>
		              <li>
		                <a href="Javascript:;">
		                  {{ $search }}
		                </a>
		              </li>

		          @else

		              <li>
		                <a href="{{ route('front.index') }}">
		                  {{ $langg->lang1 }}
		                </a>
		              </li>
		              <li class="active">
		                <a href="{{ route('front.blog') }}">
		                  {{ $langg->lang5 }}
		                </a>
		              </li>
		          @endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	<!-- Breadcrumb Area Start -->

	<!-- Blog Area Start -->
	<section class="blog blog-page" id="blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">

          @foreach($blogs as $blogg)
							<div class="blog-box">
								<div class="blog-images">
										<div class="img">
											<img src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}" class="img-fluid" alt="">
										</div>
										<div class="date d-flex justify-content-center">
											<div class="box align-self-center">
												<p>{{date('d', strtotime($blogg->created_at))}}</p>
												<p>{{date('M', strtotime($blogg->created_at))}}</p>
											</div>
										</div>
								</div>
								<div class="details">
                    <a href='{{route('front.blogshow',$blogg->id)}}'>
                      <h4 class="blog-title">
                        {{strlen($blogg->title) > 50 ? substr($blogg->title,0,50)."...":$blogg->title}}
                      </h4>
                    </a>
										<ul class="post-meta">
											<li>
												<a href="#">
													<i class="fas fa-user"></i>
													{{ $langg->lang16 }}
												</a>
											</li>
										</ul>
									<p class="blog-text">
										{{strlen(strip_tags($blogg->details)) > 248 ? substr(strip_tags($blogg->details),0,248) . '...' : substr(strip_tags($blogg->details),0,248) }}
									</p>
								</div>
							</div>
            @endforeach

						<div class="row mt-5 mb-5">
							<div class="col-lg-12 text-center">
								{{ $blogs->appends(['search' => request()->input('search')])->links() }}
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
