<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
        if(Auth::check())
        {
            if($user->isAdmin())
            {
                return $next($request);
            }
            return  redirect('home');
        }
        return redirect('login') ;
    }
}
