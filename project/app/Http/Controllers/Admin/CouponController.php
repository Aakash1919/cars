<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\StripeController;
use App\Models\Payment;
use App\Models\User;
use Datatables, Session;


class CouponController extends Controller
{
    protected $stripeController;

    public function __construct() {
      $this->stripeController = new StripeController();
    }

    //*** GET Request
    public function index()
    {
        $coupons = $this->stripeController->getAllCoupons();
        return view('admin.coupon.index', compact('coupons'));
    }

    public function createCoupon(Request $request) {
       $response = $this->stripeController->createCoupons($request)->getData();
       if(isset($response->status)) {
            Session::flash('success', $response->success);
            return redirect()->back();
       }   
    }
    
    public function deleteCoupon(Request $request) {
           $response = $this->stripeController->deleteCoupon($request);
            Session::flash('success', 'Coupon Deleted Successfully');
            return redirect()->back();
    }
    
    public function retrieveCoupon(Request $request) {
        return $this->stripeController->retrieveCoupon($request);
    }
    
}
