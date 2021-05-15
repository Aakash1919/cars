<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\Models\User;
use App\Models\Plan;
use App\Models\Category;
use App\Models\Generalsetting as GS;
use App\Models\Payment;
use Carbon\Carbon;
use Auth;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;

class StripeController extends Controller {

    public function payWithStripe(Request $request) {
      // return 1;
        $gs = GS::first();

        $plan = Plan::find($request->plan_id);
        $validator = Validator::make($request->all(), ['card_no' => 'required', 'ccExpiryMonth' => 'required', 'ccExpiryYear' => 'required', 'cvvNumber' => 'required',
        //'amount' => 'required',
        ]);

        $input = $request->all();
        if ($validator->passes()) {
            $input = array_except($input, array('_token'));
            $stripe = Stripe::make($gs->ss);
            try {
                $token = $stripe->tokens()->create(['card' => ['number' => $request->card_no, 'exp_month' => $request->ccExpiryMonth, 'exp_year' => $request->ccExpiryYear, 'cvc' => $request->cvvNumber ] ]);

                if (!isset($token['id'])) {
                    return redirect()->back();
                }


                $charge = $stripe->charges()->create(['card' => $token['id'], 'currency' => 'USD', 'amount' => $plan->price, 'description' => 'Add in wallet', ]);
                if ($charge['status'] == 'succeeded') {
                    $this->storetodb($request);
                    Session::flash('success', "Your have bought the package successfully!");
                    return redirect()->back();
                } else {
                    Session::flash('error', 'Money not add in wallet!!');
                    return redirect()->back();
                }
            }
            catch(Exception $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back();
            }
            catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back();
            }
            catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->back();
            }
        }
    }

    public function storetodb(Request $request)
    {
        $plan = Plan::find($request->plan_id);
        $user = Auth::user();

        $payment = new Payment;
        $payment->user_id = $user->id;
        $payment->plan_id = $plan->id;
        $payment->amount = $plan->price;
        $payment->gateway = 'Stripe';
        $payment->save();

        $user->current_plan = $plan->id;
        $today = new \Carbon\Carbon(Carbon::now());
        $newVal = $today->addDays($plan->days);
        $user->expired_date = $newVal;
        $user->ads = $plan->ads;
        $user->save();

        return;
    }
}
