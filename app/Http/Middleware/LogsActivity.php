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
                ->log("User visited");
        }

        return $next($request);
    }
}
