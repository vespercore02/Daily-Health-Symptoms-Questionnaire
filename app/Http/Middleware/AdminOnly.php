<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminOnly
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

        //dd(Auth::user()->username);
        
        if (Auth::user()->role == "Admin") {
            // Do the thing you want ... (return or redirect to somewhere else)
            //redirect()->route('home');
            return $next($request);
        }
        

        return back();
    }
}
