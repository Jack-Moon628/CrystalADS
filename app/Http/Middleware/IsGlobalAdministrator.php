<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class IsGlobalAdministrator
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
        if (Auth::user()->account_type_id === 3) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
