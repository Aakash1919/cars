<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Carbon\Carbon;
use Auth;
use Session;

class PackageController extends Controller
{
    public function package()
    {
        $data['plans'] = Plan::where('status', 1)->orderBy('id', 'DESC')->get();
        $data['boughtPlan'] = '';
        if (!empty(Auth::user()->current_plan)) {
          $data['boughtPlan'] = Plan::find(Auth::user()->current_plan);
        }
        return view('user.package.packages', $data);
    }

    public function selectPayment($id)
    {
        if (empty(Auth::user()->category_id)) {
          Session::flash('error', 'Please fill up your inforamtions first!');
          return back();
        }
        $plan = Plan::findOrFail($id);
        $user = Auth::user();
        return view('user.package.payment',compact('user','plan'));
    }

    public function freePublish(Request $request) {
        $plan = Plan::find($request->plan_id);
        $user = Auth::user();

        $user->current_plan = $plan->id;
        $today = new \Carbon\Carbon(Carbon::now());
        if (empty($plan->days)) {
          $newVal = $today->addDays(9999999999999);
        } else {
          $newVal = $today->addDays($plan->days);
        }
        $user->expired_date = $newVal;
        if ($plan->type == 'featured') {
          $user->featured = 1;
          $user->feature_date = $today;
        } else {
          $user->featured = 0;
        }
        $user->save();

        Session::flash('success', 'Your profile is published successfully!');

        return back();
    }
}
