@extends('layouts.front')
@section('content')
<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="pagetitle">
                    Terms and Conditions
					</h1>
					<ul class="pages">
						<li>
							<a href="{{ route('front.index') }}">
								{{ $langg->lang1 }}
							</a>
						</li>
						<li class="active">
							<a href="#">
									Terms and Conditions
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content">
                <h4>Terms and Conditions</h4>
                <p>
                    This is placeholder for terms and conditions.
                </p>
</div>
</div>
</div>
</div>
@endsection