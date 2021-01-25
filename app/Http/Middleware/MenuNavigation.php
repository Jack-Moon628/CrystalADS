<?php

namespace App\Http\Middleware;

use Auth;
use App\UserPermission;
use Closure;

use Illuminate\Support\Facades\View;

class MenuNavigation
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
        if (isset(Auth::user()->accountType->menu->items)) {
            if (Auth::user()->account_type_id == 5) {
                $menuItems = Auth::user()->accountType->menu->items;
                $userPermissions = UserPermission::where('user_id', Auth::user()->id)->with('permissionType')->get();

                $filteredMenuItems = [];

                foreach ($menuItems as $item) {
                    foreach ($userPermissions as $permission) {
                        if ($item->action == $permission->permissionType->slug) {
                            array_push($filteredMenuItems, (object)[
                                    'icon' => $item->icon,
                                    'name' => $item->name,
                                    'action' => $item->action,
                            ]);

                        }
                    }
                }

                View::share('menuItems', $filteredMenuItems);
            } else {
                if (isset(Auth::user()->accountType->menu->items)) {
                    $menuItems = Auth::user()->accountType->menu->items;

                    View::share('menuItems', $menuItems);
                }

            }

        }

        $wallet = Auth::user()->wallet;

        View::share('wallet', $wallet);

        return $next($request);
    }
}
