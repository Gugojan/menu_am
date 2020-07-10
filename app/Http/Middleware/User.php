<?php

namespace App\Http\Middleware;

use Closure;

class User
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
        if(!auth()->user()->user_type_id){
            return redirect()->route('login');
        }

        if(auth()->user()->user_type_id == 1){
            return redirect()->route('admin/product');
        }

        if(auth()->user()->user_type_id == 2){
            return $next($request);
        }
    }
}
