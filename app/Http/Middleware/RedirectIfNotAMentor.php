<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAMentor
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

        if(!$request->user()->mentor)
        {
            return redirect('/home');
//            dd($request->user()->mentor);
        }
        elseif($request->user()->mentor)
        {

        }

        return $next($request);
    }
}
