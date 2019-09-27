<?php

namespace App\Http\Middleware;

use Closure;

class LogsActivity
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            activity()
                ->causedBy(auth()->user())
                ->log("has visited <u><a href='{$request->fullUrl()}'>{$request->fullUrl()}</a></u>");
        }

        return $next($request);
    }
}
