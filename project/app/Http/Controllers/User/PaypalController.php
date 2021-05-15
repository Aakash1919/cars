<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Payment;
use App\Models\Category;
use Carbon\Carbon;
use Auth;

class PaypalController extends Controller
{
    public function storetodb(Request $request)
    {
      $plan = Plan::find($request->planid);
      $user = Auth::user();

      $payment = new Payment;
      $payment->user_id = $user->id;
      $payment->plan_id = $plan->id;
      $payment->amount = $plan->price;
      $payment->gateway = 'Paypal';
      $payment->save();

      $user->current_plan = $plan->id;
      $today = new \Carbon\Carbon(Carbon::now());
      $newVal = $today->addDays($plan->days);

      $user->expired_date = $newVal;
      $user->ads = $plan->ads;

      $user->save();

      return "success";
    }
}
