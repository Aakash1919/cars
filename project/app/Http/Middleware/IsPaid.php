<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Session;

class IsPaid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
     {
         if (Auth::check()) {
             if (isset(Auth::user()->current_plan)){
                 return $next($request);
             }
         }
        Session::flash('unsuccess', 'This Function is only available for Paid Users.');
        return back();
     }
}
