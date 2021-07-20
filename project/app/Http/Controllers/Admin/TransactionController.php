<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Datatables;

class TransactionController extends Controller
{
    //*** JSON Request
    public function datatables()
    {
        $datas = Payment::leftJoin('plans', 'payments.plan_id', '=', 'plans.id')->leftJoin('users', 'payments.user_id', '=', 'users.id')->leftJoin('cars', 'cars.id', '=', 'payments.car_id')->select('users.first_name', 'users.last_name', 'users.id as user_id', 'plans.title as planTitle','plans.currency_code', 'cars.title as carTitle', 'payments.*')->orderBy('payments.id','desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
                            ->addColumn('user_name', function(Payment $data) {
                                return '<span>'.$data->first_name . " " . $data->last_name .'</span>';
                            })
                           ->editColumn('title', function(Payment $data) {
                               return '<strong>'.$data->planTitle ?? ''.'</strong>';
                           })
                           ->editColumn('car', function(Payment $data) {
                               return $data->carTitle ?? 'Package Fee';
                           })
                           ->editColumn('amount', function(Payment $data) {
                               return '<span>'.$data->currency_code . " " . $data->amount.'</span>';
                           })
                           ->editColumn('action', function(Payment $data) {
                               return '<strong><a href="'.route('admin-payments-invoice', ['payment'=>$data->id, 'user'=>$data->user_id,]).'" class="changeStatus btn btn-primary btn-sm px-2" title="View Invoice"><i class="fadeIn animated bx bx-credit-card"></i>Invoice</a></strong>';
                           })
                           ->escapeColumns([])
                           ->make(true); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.trx.index');
    }
    public function invoice($id=null, $userId = null) {
        $paymentInfo = Payment::where('id',$id)->orderBy('id','desc')->get();
        $userInfo = User::where('id',$userId)->first();
        return view('admin.trx.invoice', compact('paymentInfo', 'userInfo'));
    }
}
