<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

use Session;

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
        if(Auth::guard()->user()->permission < 3) {
            
            Session::flash('warning', 'You are not authorized to view this page');

            return redirect()->route('home');
        }

        return $next($request);
    }
}
