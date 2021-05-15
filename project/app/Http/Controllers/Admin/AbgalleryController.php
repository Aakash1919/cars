<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\AboutImg;
use App\Models\Generalsetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;

class AbgalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = AboutImg::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('image', function(AboutImg $data) {
                                return '<img src="../../assets/front/images/about/'.$data->image.'" width="100">';
                            })
                            ->addColumn('action', function(AboutImg $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-abgal-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-abgal-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->rawColumns(['image', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        $data['abgal'] = Generalsetting::first();
        return view('admin.abgallery.index', $data);
    }

    //*** GET Request
    public function create()
    {
        return view('admin.abgallery.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Logic Section
        $data = new AboutImg();
        $input = $request->all();
        if ($file = $request->file('image'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/front/images/about', $name);
            $input['image'] = $name;
        }
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Image Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = AboutImg::findOrFail($id);
        return view('admin.abgallery.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {

        //--- Logic Section
        $data = AboutImg::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('image'))
        {
            @unlink('assets/front/images/about/'.$data->image);
            $name = time().$file->getClientOriginalName();
            $file->move('assets/front/images/about', $name);
            $input['image'] = $name;
        }
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = AboutImg::findOrFail($id);
        //If Photo Exist
        @unlink('assets/front/images/about/'.$data->image);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
