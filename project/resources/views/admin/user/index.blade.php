@extends('layouts.admin')

@section('content')
					<input type="hidden" id="headerdata" value="USER">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">Sellers</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">Dashboard </a>
											</li>
											<li>
												<a href="{{ route('admin-user-index') }}">Seller Management</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row">
								<div class="col-lg-12">
									<div class="mr-table allproduct">

                        @include('includes.admin.form-success')

										<div class="table-responsiv">
												<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<thead>
														<tr>
			                        <th>First Name</th>
			                        <th>Username</th>
			                        <th>Email</th>
															<th>Phone</th>
			                        <th>Action</th>
														</tr>
													</thead>
												</table>
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



@endsection


@section('scripts')

{{-- DATA TABLE --}}

    <script type="text/javascript">

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('admin-user-datatables') }}',
               columns: [
                  { data: 'first_name', name: 'first_name' },
                  { data: 'username', name: 'username' },
									{ data: 'email', name: 'email' },
									{ data: 'phone', name: 'phone', searchable: false, orderable: false },
                  { data: 'action', name: 'action', searchable: false, orderable: false},
								],
                language : {
                	processing: '<img src="{{asset('assets/images/spinner.gif')}}">'
                },
					drawCallback : function( settings ) {
		    				$('.select').niceSelect();
					}
      });


{{-- DATA TABLE ENDS--}}

		$(document).ready(function() {
			$("#geniustable_length").parent().addClass('col-sm-8');
		});
</script>

@endsection
