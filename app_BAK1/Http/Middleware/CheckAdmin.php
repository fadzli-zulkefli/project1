<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        //return $next($request);
        if (!auth()->user()->admin) {
            auth()->logout();
            abort(403);
            //return redirect()->route('login');
        }
        return $next($request);
    }
}
