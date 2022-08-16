<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessControl
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
        $user = Auth::user();
        if($user){
            return redirect()->intended('dashboard');
        }else{
            return $next($request);
        }
    }
}
