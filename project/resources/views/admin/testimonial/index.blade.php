@extends('layouts.admin')

@section('content')
					<input type="hidden" id="headerdata" value="TESTIMONIAL">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">Testimonials</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">Dashboard </a>
											</li>
											<li>
												<a href="{{ route('admin-tstm-index') }}">Testimonial Management</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row p-4">
								<div class="col-12">
									@include('includes.admin.form-success')
								</div>
								<div class="col-12">
									<div class="card">
										<div class="card-header" style="background-color: #2d3274;">
											<h4 class="text-white text-uppercase mb-0">Title & Subtitle</h4>
										</div>
										<div class="card-body">
											<form id="geniusform" class="" action="{{ route('admin-ps-update') }}" method="post">
												{{ csrf_field() }}
												<div class="row">
													<div class="col-lg-12">
														<div class="left-area">
																<strong class="mb-2 d-block">Background *</strong>
														</div>
													</div>
													<div class="col-lg-12">
														<div class="img-upload">
																<div id="image-preview" class="img-preview" style="background: url('{{  asset('assets/images/testimonials/testimonial_bg.jpg').'?'.time() }}');">
																		<label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>Upload Image</label>
																		<input type="file" name="testimonial_bg" class="img-upload" id="image-upload">
																	</div>
														</div>
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label for=""><strong>Title *</strong></label>
															<input class="form-control" type="text" name="testimonial_title" value="{{ $ps->testimonial_title }}" placeholder="Enter title" required>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label for=""><strong>Subtitle *</strong></label>
															<input class="form-control" type="text" name="testimonial_subtitle" value="{{ $ps->testimonial_subtitle }}" placeholder="Enter subtitle" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-12 text-center">
														<div class="form-group mb-0">
															<button type="submit" class="mybtn1 addProductSubmit-btn">Submit</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="row px-4 pb-4">
								<div class="col-lg-12">
									<div class="card">
											<div class="card-header" style="background-color: #2d3274;">
												<h4 class="text-uppercase text-white mb-0">Testimonials</h4>
											</div>
											<div class="card-body">
												<div class="mr-table allproduct">

													<div class="table-responsiv">
															<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
																<thead>
																	<tr>
						                        <th>Image</th>
						                        <th>Name</th>
						                        <th>Actions</th>
																	</tr>
																</thead>
															</table>
													</div>
												</div>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>

{{-- ADD / EDIT MODAL --}}

					<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">

					<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
							<div class="submit-loader">
									<img  src="{{asset('assets/images/spinner.gif')}}" alt="">
							</div>
						<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class="modal-body">

						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
					</div>
</div>

{{-- ADD / EDIT MODAL ENDS --}}


{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

	<div class="modal-header d-block text-center">
		<h4 class="modal-title d-inline-block">Confirm Delete</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	</div>

      <!-- Modal body -->
      <div class="modal-body">
            <p class="text-center">You are about to delete this Testimonial.</p>
            <p class="text-center">Do you want to proceed?</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger btn-ok">Delete</a>
      </div>

    </div>
  </div>
</div>

{{-- DELETE MODAL ENDS --}}

@endsection


@section('scripts')

{{-- DATA TABLE --}}

    <script type="text/javascript">

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('admin-tstm-datatables') }}',
               columns: [
                  { data: 'image', name: 'image' },
                  { data: 'name', name: 'name' },
    							{ data: 'action', searchable: false, orderable: false }
               ],
                language : {
                	processing: '<img src="{{asset('assets/images/spinner.gif')}}">'
                },
				drawCallback : function( settings ) {
	    				$('.select').niceSelect();
				}
            });

      	$(function() {
        $(".btn-area").append('<div class="col-sm-4 table-contents">'+
        	'<a class="add-btn" data-href="{{route('admin-tstm-create')}}" id="add-data" data-toggle="modal" data-target="#modal1">'+
          '<i class="fas fa-plus"></i> Add New Testimonial'+
          '</a>'+
          '</div>');
      });

{{-- DATA TABLE ENDS--}}

</script>

@endsection
