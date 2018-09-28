<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizeGet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$model)
    {
        if (auth()->guard('staff')->user()->can('read',$model))
        {
            return $next($request);
        }
        return abort(404);
    }
}
