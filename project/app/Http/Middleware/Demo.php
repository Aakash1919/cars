<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Demo
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
         if (Auth::guard('admin')->check()) {
             if (Auth::guard('admin')->user()->IsDemo()){
                 return $next($request);
             }
         }
         return response()->json("This Function is not available for demo version.");
     }
}
