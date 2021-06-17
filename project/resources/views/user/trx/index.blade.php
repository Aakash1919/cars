@extends('layouts.user')
@section('content')
<input type="hidden" id="headerdata" value="PLAN">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a></li>
                        <li class="breadcrumb-item active"  aria-current="page"><a href="#">Transactions</a></li>
							</ol>
						</nav>
					</div>
  </div>
					
  <div class="card">
	<div class="card-body">
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
											<th>Car</th>
											<th>Amount</th>
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
</div>



@endsection


@section('scripts')

{{-- DATA TABLE --}}

    <script type="text/javascript">

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('user-payment-datatables') }}',
               columns: [
                    { data: 'user_name', name: 'user_name' },
                    { data: 'title', name: 'title' },
                    { data: 'car', name: 'car' },
                    { data: 'amount', name: 'amount', searchable: false, orderable: false },
                    { data: 'action', name: 'action' },

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
