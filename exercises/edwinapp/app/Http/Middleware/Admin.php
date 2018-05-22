<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::check()) {
            //isAdmin() is function we write in User model class
            if(Auth::user()->isAdmin()) {
                return $next($request);
            }
        }

        return redirect('/');


        
    }
}
