@extends('layouts.admin')
@section('content')
<style>
    @media print
{
    .noprint {
        display:none !important;
        height:0px !important;
    }
}
</style>
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 noprint">
				
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{$langg->lang8}} </a></li>
        <li class="breadcrumb-item active"  aria-current="page"><a href="#">Invoice</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="card noprint">
    <div class="card-body">
        <button style="float: right; width:100px;" type="button" class="btn btn-dark" id="printbtn"><i class="fa fa-print"></i> Print</button>
    </div>
</div>

<div class="card .noprint" id="pdfexport">
    <div class="card-body" >
        <div id="invoice" style="margin-top:0px;">
            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <a href="javascript:;">
                                    <img src="{{asset('/assets/front/images/loader.gif')}}" width="80" alt="" />
                                </a>
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    <a target="_blank" href="/">
                                        Car Salvage Sales
                                    </a>
                                </h2>
                                <p>ABN: 50 110 219 460<p>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                        
                            <div class="col invoice-to">
                                <div class="text-gray-light">INVOICE TO:</div>
                                <h2 class="to">{{$userInfo->first_name.' '.$userInfo->last_name}}</h2>
                                <div class="address">{{$userInfo->address}}</div>
                                <div class="email"><a href="{{"mailto:".$userInfo->email}}">{{$userInfo->email}}</a>
                                </div>
                            </div>
                            
                            <div class="col invoice-details">
                                <h1 class="invoice-id">INVOICE {{ '#'.$paymentInfo[0]->id ?? ''}}</h1>
                                <div class="date">Date of Invoice: {{ '#'.date('d M Y', strtotime($paymentInfo[0]->updated_at ?? ''))}}</div>
                            </div>
                        </div>
                        <table class="">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th class="text-left">Description</th>
                                    
                                    <th class="text-right">Date</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                <tr>
                                    <td class="no">01</td>
                                    <td class="no"></td>
                                    <td class="text-left">
                                        <h3>{{ isset($paymentInfo[0]->car_id) ? 'Car Listing Price' : 'Membership Price'}}</td>
                                    <td class="">{{ date('d M Y', strtotime($paymentInfo[0]->created_at ?? ''))}}</td>
                                    <?php 
                                    $p = $paymentInfo[0]->amount;
                                    $x = $p/10; 
                                    $iprice = $p - $x;
                                    ?>
                                    <td class="total">{{ '$'.number_format(round($iprice),2) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <!-- <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">SUBTOTAL</td>
                                    <td>{{ '$'.number_format($p,2)}}</td>
                                </tr> -->
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">GST 10%</td>
                                    <td>$ {{number_format(round($x),2)}}</td>
                                </tr>

                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">GRAND TOTAL</td>
                                    <td>{{ '$'.number_format(round($p),2)}}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="thanks">Thank you!</div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>

@endSection
@section('scripts')
<script type="text/javascript">
$('#printbtn').click(function() {
    var printContents = document.getElementById('invoice').innerHTML;
       var originalContents = document.body.innerHTML;
       var css = '<style>html, body {border: 1px solid white;height: 99%;page-break-after: avoid;page-break-before: avoid;}</style>';
       document.body.innerHTML = jQuery.trim("<html><head>"+css+"</head><body>" + printContents + "</body>");
       window.print();
       document.body.innerHTML = originalContents;
//   var options = {
//   };
//   var pdf = new jsPDF('l');
//   pdf.addHTML($("#invoice1"), 1, 1, options, function() {
//     pdf.save('invoice.pdf');
//   });
});

 function printDiv(divId) {
       var printContents = document.getElementById(divId).innerHTML;
       var originalContents = document.body.innerHTML;
       document.body.innerHTML = jQuery.trim("<html><body style='padding:0px;margin:0px;height:80%;'>" + printContents + "</body>");
       window.print();
       document.body.innerHTML = originalContents;
   }
</script>
@endsection