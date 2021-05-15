<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Datatables;

class TransactionController extends Controller
{
    //*** JSON Request
    public function datatables()
    {
         $datas = Payment::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                             ->addColumn('user_name', function(Payment $data) {
                                 return '<span>'.$data->user->first_name . " " . $data->user->last_name .'</span>';
                             })
                            ->editColumn('title', function(Payment $data) {
                                return '<strong>'.$data->plan->title.'</strong>';
                            })
                            ->editColumn('amount', function(Payment $data) {
                                return '<span>'.$data->plan->currency_code . " " . $data->amount.'</span>';
                            })
                            ->editColumn('gateway', function(Payment $data) {
                                return '<span>'.$data->gateway.'</span>';
                            })
                            ->rawColumns(['user_name', 'title', 'amount','gateway'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.trx.index');
    }
}
