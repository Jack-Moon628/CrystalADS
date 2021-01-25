<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use App\Log;
use App\User;

class CheckPermissions
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
        $url = $request->url();
        $slug = parse_url($url, PHP_URL_PATH);

        $slug = preg_replace('/\d/', '', $slug);

        if (Auth::user()->account_type_id == 3) {
            $log = new Log;

            $log->action_account_id = Auth::user()->id;
            $log->target_account_id = Auth::user()->id;
            $log->reason = 'Access granted to ' . $slug;
            $log->log_type_id = 6;

            $log->save();

            return $next($request);
        }

        $userPermissions = Auth::user()->userPermissions;

        foreach ($userPermissions as $userPermission) {
            if ($userPermission->permissionType->slug == $slug || $userPermission->permissionType->slug . '/' == $slug) {
                $log = new Log;

                $log->action_account_id = Auth::user()->id;
                $log->target_account_id = Auth::user()->id;
                $log->reason = 'Accessed ' . $slug;
                $log->log_type_id = 6;

                $log->save();

                return $next($request);
            }
        }

        $log = new Log;

        $log->action_account_id = Auth::user()->id;
        $log->target_account_id = Auth::user()->id;
        $log->reason = 'Access blocked to ' . $slug;
        $log->log_type_id = 6;

        $log->save();
   
        abort(403);
    }
}
