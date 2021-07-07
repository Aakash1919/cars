@extends('layouts.user')
@section('content')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('user-dashboard') }}">{{$langg->lang8}} </a></li>
        <li class="breadcrumb-item active"  aria-current="page"><a href="#">Invoice</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <button style="float: right; width:100px;" type="button" class="btn btn-dark" onClick="printDiv('pdfexport');"><i class="fa fa-print"></i> Print</button>
    </div>
</div>
<div class="card" id="pdfexport">
    <div class="card-body">
        <div id="invoice">
            <div class="toolbar hidden-print">
                <div class="text-end">
                    
                    
                </div>
                <hr/>
            </div>
            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <a href="javascript:;">
                                    <img src="/assets/front/images/loader.gif" width="80" alt="" />
                                </a>
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    <a target="_blank" href="/">
                                        Car Salvage Sales
                                    </a>
                                </h2>
                                {{-- <div>455 Foggy Heights, AZ 85004, US</div>
                                <div>(123) 456-789</div>
                                <div>company@example.com</div> --}}
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
                                    <td class="total">{{ '$'.$paymentInfo[0]->amount ?? ''}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">SUBTOTAL</td>
                                    <td>{{ '$'.$paymentInfo[0]->amount ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">GRAND TOTAL</td>
                                    <td>{{ '$'.$paymentInfo[0]->amount ?? ''}}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="thanks">Thank you!</div>
                        {{-- <div class="notices">
                            <div>NOTICE:</div>
                            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                        </div> --}}
                    </main>
                    
                </div>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
            </div>
        </div>
    </div>
</div>
@endSection
@section('scripts')
<script type="text/javascript">
 function printDiv(divId) {
       var printContents = document.getElementById(divId).innerHTML;
       var originalContents = document.body.innerHTML;
       document.body.innerHTML = "<html><head><title></title></head><body>" + printContents + "</body>";
       window.print();
       document.body.innerHTML = originalContents;
   }
</script>
@endsection