<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //--- Validation Section
        $rules = [
          'email'   => 'required|email',
          'password' => 'required'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

      // Attempt to log the user in
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location

        // Check If Email is verified or not
          if(Auth::guard('web')->user()->email_verified == 'No')
          {
            Auth::guard('web')->logout();
            return response()->json(array('errors' => [ 0 => 'Your Email is not Verified!' ]));
          }
          // Login as User
          return response()->json(route('user-dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
          return response()->json(array('errors' => [ 0 => 'Credentials Doesn\'t Match !' ]));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login-signup');
    }
}
