<?php

namespace App\Http\Controllers\User;

use App\Models\Socialsetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;

class SocialSettingController extends Controller
{

    // Spcial Settings All post requests will be done in this method
    public function socialupdate(Request $request)
    {
        //--- Validation Section

        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();
        $data = Socialsetting::where('user_id', Auth::user()->id)->first();

        if (!empty($data)) {
          if ($request->f_status == ""){
              $input['f_status'] = 0;
          }
          if ($request->t_status == ""){
              $input['t_status'] = 0;
          }
          if ($request->l_status == ""){
              $input['l_status'] = 0;
          }
          $data->update($input);
          //--- Logic Section Ends
        } else {
          if ($request->f_status == ""){
              $input['f_status'] = 0;
          }
          if ($request->t_status == ""){
              $input['t_status'] = 0;
          }
          if ($request->l_status == ""){
              $input['l_status'] = 0;
          }
          $input['user_id'] = Auth::user()->id;
          Socialsetting::create($input);
        }


        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends

    }

    public function index()
    {
      $data = Socialsetting::where('user_id',Auth::user()->id)->first();
        return view('user.socialsetting.index',compact('data'));
    }
}
