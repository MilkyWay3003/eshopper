<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use User;

class restrictAccess
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
        if(Auth::check() && Auth::User()->isAdmin()){
            return $next($request);
    }
       return redirect("/login");
    }
}
