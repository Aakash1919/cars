<?php

namespace App\Http\Controllers\User;

use Datatables;
use App\Models\Gallery;
use App\Models\Generalsetting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use Session;

class GalleryController extends Controller
{

    //*** JSON Request
    public function datatables()
    {
         $datas = Gallery::orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('image', function(Gallery $data) {
                                return '<img src="'.url('/').'/assets/user/gallery/'.$data->image.'" width="200">';
                            })
                            ->addColumn('action', function(Gallery $data) {
                                return '<div class="action-list"><a data-href="' . route('user-gal-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('user-gal-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->rawColumns(['image', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        $data['abgal'] = Generalsetting::first();
        return view('user.gallery.index', $data);
    }

    //*** GET Request
    public function create()
    {
        return view('user.gallery.create');
    }

    //*** POST Request
    public function store(Request $request)
    {

        //--- Validation Section
        $rules = [
          'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        $gal = new Gallery;

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name = time().'.png';

        $path = 'assets/user/gallery/'.$image_name;
        file_put_contents($path, $image);

        $gal->user_id = Auth::user()->id;
        $gal->image = $image_name;
        $gal->save();

        return response()->json("Image added to gallery.");
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Gallery::findOrFail($id);
        return view('user.gallery.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {

        //--- Validation Section
        $rules = [
          'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        $gal = Gallery::find($id);

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name = time().'.png';

        @unlink('assets/user/gallery/'.$gal->image);
        $path = 'assets/user/gallery/'.$image_name;
        file_put_contents($path, $image);

        $gal->image = $image_name;
        $gal->save();

        return response()->json("Image is updated successfully!");
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Gallery::findOrFail($id);
        //If Photo Exist
        @unlink('assets/user/gallery/'.$data->image);
        $data->delete();
        //--- Redirect Section
        $msg = 'Image Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
