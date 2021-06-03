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
    
    protected $stripe;
    protected $generalSettings;
    
    public function __construct() {
        $this->generalSettings = GS::first();
        $this->stripe = Stripe::make($this->generalSettings->ss);
    }

    public function payWithStripe(Request $request) {
        $plan = Plan::find($request->plan_id);
        $validator = Validator::make($request->all(), ['card_no' => 'required', 'ccExpiryMonth' => 'required', 'ccExpiryYear' => 'required', 'cvvNumber' => 'required',
        //'amount' => 'required',
        ]);

        $input = $request->all();
        if ($validator->passes()) {
            $input = array_except($input, array('_token'));
            try {
                $token = $this->stripe->tokens()->create(['card' => ['number' => $request->card_no, 'exp_month' => $request->ccExpiryMonth, 'exp_year' => $request->ccExpiryYear, 'cvc' => $request->cvvNumber ] ]);

                if (!isset($token['id'])) {
                    return redirect()->back();
                }


                $charge = $this->stripe->charges()->create(['card' => $token['id'], 'currency' => 'USD', 'amount' => $plan->price, 'description' => 'Add in wallet', ]);
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

    public function createSubscription(Request $request) {
        $plan = Plan::find($request->plan_id);

        try {
            if(isset(Auth::user()->stripe_customer_id)) {
                $customerId = Auth::user()->stripe_customer_id;
            }else {
                $token = $this->createToken($request);
                $customerId = $this->createCustomer($token);
            }
            
            $subscription = $this->createStripeSubscription($customerId, $plan->stripe_plan_id );
            if ($subscription['status'] == 'active') {
                $this->storetodb($request);
                Session::flash('success', "Thanks! Your subscription is active");
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

    public function createToken($request) {
        $validator = Validator::make($request->all(), ['card_no' => 'required', 'ccExpiryMonth' => 'required', 'ccExpiryYear' => 'required', 'cvvNumber' => 'required']);
        $input = $request;
        if ($validator->passes()) {
            $input = array_except($input, array('_token'));
            $token = $this->stripe->tokens()->create(['card' => ['number' => $request->card_no, 'exp_month' => $request->ccExpiryMonth, 'exp_year' => $request->ccExpiryYear, 'cvc' => $request->cvvNumber ] ]);
            return $token;
        }
       
    }

    public function createCustomer($token = null) {
        if(isset($token)) {
            $customer = $this->stripe->customers()->create([
                'email' => Auth::user()->email,
                'source' => $token['id']
            ]);
            $user = Auth::user();
            $user->stripe_customer_id = $customer['id'] ?? null;
            $user->save();
            $customerId = $customer['id'];
        }
        return $customerId ?? null;
    }

    public function updateCard($customerId, $token) {
        $card = $this->stripe->cards()->create($customerID, $token);
        return $card['id'] ?? null;
    }

    public function createStripeSubscription($customerId = null, $planId = null) {
        if(isset($customerId) && isset($planId)) {
            $subscription = $this->stripe->subscriptions()->create($customerId, ['items' => [['price' => $planId]]]);
            $user = Auth::user();
            $user->stripe_subscription_id = $subscription['id'] ?? null;
            $user->save();
            return $subscription;
        }else {
            return null;
        }
    }

    public function chargeCustomerProfile($request) {
        $planId = Auth::user()->current_plan;
        $plan = Plan::find($planId);
        $customerId = Auth::user()->stripe_customer_id;
        if(!isset($customerId))  return response()->json(array('status' => 400, 'errors' => 'User Not eligible for payment'));
        try {
            $charge = $this->stripe->charges()->create([
                'customer' => $customerId,
                'currency' => 'AUD',
                'amount'   => $plan->listing_price,
            ]);
            if ($charge['status'] == 'succeeded') {
                return response()->json(array('status' => 200, 'success' => 'Payment Successfully made'));
            } else {
                return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
            }
        }
        catch(Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
         }
         catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
         }
         catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
         }
       
    }

    public function chargeCard($request) {
        $planId = Auth::user()->current_plan;
        $plan = Plan::find($planId);
        $validator = Validator::make($request->all(), ['card_no' => 'required', 'ccExpiryMonth' => 'required', 'ccExpiryYear' => 'required', 'cvvNumber' => 'required'
        ]);

        $input = $request->all();
        if ($validator->passes()) {
            $input = array_except($input, array('_token'));
            try {
                $token = $this->stripe->tokens()->create(['card' => ['number' => $request->card_no, 'exp_month' => $request->ccExpiryMonth, 'exp_year' => $request->ccExpiryYear, 'cvc' => $request->cvvNumber ] ]);
                if (!isset($token['id'])) {
                    return redirect()->back();
                }
                
                $charge = $this->stripe->charges()->create(['card' => $token['id'], 'currency' => 'USD', 'amount' => $plan->listing_price, 'description' => 'Car Listing Price', ]);
                if ($charge['status'] == 'succeeded') {
                    return response()->json(array('status' => 200, 'success' => 'Payment Successfully made'));
                } else {
                    return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
                }
            }
            catch(Exception $e) {
               return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
            }
            catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
               return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
            }
            catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
               return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
            }
        }
    }

    public function unsubscribe(Request $request) {
        $customerId = Auth::user()->stripe_customer_id;
        $subscriptionId = Auth::user()->stripe_subscription_id;
        $user = User::find(Auth::user()->id);
        $ms = 'You do not have any subscription';
        if(isset($customerId) && isset($subscriptionId)) {
            try {
                $response =  $this->stripe->subscriptions()->cancel($customerId, $subscriptionId);
                if(isset($response['status']) && $response['status'] == 'canceled') {
                    $user->current_plan = NULL;
                    $user->stripe_customer_id = NULL;
                    $user->stripe_subscription_id = NULL;
                    $user->save();
                    $msg = 'Subscription Cancelled'; 
                }else {
                    $msg = $response->errors;
                }
            }catch(\Cartalyst\Stripe\Exception\NotFoundException $e) {
                $user->current_plan = NULL;
                $user->stripe_customer_id = NULL;
                $user->stripe_subscription_id = NULL;
                $user->save();
                $msg = $e->getMessage();
            }
            
        }
        Session::flash('error',  $msg);
        return redirect()->back();
        
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
