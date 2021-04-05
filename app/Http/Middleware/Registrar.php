<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Registrar
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
        if(!Auth::check()) {
            return redirect('/welcome');
        }

        // admin
        if(Auth::user()->role_id == 1) { 
            return redirect('/dashboard');
        }

        //registrar
        if(Auth::user()->role_id == 2) {
            return $next($request);
        }
        
    }
}
