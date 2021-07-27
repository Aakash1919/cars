@extends('layouts.admin')
@section('content')
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



<div class="card noprint">
    <div class="card-body">
        <button style="float: right; width:100px;" type="button" class="btn btn-dark" id="printbtn"><i class="fa fa-print"></i> Print</button>
    </div>
</div>

<div class="card noprint" id="pdfexport">
    <div class="card-body" >
        <div id="invoice" style="margin-top:0px;">
            <div class="invoice">
                <div>
                    <header>
                        <div class="row">
                            <div class="col">
                                <a href="javascript:;">
                                    <img src="{{asset('/assets/front/images/loader.gif')}}" width="80" alt="" />
                                </a>
                            </div>
                            <div class="col"></div>
                            <div class="col company-details">
                                <h4 class="name">
                                    <a target="_blank" href="/">
                                        Car Salvage Sales
                                    </a>
                                </h4>
                                <p>ABN: 50 110 219 460<p>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="contacts">
                        <div class="row">
                            <div class="col invoice-to">
                                <div class="text-gray-light">INVOICE TO:</div>
                                <h4 class="to">{{$userInfo->first_name.' '.$userInfo->last_name}}</h4>
                                <div class="address">{{$userInfo->address}}</div>
                                <div class="email"><a href="{{"mailto:".$userInfo->email}}">{{$userInfo->email}}</a>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col invoice-details">
                                <h4 class="invoice-id">INVOICE {{ '#'.$paymentInfo[0]->id ?? ''}}</h4>
                                <div class="date">Date of Invoice: {{ '#'.date('d M Y', strtotime($paymentInfo[0]->updated_at ?? ''))}}</div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col">
                        <div class="table-responsive">    
                        <table class="table">
                           
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th class="text-left">Description</th>
                                    
                                    <th class="text-right">Date</th>
                                    <th class="text-right">Total</th>
                                </tr>


                              
                                <tr>
                                    <td class="no">01</td>
                                    <td class="no"></td>
                                    <td class="text-left">
                                        <h3>{{ isset($paymentInfo[0]->car_id) ? 'Car Listing Price' : 'Membership Price'}}</td>
                                    <td class="text-right">{{ date('d M Y', strtotime($paymentInfo[0]->created_at ?? ''))}}</td>
                                    <?php 
                                    $p = $paymentInfo[0]->amount;
                                    $x = $p/11; 
                                    $iprice = $p - $x;
                                    ?>
                                    <td class="total text-right">{{ '$'.number_format($iprice,2) }}</td>
                                </tr>

                                <!-- <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">SUBTOTAL</td>
                                    <td>{{ '$'.number_format($p,2)}}</td>
                                </tr> -->
                                <tr>
                                    <td class="text-right"  colspan="2"></td>
                                    <td class="text-right" colspan="2">GST 10%</td>
                                    <td class="text-right">$ {{number_format($x,2)}}</td>
                                </tr>

                                <tr>
                                    <td class="text-right" colspan="2"></td>
                                    <td class="text-right" colspan="2">GRAND TOTAL</td>
                                    <td class="text-right">{{ '$'.number_format($p,2)}}</td>
                                </tr>

                        </table>
</div>
</div>
</div>
                        <div class="thanks">Thank you!</div>
                    </main>
                </div>
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