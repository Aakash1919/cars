<?php

namespace App\Http\Controllers\User;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function changepass()
    {
        $data = Auth::user();
        return view('user.password',compact('data'));
    }

    public function uppass(Request $request)
    {
        $admin = Auth::user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $admin->password)) {
                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                } else {
                    return response()->json(array('errors' => [ 0 => 'Confirm password does not match.' ]));
                }
            }else{
                return response()->json(array('errors' => [ 0 => 'Current password Does not match.' ]));
            }
        }
        $admin->update($input);
        $msg = 'Password changed successfully.';
        return response()->json($msg);
    }
}
