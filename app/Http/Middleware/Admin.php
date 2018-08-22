<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

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

//this is to check if the user is admin or not and this can be used to particular route or methods
     if(!Auth::user()->admin)
     {
       Session::flash('info', 'You do not have permisssions to perform this action.');

       return redirect()->back();
     }

        return $next($request);
    }
}
