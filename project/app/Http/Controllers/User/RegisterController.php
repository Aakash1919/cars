<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\User;
use App\Classes\GeniusMailer;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class RegisterController extends Controller
{
    public function showform() {
      code_image();
      return view('front.login');
    }

    public function refresh_code(){
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
                      if ($value != $capstr){
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
	        if($gs->is_smtp == 1)
	        {
  	        $data = [
  	            'to' => $to,
  	            'subject' => $subject,
  	            'body' => $msg,
  	        ];

  	        $mailer = new GeniusMailer();
  	        $mailer->sendCustomMail($data);
	        }
	        else
	        {
            $headers = "From: $gs->title <$gs->from_email> \r\n";
      			$headers .= "Reply-To: $gs->title <$gs->from_email> \r\n";
      			$headers .= "MIME-Version: 1.0\r\n";
      			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  	        mail($to,$subject,$msg,$headers);
	        }
        	return response()->json('We need to verify your email address. We have sent an email to '.$to.' to verify your email address. Please click link in that email to continue.');
    }

    public function token($token)
    {
        $user = User::where('verification_link','=',$token)->first();
        if(isset($user))
        {
            $user->email_verified = 1;
            $user->update();
            Auth::login($user);
            return redirect()->route('user-dashboard')->with('success','Email Verified Successfully');
        }
    }
}
