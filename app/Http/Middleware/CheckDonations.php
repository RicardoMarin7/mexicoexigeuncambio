<?php

namespace App\Http\Middleware;

use Closure;

class CheckDonations
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
        $donations = array_slice(func_get_args(),6);
        if(auth()->user()->hasDonations($donation)){
            return $next($request);
        }
        return redirect('/');
    }

}
