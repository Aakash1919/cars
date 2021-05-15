<?php

namespace App\Http\Middleware;

use Closure;

class DemoUser
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
         return response()->json("This Function is not available for demo version.");
     }
}
