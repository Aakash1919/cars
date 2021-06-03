<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\StripeController;
use App\Models\User;
use Auth;
use Validator;

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

        $user = User::find(Auth::user()->id);

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name = time().'.png';

        $path = 'assets/user/propics/'.$image_name;
        file_put_contents($path, $image);

        @unlink('assets/user/propics/'.$user->image);

        $user->image = $image_name;
        $user->save();

        return response()->json(['status'=>true]);

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
      if(isset($request->card_no)) {
        try {
          $token = $this->stripeController->createToken($request);
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
        $customer = $this->stripeController->createCustomer($token);
        $in['stripe_customer_id'] = $customer;
      }
      $in = $request->all();
      $user = User::find(Auth::user()->id);
      $user->fill($in)->save();

      $msg = 'Data Updated Successfully.';
      return response()->json($msg);
    }
}
