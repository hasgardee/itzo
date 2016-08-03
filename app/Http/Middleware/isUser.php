<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Auth;

class isUser
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
       if (Auth::check()) {
            $user = Sentinel::findById(Auth::user()->id);
        if ($user->inRole('user')){
            return $next($request);
        }
        }
    return redirect('/noPermission');
    }
}
