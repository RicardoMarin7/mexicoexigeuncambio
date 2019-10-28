<?php

namespace App\Http\Middleware;

use Closure;

class CheckPurchases
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $libro)
    {
        $purchases = array_slice(func_get_args(),2);

        if(auth()->user()->hasPurchased($purchases)){
            return $next($request);
        }

        return redirect('/');
    }
}
}
