<?php

namespace App\Http\Controllers\Front;

use App\Models\Generalsetting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class ForgotController extends Controller
{
    protected $geniusMail;
    public function __construct()
    {
        $this->middleware('guest');
        $this->geniusMail = new GeniusMailer();
    }

    public function showForgotForm()
    {
      return view('front.forgot');
    }

    public function forgot(Request $request)
    {
      $gs = Generalsetting::findOrFail(1);
      $input =  $request->all();
      if (User::where('email', '=', $request->email)->count() > 0) {
      // user found
      $admin = User::where('email', '=', $request->email)->firstOrFail();
      $autopass = str_random(8);
      $input['password'] = bcrypt($autopass);
      $admin->update($input);
      $subject = "Reset Password Request";
      $msg = "Your New Password is : ".$autopass;
      $this->sendDesignedEmail($request->email, $subject, $msg, 'Reset Your Password',null);
      return response()->json('Your Password Reseted Successfully. Please Check your email for new Password.');
      }
      else{
      // user not found
      return response()->json(array('errors' => [ 0 => 'No Account Found With This Email.' ]));
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
