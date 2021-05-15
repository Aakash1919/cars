<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;

class PageController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Page::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                             ->editColumn('title', function(Page $data) {
                                 return  "<strong>".$data->title."</strong>";
                             })
                            ->editColumn('details', function(Page $data) {
                                $details = strlen(strip_tags($data->details)) > 150 ? substr(strip_tags($data->details),0,150).'...' : strip_tags($data->details);
                                return  $details;
                            })
                            ->addColumn('action', function(Page $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-page-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-page-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->rawColumns(['title', 'details', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.page.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.page.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $slug = $request->slug;
        $main = array('home','faq','contact','blog');
        if (in_array($slug, $main)) {
          return response()->json(array('errors' => [ 0 => 'This slug has already been taken.' ]));
        }
        $rules = ['slug' => 'unique:pages'];
        $customs = ['slug.unique' => 'This slug has already been taken.'];
        $validator = Validator::make(Input::all(), $rules, $customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();

        if (!empty($request->meta_tag))
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);
         }
        if ($request->secheck == "")
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
         }
        $page = Page::create($input);
        //--- Logic Section Ends

        if (!$request->filled('slug')) {
           $page->slug = Str::slug($request->title, '-') . '-' . Str::random(5) .'-'. $page->id;
           $page->save();
        }

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Page::findOrFail($id);
        return view('admin.page.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $slug = $request->slug;
        $main = array('home','faq','contact','blog');
        if (in_array($slug, $main)) {
        return response()->json(array('errors' => [ 0 => 'This slug has already been taken.' ]));
        }
        $rules = ['slug' => 'unique:pages,slug,'.$id];
        $customs = ['slug.unique' => 'This slug has already been taken.'];
        $validator = Validator::make(Input::all(), $rules, $customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Page::findOrFail($id);
        $input = $request->all();
        if (!empty($request->meta_tag))
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);
         }
         else {
            $input['meta_tag'] = null;
         }
        if ($request->secheck == "")
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
         }
        $page = $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Page::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
