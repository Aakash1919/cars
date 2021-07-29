@extends('layouts.user')
@section('content')
<input type="hidden" id="headerdata" value="CATGORY">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a></li>
                        <li class="breadcrumb-item active"  aria-current="page"><a href="#">{{$langg->lang92}} </a></li>
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
                  <table id="geniustable" class="table mb-0 table-striped" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>{{$langg->lang82}}</th>
                           <th>{{$langg->lang83}}</th>
                           <th>{{$langg->lang84}}</th>
                           <th>{{$langg->lang85}}</th>
                           <th>{{$langg->lang86}}</th>
                           <th>{{$langg->lang93}}</th>
                           <th>{{$langg->lang87}}</th>
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

@php
  $type = Request::route('type');
@endphp

@section('scripts')
{{-- DATA TABLE --}}
<script>
$(document).on('click', '.deleteCar', function() {
   var carId = $(this).attr('data-val')
   var url = "{{route('user.car.disable')}}";
   if(carId) {
      $.get(url, {car_id : carId}, function(data) {
         alert(data)
         location.reload();
      })
   }
})
</script>
<script type="text/javascript">
  var table = $('#geniustable').DataTable({
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: '{{ route('user.car.datatables').'?type='.$type }}',
      columns: [{
              data: 'title',
              name: 'title'
          },
          {
              data: 'brand',
              name: 'brand'
          },
          {
              data: 'model',
              name: 'model'
          },
          {
              data: 'year',
              name: 'year'
          },
          {
              data: 'featured',
              searchable: false,
              orderable: false
          },
          {
              data: 'status',
              searchable: false,
              orderable: false
          },
          {
              data: 'action',
              searchable: false,
              orderable: false
          }

      ],
      language: {
          processing: '<img src="{{asset('assets/images/spinner.gif')}}">'
      },
      drawCallback: function(settings) {
          $('.select').niceSelect();
      }
  });
   {{-- DATA TABLE ENDS--}}

   $(document).ready(function() {
      $("#geniustable_filter").parent().addClass("offset-md-4")
   });
</script>
@endsection
