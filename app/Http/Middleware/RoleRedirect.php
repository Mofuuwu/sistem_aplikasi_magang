<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $roleId = Auth::user()->role_id;
            if ($roleId == 3) {
                if (!$request->is('dashboard_siswa*')) {
                    return redirect('/dashboard_siswa');
                }
            }

            if ($roleId == 2) {
                if (!$request->is('dashboard_pembimbing*')) {
                    return redirect('/dashboard_pembimbing');
                }
            }

            if ($roleId == 1) {
                if (!$request->is('dashboard_admin*')) {
                    return redirect('/dashboard_admin');
                }
            }
        }

        return $next($request);
    }
}
