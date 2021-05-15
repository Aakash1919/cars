<?php

namespace App\Http\Controllers\Admin;
use App\Models\Generalsetting;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class GeneralSettingController extends Controller
{

    protected $rules =
    [
        'logo'       => 'mimes:jpeg,jpg,png,svg',
        'favicon'    => 'mimes:jpeg,jpg,png,svg',
        'loader'     => 'mimes:gif'
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Genereal Settings All post requests will be done in this method
    public function generalupdate(Request $request)
    {
        //--- Validation Section
        $validator = Validator::make(Input::all(), $this->rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends


        //--- Logic Section
        else {
            $in = $request->all();
            if ($file = $request->file('logo'))
            {
                @unlink('assets/front/images/logo.png');
                $request->file('logo')->move('assets/front/images', 'logo.png');
            }
            if ($file = $request->file('favicon'))
            {
                @unlink('assets/front/images/favicon.png');
                $request->file('favicon')->move('assets/front/images', 'favicon.png');
            }
            if ($file = $request->file('loader'))
            {
                @unlink('assets/front/images/loader.gif');
                $request->file('loader')->move('assets/front/images', 'loader.gif');
            }
            if ($file = $request->file('aloader'))
            {
                $gs = Generalsetting::first();
                if ($gs->is_aloader == 0) {
                  $org_image="assets/images/blank.gif";
                  $destination="assets/images/spinner.gif";

                  copy( $org_image , $destination );
                } else {
                  @unlink('assets/images/spinner.gif');
                  $request->file('aloader')->move('assets/images', 'spinner.gif');
                }
            }
            if ($file = $request->file('breadcrumb'))
            {
                @unlink('assets/front/images/breadcrumb.jpg');
                $request->file('breadcrumb')->move('assets/front/images', 'breadcrumb.jpg');
            }
            if ($file = $request->file('footer_logo'))
            {
                @unlink('assets/front/images/footer_logo.png');
                $request->file('footer_logo')->move('assets/front/images', 'footer_logo.png');
            }
            if ($request->has('copyright') && $request->filled('copyright')) {
              $gs = Generalsetting::first();
              $gs->copyright = $request->copyright;
              $gs->save();
            }
            if (empty($request->f_status)){
                $in['f_status'] = 0;
            }
            if (empty($request->t_status)){
                $in['t_status'] = 0;
            }
            if (empty($request->g_status)){
                $in['g_status'] = 0;
            }
            if (empty($request->l_status)){
                $in['l_status'] = 0;
            }
            if (empty($request->d_status)){
                $in['d_status'] = 0;
            }
            if (empty($request->i_status)){
                $in['d_status'] = 0;
            }
            $gs = Generalsetting::first();
            $gs->fill($in)->save();
            //--- Logic Section Ends

            //--- Redirect Section
            $msg = 'Data Updated Successfully.';
            return response()->json($msg);
            //--- Redirect Section Ends
        }

    }

    // Spcial Settings All post requests will be done in this method
    public function socialupdate(Request $request)
    {
        //--- Validation Section

        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();
        $data = Generalsetting::first();

        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends

    }

    public function socialsetting()
    {
      return view('admin.generalsetting.socialsetting');
    }

    public function logo()
    {
        return view('admin.generalsetting.logo');
    }

    public function payment()
    {
        return view('admin.generalsetting.paymentinfos');
    }

    public function fav()
    {
        return view('admin.generalsetting.favicon');
    }

     public function load()
    {
        return view('admin.generalsetting.loader');
    }

    public function bread()
    {
        return view('admin.generalsetting.breadcrumb');
    }

     public function contents()
    {
        return view('admin.generalsetting.websitecontent');
    }

     public function footer()
    {
        return view('admin.generalsetting.footer');
    }

    public function guest($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->guest_checkout = $status;
        $data->update();
    }

    public function comment($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_comment = $status;
        $data->update();
    }

    public function issmtp($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_smtp = $status;
        $data->update();
    }

    public function talkto($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_talkto = $status;
        $data->update();
    }

    public function issubscribe($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_subscribe = $status;
        $data->update();
    }

    public function isloader($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_loader = $status;
        $data->update();
    }

    public function isaloader($status)
    {
        $data = Generalsetting::findOrFail(1);
        if ($status == 0) {
          $org_image="assets/images/blank.gif";
          $destination="assets/images/spinner.gif";

          copy( $org_image , $destination );
        }
        $data->is_aloader = $status;
        $data->update();
    }

    public function isdisqus($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_disqus = $status;
        $data->update();
    }

    public function iscontact($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_contact = $status;
        $data->update();
    }

    public function language($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_language = $status;
        $data->update();
    }
    public function currency($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_currency = $status;
        $data->update();
    }

}
