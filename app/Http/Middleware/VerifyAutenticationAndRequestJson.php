<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;

class VerifyAutenticationAndRequestJson
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
        if ( auth()->check()  && $request->wantsJson()){
           return $next( $request );
        }
        return Redirect('/');
    }
}