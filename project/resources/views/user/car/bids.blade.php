@extends('layouts.user')
@section('content')
<input type="hidden" id="headerdata" value="CATGORY">
<div class="content-area">
   <div class="mr-breadcrumb">
      <div class="row">
         <div class="col-lg-12">
            <h4 class="heading">Bids</h4>
            <ul class="links">
               <li>
                  <a href="{{ route('admin.dashboard') }}">{{$langg->lang8}} </a>
               </li>
               <li>
                  <a href="#">Bids Management</a>
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
                           <th>Car</th>
                           <th>User</th>
                           <th>Price</th>
                           <th>Created</th>
                           <th>Updated</th>
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
            <p class="text-center">You are about to delete this Category. Everything under this category will be deleted.</p>
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

@php
  $id = Request::route('id');
@endphp

@section('scripts')
{{-- DATA TABLE --}}
<script type="text/javascript">
  var table = $('#geniustable').DataTable({
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: '{{ route('user.car.showBids').'?id='.$id }}',
      columns: [{
              data: 'car',
              name: 'car'
          },
          {
              data: 'user',
              name: 'user'
          },
          {
              data: 'price',
              name: 'price'
          },
          {
              data: 'created',
              name: 'created'
          },
          {
              data: 'updated',
              name: 'updated'
          },

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
