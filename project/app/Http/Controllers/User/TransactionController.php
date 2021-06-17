<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Datatables;
use Auth;

class TransactionController extends Controller
{
    //*** JSON Request
    public function datatables()
    {
         $datas = Payment::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                             ->addColumn('user_name', function(Payment $data) {
                                 return '<span>'.$data->user->first_name . " " . $data->user->last_name .'</span>';
                             })
                            ->editColumn('title', function(Payment $data) {
                                return '<strong>'.$data->plan->title.'</strong>';
                            })
                            ->editColumn('car', function(Payment $data) {
                                return $data->car->title ?? 'Package Fee';
                            })
                            ->editColumn('amount', function(Payment $data) {
                                return '<span>'.$data->plan->currency_code . " " . $data->amount.'</span>';
                            })
                            ->editColumn('gateway', function(Payment $data) {
                                return '<span>'.$data->gateway.'</span>';
                            })
                            ->editColumn('action', function(Payment $data) {
                                return '<strong><a href="'.route('user-payments-invoice', $data->id).'" class="changeStatus btn btn-info btn-sm px-2" title="View Invoice"><i class="fas fa-money"></i>Invoice</a></strong>';
                            })
                            ->escapeColumns([])
                            ->make(true); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('user.trx.index');
    }

    public function invoice($id=null) {
        $paymentInfo = Payment::where('id',$id)->where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
        $userInfo = Auth::user();
        return view('user.trx.invoice', compact('paymentInfo', 'userInfo'));
    }

}
