<?php

namespace App\Http\Controllers\User;

use Datatables;
use App\Models\Skill;
use App\Models\Generalsetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use Auth;

class SkillController extends Controller
{

    //*** JSON Request
    public function datatables()
    {
         $datas = Skill::orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('title', function(Skill $data) {
                                return '<span>'.$data->title.'</span>';
                            })
                             ->addColumn('marks', function(Skill $data) {
                                 return '<span>'.$data->marks.'</span>';
                             })
                            ->addColumn('action', function(Skill $data) {
                                return '<div class="action-list"><a data-href="' . route('user-skill-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('user-skill-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->rawColumns(['title', 'marks', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        $data['skill'] = Generalsetting::first();
        return view('user.skill.index', $data);
    }

    //*** GET Request
    public function create()
    {
        return view('user.skill.create');
    }

    //*** POST Request
    public function store(Request $request)
    {

        //--- Logic Section
        $data = new Skill();
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Skill::findOrFail($id);
        return view('user.skill.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {

        //--- Logic Section
        $data = Skill::findOrFail($id);
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
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
        $data = Skill::findOrFail($id);
        //If Photo Doesn't Exist
        if($data->photo == null){
            $data->delete();
            //--- Redirect Section
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);
            //--- Redirect Section Ends
        }
        //If Photo Exist
        if (file_exists(public_path().'/assets/images/skills/'.$data->photo)) {
            unlink(public_path().'/assets/images/skills/'.$data->photo);
        }
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
