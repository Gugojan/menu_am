<?php

namespace App\Http\Middleware;

use Closure;

class Product
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
            return $next($request);
        }

        if(auth()->user()->user_type_id == 2){
            return redirect()->route('user/order');
        }

    }
}
