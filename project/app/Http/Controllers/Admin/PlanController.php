<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;
use Datatables;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Plan::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('title', function(Plan $data) {
                                return '<strong>'.$data->title.'</strong>';
                            })
                            ->addColumn('currency', function(Plan $data) {
                                return '<span>'.$data->currency.'</span>';
                            })
                            ->addColumn('price', function(Plan $data) {
                                if (empty($data->price)) {
                                  return '<span>Free</span>';
                                } else {
                                  return '<span>'.$data->price.'</span>';
                                }
                            })
                            ->addColumn('days', function(Plan $data) {
                                return '<span>'.$data->days.'</span>';
                            })
                            ->addColumn('ads', function(Plan $data) {
                                return '<span>'.$data->ads.'</span>';
                            })
                            ->addColumn('status', function(Plan $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-plan-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Active</option><<option data-val="0" value="'. route('admin-plan-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactive</option>/select></div>';
                            })
                            ->addColumn('action', function(Plan $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-plan-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a></div>';
                            })
                            ->rawColumns(['title','currency','currency_code','price','days','ads','status', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.plan.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.plan.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'title' => 'required|max:255',
            'currency' => 'required|max:30',
            'currency_code' => 'required',
            'price' => 'required|numeric',
            'days' => 'required|integer',
            'ads' => 'required',
            'details' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();

        $plan = Plan::create($input);

        //--- Redirect Section
        $msg = 'New Plan Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Plan::findOrFail($id);
        return view('admin.plan.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'title' => 'required|max:255',
            'currency' => 'required|max:30',
            'currency_code' => 'required',
            'price' => 'required|numeric',
            'days' => 'required|integer',
            'ads' => 'required',
            'details' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Plan::findOrFail($id);
        $input = $request->all();
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
        $data = Plan::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

}
