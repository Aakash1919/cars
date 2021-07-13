<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\StripeController;
use App\Models\Generalsetting;
use App\Models\User;
use App\Models\Plan;
use App\Models\Payment;
use Auth;
use Validator;
use App\Models\Notifications;

class RegisterController extends Controller
{
    protected $stripeController;
    protected $geniusMail;
    public function __construct()
    {
        $this->stripeController = new StripeController();
        $this->geniusMail = new GeniusMailer();
    }

    public function showform()
    {
        code_image();
        $plans = Plan::where('status', 1)->orderBy('id', 'ASC')->get();
        return view('front.login', compact('plans'));
    }
    public function showform1()
    {
        code_image();
        $plans = Plan::where('status', 1)->orderBy('id', 'ASC')->get();
        return view('front.login1', compact('plans'));
    }

    public function refresh_code()
    {
        code_image();
        return "done";
    }

    public function register(Request $request)
    {
        //--- Validation Section
        $rules = [
              'username'   => 'required|max:50|unique:users',
              'first_name'   => 'required|max:255',
              'last_name'   => 'required|max:255',
                'email'   => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed',
              'code' => [
                 'required',
                  function ($attribute, $value, $fail) {
                      $capstr = session('captcha_string');
                      if ($value != $capstr) {
                          return $fail("Code doesn't match!");
                      }
                  },
              ],
          ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        $gs = Generalsetting::findOrFail(1);
        $input = $request->all();
        $input['password'] = bcrypt($request['password']);
        $token = md5(time().$request->name.$request->email);
        $input['verification_link'] = $token;
        $user = User::create($input);
        $to = $request->email;
        $subject = 'Verify your email address.';
        $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=".url('register/verify/'.$token).">Simply click here to verify. </a>";
        //Sending Email To Customer
        if ($gs->is_smtp == 1) {
            $data = [
                'to' => $to,
                'subject' => $subject,
                'body' => $msg,
            ];

            $this->geniusMail->sendCustomMail($data);
        } else {
            $headers = "From: $gs->title <$gs->from_email> \r\n";
            $headers .= "Reply-To: $gs->title <$gs->from_email> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to, $subject, $msg, $headers);
        }
        return response()->json('We need to verify your email address. We have sent an email to '.$to.' to verify your email address. Please click link in that email to continue.');
    }

    public function registerNew(Request $request)
    {
       // print_r($request->all());die;
        $rules = [
        'username'   => 'required|max:50|unique:users',
        'first_name'   => 'required|max:255',
        'last_name'   => 'required|max:255',
        'email'   => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed',
        'usertype'=> 'required',
        'plan'=>'required',
        'terms' => 'required'
        // 'code' => [
        //   'required',
        //     function ($attribute, $value, $fail) {
        //         $capstr = session('captcha_string');
        //         if ($value != $capstr) {
        //             return $fail("Code doesn't match!");
        //         }
        //     },
        // ],
    ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        $gs = Generalsetting::findOrFail(1);
        $input = $request->all();
        $input['password'] = bcrypt($request['password']);
        $token = md5(time().$request->name.$request->email);
        $input['verification_link'] = $token;
        $userId = User::create($input)->id;
        if ($request->has('plan') && isset($userId)) {
            $temporaryUser = User::findOrFail($userId);
            $stoken = $request->stripeToken;
            if (isset($stoken)) {
                $customerId = $this->stripeController->createCustomer($stoken, $request->email);
                $temporaryUser->stripe_customer_id = $customerId;
                if ($request->plan!=="11") {
                    $plan = Plan::find($request->plan);
                    $subscriptionId = $this->stripeController->createStripeSubscription($customerId, $plan->stripe_plan_id);
                    $temporaryUser->stripe_subscription_id = $subscriptionId['id'];
                    
                    $notification = new Notifications;
                    $notification->user_id =  $temporaryUser->id;
                    $notification->message =  'You are charged '.$plan->price.' for membership';
                    $notification->created_at =  date('Y-m-d h:i:s', time());
                    $notification->save();
                    
                    $payment = new Payment;
                    $payment->plan_id = $plan->id;
                    $payment->user_id = $temporaryUser->id;
                    $payment->amount = $plan->price;
                    $payment->save();
                }
            }
            if (isset($customerId) && isset($subscriptionId)) {
                $currentPlan = $request->plan;
            } else {
                $currentPlan = 11;
            }
            $temporaryUser->current_plan = $currentPlan;
            $temporaryUser->save();
        }


        $to = $request->email;
        $subject = 'Verify your email address.';
        $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=".url('register/verify/'.$token).">Simply click here to verify. </a>";
        //Sending Email To Customer
        if ($gs->is_smtp == 1) {
            $data = [
          'to' => $to,
          'subject' => $subject,
          'body' => $msg,
      ];
        $this->sendDesignedEmail($to, $subject, $msg, 'Email Verification',null);
        } else {
            $headers = "From: $gs->title <$gs->from_email> \r\n";
            $headers .= "Reply-To: $gs->title <$gs->from_email> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to, $subject, $msg, $headers);
        }
        return response()->json('We need to verify your email address. We have sent an email to '.$to.' to verify your email address. Please click link in that email to continue.');
    }

    public function token($token)
    {
        $user = User::where('verification_link', '=', $token)->first();
        if (isset($user)) {
            $user->email_verified = 1;
            $user->update();
            Auth::login($user);
            $gs = Generalsetting::findOrFail(1);
            $to = $user->email;
            $subject = 'WELCOME TO CARSALVAGESALES.COM';
            $msg = 'WELCOME TO CARSALVAGESALES.COM<br><br>Your account is now active on <a href="'.env('APP_URL').'">CarSalvageSales.com</a>, you can view and edit all your details anytime on your dashboard and upgrade or change your membership type anytime, for any assistance our team is here to help just drop us an email and we will get right back to you';
            $msg.='<br><br>From<br>CarSalvageSales.com';
            if ($gs->is_smtp == 1) {
               
                $data = array(
                    'to' => $to,
                    'subject' => $subject,
                    'body' => $msg,
                );
                $this->sendDesignedEmail($to, $subject, $msg, 'Welcome To CarSalvageSales',null);
            } else {
                $headers = "From: $gs->title <$gs->from_email> \r\n";
                $headers .= "Reply-To: $gs->title <$gs->from_email> \r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                mail($to, $subject, $msg, $headers);
            }
            return redirect()->route('user-dashboard')->with('success', 'Email Verified Successfully');
        }
    }
    public function sendDesignedEmail($to=null, $subject=null, $msg=null, $tagLine = null, $car =null) {
     
        if(isset($to)) {
         $gs = Generalsetting::findOrFail(1);
         if ($gs->is_smtp == 1) {
             $data = array(
                 'to' => $to,
                 'subject' => $subject,
                 'body' => $msg,
                 'tagLine' => $tagLine,
                 'car' => $car,
                 'type' => 'new_user'
             );
             $this->geniusMail->sendDesignedMail($data);
         } else {
             $headers = "From: $gs->title <$gs->from_email> \r\n";
             $headers .= "Reply-To: $gs->title <$gs->from_email> \r\n";
             $headers .= "MIME-Version: 1.0\r\n";
             $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
             mail($to, $subject, $msg, $headers);
           
         }
        }
     }
}
