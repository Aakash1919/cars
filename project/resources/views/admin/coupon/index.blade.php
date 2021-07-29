@extends('layouts.admin')

@section('content')
    <input type="hidden" id="headerdata" value="PLAN">
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Coupon Code</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">Dashboard </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-coupon-index') }}">Coupon Code Management</a>
                        </li>
                    </ul>
                    <a href="javascript:void(0)" class="btn btn-success btn-sm px-2 float-right" id="createCoupon">Create Coupon</a>
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
                                        <th>id</th>
                                        <th>Coupon Code</th>
                                        <th>Coupon Name</th>
                                        <th>Percentage Off</th>
                                        <th>Duration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($coupons['data'])
                                        @php $i=1; @endphp
                                        @foreach($coupons['data'] as $coupon)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$coupon['id']}}</td>
                                                <td>{{$coupon['name']}}</td>
                                                <td>{{$coupon['percent_off'] .'%'}}</td>
                                                 <td>{{$coupon['duration']}}</td>
                                                <td><!--<a href="javascript:void(0)" class="btn btn-primary btn-sm px-2 editCoupon" data-val="{{$coupon['id']}}">Edit</a>--><a href="{{route('admin.coupon.delete').'?coupon='.$coupon['id']}}" class="btn btn-danger btn-sm px-2">Delete</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="modal fade" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create/Update Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.coupon.create')}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <input type="hidden" id="code" name="code" value="" />
          <div class="modal-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Coupon Name" required>
              </div>
              <div class="form-group">
                <label for="percentOff">Percentage Off</label>
                <input type="number" class="form-control" id="percentOff" name="percentage" aria-describedby="percentOff" placeholder="Percentage Off" required>
              </div> 
            <div class="form-group">
            <label for="duration">Duration</label>
                <select class="form-control" id="duration" name="duration" required>
                  <option value="forever">forever</option>
                  <option value="once">once</option>
                  <option value="repeating">repeating</option>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
    </div>
  </div>
</div>


@endsection


@section('scripts')
<script>
$('#createCoupon').on('click', function () {
  $('#couponModal').modal('show')
})
// $('.editCoupon').on('click', function() {
//     var coupon = $(this).attr('data-val')
//     $.get( "{{route('admin.coupon.retrieve')}}", {coupon : coupon},  function( data ) {
//         if(data.status && data.status==200) {
//          $('#name').val(data.data.name)
//          $('#name').attr('readonly',true)
//          $('#code').val(data.data.id)
//          $('#percentOff').val(data.data.percent_off)
//          select('#duration', data.data.duration)
//         $('#couponModal').modal('show')
//         }
//     });
    
// })
// var select = function(dropdown, selectedValue) {
//     var options = $(dropdown).find("option");
//     var matches = $.grep(options,
//         function(n) { return $(n).text() == selectedValue; });
//     $(matches).attr("selected", "selected");
// };
</script>
<script type="text/javascript">
    $('#geniustable').DataTable();
</script>
@endsection
