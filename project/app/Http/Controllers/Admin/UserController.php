<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Specification;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;
use Datatables;

class UserController extends Controller
{

    //*** JSON Request
    public function datatables()
    {
         $datas = User::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('first_name', function(User $data) {
                                return '<strong>'.$data->first_name.'</strong>';
                            })
                            ->addColumn('username', function(User $data) {
                                return '<span>'.$data->username.'</span>';
                            })
                            ->addColumn('email', function(User $data) {
                                return '<span>'.$data->email.'</span>';
                            })
                            ->addColumn('phone', function(User $data) {
                                return '<span>'.$data->phone.'</span>';
                            })
                            ->addColumn('action', function(User $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-user-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a></div>';
                            })
                            ->rawColumns(['first_name','username','email','phone','status', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.user.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.user.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'title' => 'required|max:255',
            'currency' => 'required|max:30',
            'currency_code' => 'required',
            'price' => 'nullable|numeric',
            'days' => 'nullable|integer',
            'type' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();

        $user = User::create($input);

        //--- Redirect Section
        $msg = 'New User Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $cats = Category::where('status', 1)->get();
        return view('admin.user.edit',compact('data', 'cats'));
    }

    public function uploadPropic(Request $request)

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

        $user = User::find($request->user_id);

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

      $in = $request->all();
      $user = User::find($request->user_id);
      $user->fill($in)->save();

      $msg = 'Data Updated Successfully.';
      return response()->json($msg);
    }

    //*** GET Request Status
    public function status($id1,$id2)
    {
        $data = User::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }
}
