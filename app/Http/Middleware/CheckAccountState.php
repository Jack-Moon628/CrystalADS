<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckAccountState
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
        if(Auth::user()->disabled) {
            return redirect('/disabled');
        } else if(Auth::user()->account_type_id == 6) {
            return redirect('/account/setup');
        } else if (!Auth::user()->approved) {
            return redirect('/account/awaiting-approval');
        }

        return $next($request);
    }
}
