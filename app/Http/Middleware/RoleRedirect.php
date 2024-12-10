<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{
    public function handle($request, Closure $next)
    {
        // Pastikan pengguna sudah login
        if (Auth::check()) {
            $roleId = Auth::user()->role_id;

            // Jika role_id adalah 3, arahkan ke /dashboard_siswa
            if ($roleId == 3) {
                if (!$request->is('dashboard_siswa*')) {
                    return redirect('/dashboard_siswa');
                }
            }

            // Jika role_id adalah 2, arahkan ke /dashboard_pembimbing
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

        // Lanjutkan request jika semuanya sesuai
        return $next($request);
    }
}
