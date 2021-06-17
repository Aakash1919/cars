@extends('layouts.user')

@section('styles')
<style media="screen">
.paypal-buttons {
  width: 10% !important;
  display: block !important;
  margin: 0 auto !important;
}
</style>
@endsection

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
  <div class="ps-3">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
      <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a></li>
      <li class="breadcrumb-item active"  aria-current="page"><a href="{{ route('user-package') }}">{{$langg->lang144}}</a></li>
          </ol>
      </nav>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <div class="card-title">
      <h3 class="text-center text-uppercase mb-4" style="font-weight: 900;">{{ $langg->lang155 }}</h3>
      </div>  
  <div class="content-area" id="contentArea">
    <div class="add-product-content py-5">
      
      <div class="row mb-4">
        <div class="col-lg-2 text-right text-uppercase">
          <strong>{{ $langg->lang156 }}:</strong>
        </div>
        <div class="col-lg-6 text-left">
          {{ $plan->title }}
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-lg-2 text-right text-uppercase">
          <strong>{{ $langg->lang157 }}:</strong>
        </div>
        <div class="col-lg-6 text-left">
          {{ $plan->price ? '$'.round($plan->price,2) : 'Free' }}
        </div>
      </div>

      {{-- <div class="row mb-4">
        <div class="col-lg-6 text-right text-uppercase">
          <strong>{{ $langg->lang158 }}:</strong>
        </div>
        <div class="col-lg-6 text-left">
          {{ $plan->ads  }}
        </div>
      </div> --}}

      <div class="row mb-4 hidden">
        <div class="col-lg-2 text-right text-uppercase">
          <strong>{{ $langg->lang159 }}:</strong>
        </div>
        <div class="col-lg-6 text-left">
          {{ $plan->days ? $plan->days . ' Days(s)' : 'Lifetime' }}
        </div>
      </div>

      @if ($plan->price == 0)
        <form class="" action="{{ route('user.freepublish') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="plan_id" value="{{ $plan->id }}">
          <div class="text-center">
            <button type="submit" class="btn btn-primary" style="background-color:#1f224f;">Submit</div>
          </div>
        </form>
      @endif

      @if ($plan->price > 0)
      <div class="row mb-4">
        <div class="col-lg-2 text-right text-uppercase">
          @if(!isset(Auth::user()->stripe_customer_id))
            <strong>{{ $langg->lang160 }}:</strong>
          @endif
        </div>
        <div class="col-lg-6 text-left">
          <div class="row">
            <div class="col-lg-8">
              <form class="form-horizontal" id="payment-form" action="{{route('stripe.subscribe')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                  @if(!isset(Auth::user()->stripe_customer_id))
                    <div>
                    <select class="form-control" name="" onchange="meThods(this)">
                      <option value="">Select a payment method</option>
                      {{-- <option value="Paypal">Paypal</option> --}}
                      <option value="Stripe">Stripe</option>
                    </select>
                  </div>
                    <div class="card">
                    </div class="card-body">
                    <div id="stripes" style="display: none;">
                        <div class="row" style="margin-top:10px;margin-bottom:10px;">
                          <div class="col-md-12 col-lg-12">
                            @if($errors->any())
                              <h4>{{$errors->first()}}</h4>
                            @endif
                            <input type="hidden" name="_token" value={{csrf_token()}} />
                            <div class="form-row">
                              <div id="card-element"></div>
                              <div id="card-errors" role="alert"></div>
                            </div>
                      </div>
                    </div>
                  </div>
                  </div>
                        <!--
                        <button class="btn btn-success btn-sm mt-2">update</button>
                     
                        <div class="form-group">
                            <div class="col-sm-12 px-0">
                                <input type="text" class="form-control" id="scard" name="card_no" placeholder="{{ $langg->lang161 }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 px-0">
                                <input type="text" class="form-control" id="scvv" name="cvvNumber" placeholder="{{ $langg->lang162 }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 px-0">
                                <input type="text" class="form-control" id="smonth" name="ccExpiryMonth" placeholder="{{ $langg->lang163 }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 px-0">
                                <input type="text" class="form-control" id="syear" name="ccExpiryYear" placeholder="{{ $langg->lang164 }}" autocomplete="off">
                            </div>
                        </div>
                      -->
                    </div>
                  @endif
                  <div class="text-left" id="stripeSubmit">
                    <button type="submit" class="btn btn-primary" style="background-color:#1f224f;">{{ $langg->lang165 }}</div>
                  </div>
              </form>


            </div>
          </div>
        </div>

        <div class="paypal-modal">

        </div>
      </div>

      @endif
  </div>
</div>
    </div>
  </div>
@endsection


@section('scripts')

@if($plan->price != 0)
<script type="text/javascript">
        function meThods(val) {
            var action2 = "{{ isset($plan->stripe_plan_id) ? route('stripe.subscribe') : route('stripe.submit')}}";

             if (val.value == "Paypal") {
                $("#subscribe_form").attr("action", "");
                $("#scard").prop("required", false);
                $("#scvv").prop("required", false);
                $("#smonth").prop("required", false);
                $("#syear").prop("required", false);
                $("#stripes").hide();
                $("#stripeSubmit").hide();
                $(".paypal-modal").attr("style", "display: block !important");
            }
            else if (val.value == "Stripe") {
                $("#subscribe_form").attr("action", action2);
                $("#scard").prop("required", true);
                $("#scvv").prop("required", true);
                $("#smonth").prop("required", true);
                $("#syear").prop("required", true);
                $("#stripes").show();
                $(".paypal-modal").attr("style", "display: none !important");
            }
        }
        
</script>
<script src="https://js.stripe.com/v3/"></script>
<script>
	var stripe = Stripe('{{ env('STRIPE_KEY') }}');
	var elements = stripe.elements();
	var style = {
	base: {
		// Add your base input styles here. For example:
		fontSize: '16px',
		color: '#32325d',
	},
	};
	var card = elements.create('card', {style: style});
	card.mount('#card-element');
	var form = document.getElementById('payment-form');
	form.addEventListener('submit', function(event) {
	event.preventDefault();
	stripe.createToken(card).then(function(result) {
		if (result.error) {
			var errorElement = document.getElementById('card-errors');
			errorElement.textContent = result.error.message;
		} else {
			stripeTokenHandler(result.token);
		}
	});
	});

	function stripeTokenHandler(token) {
		var form = document.getElementById('payment-form');
		var hiddenInput = document.createElement('input');
		hiddenInput.setAttribute('type', 'hidden');
		hiddenInput.setAttribute('name', 'stripeToken');
		hiddenInput.setAttribute('value', token.id);
		form.appendChild(hiddenInput);
		form.submit();
	}
</script>
{{-- <script src="https://www.paypal.com/sdk/js?client-id={{ $gs->pb }}"></script>
<script>
paypal.Buttons({
  createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: {{ $plan->price }}
        }
      }]
    });
  },
  onApprove: function(data, actions) {
    return actions.order.capture().then(function(details) {
      // Call your server to save the transaction
      var orderid = data.orderID;
      var fd = new FormData();
      fd.append('planid', $("input[name='plan_id']").val());
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        url: '{{ route('user.paypal.storetodb') }}',
        type: 'POST',
        contentType: false,
        processData: false,
        data: fd,
        success: function(data) {
          if (data == "success") {
            $.notify("You have bought the package successfully!", "success");
          }
        }
      });
    });
  }
}).render('.paypal-modal');

</script> --}}
@endif

@endsection
