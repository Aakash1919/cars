@extends('layouts.admin')

@section('content')
					<input type="hidden" id="headerdata" value="PLAN">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">Transactions</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">Dashboard </a>
											</li>
											<li>
												<a href="{{ route('admin-payment-index') }}">Transaction Log</a>
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
															<th>User</th>
															<th>Package Name</th>
			                        <th>Amount</th>
			                        <th>Gateway</th>
														</tr>
													</thead>
												</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>




@endsection


@section('scripts')

{{-- DATA TABLE --}}

    <script type="text/javascript">

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('admin-payment-datatables') }}',
               columns: [
								  { data: 'user_name', name: 'user_name' },
								  { data: 'title', name: 'title' },
                  { data: 'amount', name: 'amount', searchable: false, orderable: false },
                  { data: 'gateway', name: 'gateway' },
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
