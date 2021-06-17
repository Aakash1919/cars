<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\Notifications;
use Datatables;
use Auth;
use Session;
use Validator;

class NotificationController extends Controller
{

    public function index() {
        return view('user.notifications.index');
    }

   
    public function datatables() {
        $datas = Notifications::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)->addColumn('message', function(Notifications $data) {
                                 return '<span>'.$data->message.'</span>';
                             })
                            //  ->editColumn('action', function(Notifications $data) {
                            //     return '<strong><a href="javascript:void(0)" class="changeStatus btn btn-info btn-sm px-2" title="View Bids"><i class="fas fa-eye"></i>View</a></strong>';
                            // })
                            ->rawColumns(['message', 'action'])
                            ->toJson(); 
    }

    public function view() {
        return view('user.notifications.view');
    }

}