<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;
use Datatables;

class ModelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = BrandModel::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                             ->addColumn('brand', function(BrandModel $data) {
                                 return '<span>'.$data->brand->name.'</span>';
                             })
                            ->addColumn('status', function(BrandModel $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-model-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Active</option><<option data-val="0" value="'. route('admin-model-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactive</option>/select></div>';
                            })
                            ->addColumn('action', function(BrandModel $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-model-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-model-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->rawColumns(['brand', 'status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.model.index');
    }

    //*** GET Request
    public function create()
    {
        $data['brands'] = Brand::where('status', 1)->get();
        return view('admin.model.create', $data);
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'name' => 'required',
            'brand_id' => 'required',
            'status' => 'required',
        ];

        $messages = [
          'beand_id.required' => 'Brand is required'
        ];

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();
        $model = BrandModel::create($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = BrandModel::findOrFail($id);
        $brands = Brand::where('status', 1)->get();
        return view('admin.model.edit',compact('data', 'brands'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
          'name' => 'required',
          'brand_id' => 'required',
          'status' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();
        $data = BrandModel::findOrFail($id);
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

      //*** GET Request Status
      public function status($id1,$id2)
        {
            $data = BrandModel::findOrFail($id1);
            $data->status = $id2;
            $data->update();
        }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = BrandModel::findOrFail($id);
        $data->delete();

        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
