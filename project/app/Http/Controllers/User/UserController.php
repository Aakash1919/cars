<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\GeniusMailer;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Models\Generalsetting;
use App\Models\Car;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cars = Car::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->limit(10)->get();
        return view('user.dashboard',compact('user', 'cars'));
    }
}
