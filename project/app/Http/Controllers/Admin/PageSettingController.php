<?php

namespace App\Http\Controllers\Admin;
use App\Models\Pagesetting;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class PageSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    protected $rules =
    [
        'best_seller_banner' => 'mimes:jpeg,jpg,png,svg',
        'big_save_banner'    => 'mimes:jpeg,jpg,png,svg'
    ];


    // Page Settings All post requests will be done in this method
    public function update(Request $request) {
        $in = $request->except('_token');
        $ps = Pagesetting::first();
        $ps->fill($in)->save();
        if ($request->hasFile('background'))
        {
            @unlink('assets/front/images/heroarea-bg.jpg');
            $request->file('background')->move('assets/front/images','heroarea-bg.jpg');
        }
        if ($request->hasFile('testimonial_bg'))
        {
            @unlink('assets/images/testimonials/testimonial_bg.jpg');
            $request->file('testimonial_bg')->move('assets/images/testimonials/','testimonial_bg.jpg');
        }
        if ($request->hasFile('image'))
        {
            @unlink('assets/front/images/heroarea-img.jpg');
            $request->file('image')->move('assets/front/images','heroarea-img.jpg');
        }
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }

    public function featured_cars()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.featured_cars',compact('data'));
    }

    public function latest_cars()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.latest_cars',compact('data'));
    }

    public function blogsection()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.blogsection',compact('data'));
    }


    public function contact()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.contact',compact('data'));
    }

    public function upcontact(Request $request) {
        $ps = Pagesetting::first();
        $ps->contact_phone = $request->contact_phone;
        $ps->contact_email = $request->contact_email;
        $ps->contact_address = $request->contact_address;
        $ps->save();
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }

    public function iscontact($status)
    {
        $data = Pagesetting::findOrFail(1);
        $data->is_contact = $status;
        $data->update();
    }

    public function customize()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.customize',compact('data'));
    }

    public function heroarea()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.heroarea',compact('data'));
    }

    public function header_banner()
    {
        $data = Pagesetting::find(1);
        return view('admin.pagesetting.header_banner',compact('data'));
    }


    //Upadte About Page Section Settings


    //Upadte FAQ Page Section Settings
    public function faqupdate($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->f_status = $status;
        $page->update();
        Session::flash('success', 'FAQ Status Upated Successfully.');
        return redirect()->back();
    }

    public function contactup($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->c_status = $status;
        $page->update();
        Session::flash('success', 'Contact Status Upated Successfully.');
        return redirect()->back();
    }

    //Upadte Contact Page Section Settings
    public function contactupdate(Request $request)
    {
        $page = Pagesetting::findOrFail(1);
        $input = $request->all();
        $page->update($input);
        Session::flash('success', 'Contact page content updated successfully.');
        return redirect()->route('admin-ps-contact');;
    }

}
