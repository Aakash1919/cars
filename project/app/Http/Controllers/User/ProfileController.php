<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\StripeController;
use App\Models\User;
use Auth;
use Validator;
use Redirect; 

class ProfileController extends Controller
{
    protected $stripeController;

    public function __construct() {
      $this->stripeController = new StripeController();
    }

    public function edit()
    {
        $data['user'] = Auth::user();
        return view('user.editprofile',$data);
    }

    public function uploadPropic(Request $request)
    {
      $user = Auth::user();
        $this->validate($request, [
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
      ]);

      if ($request->hasFile('image')) {
          $image = $request->file('image');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/assets/user/propics/');
          $image->move($destinationPath, $name);
          $user->image = $name;
          $user->save();
          return response()->json(['status'=>true,'message'=>'/assets/user/propics/'.$name]);
      }
    }

    public function update(Request $request)
    {
      $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'about' => 'nullable|max:300'
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
      }
      $in = $request->all();
      $user = User::find(Auth::user()->id);
      $user->fill($in)->save();

      $msg = 'Data Updated Successfully.';
      
      if(isset($card)) {
        $msg.=' Also Card Updated Successfully';
      }
      return response()->json($msg);
    }

    public function stripeUpdate(Request $request) {
      if(isset($request->stripeToken)) {
        try {
          $token['id'] = $request->stripeToken;
          if(isset(Auth::user()->stripe_customer_id)) {
            $card = $this->stripeController->updateCard(Auth::user()->stripe_customer_id, $token);
          }else {
            $customer = $this->stripeController->createCustomer($token);
          }
        }
        catch(Exception $e) {
            return response()->json($e->getMessage());
        }
        catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
            return response()->json($e->getMessage());
        }
        catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            return response()->json($e->getMessage());
        }
        if(isset($customer)){
          $user = User::find(Auth::user()->id);
          $user->stripe_customer_id = $customer;
          $user->save();
          $msg = 'Payment Method Added';
        }
        if(isset($card)){
          $msg = 'Card Updated Successfully';
        }
        return Redirect::back()->withErrors('msg', $msg);
      }
    }
}
