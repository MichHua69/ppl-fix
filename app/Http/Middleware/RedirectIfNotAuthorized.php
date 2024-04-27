<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAuthorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Memeriksa apakah peran pengguna termasuk dalam daftar peran yang diizinkan
        if (in_array($user->id_role, $roles)) {
            return $next($request);
        }

        // Peran pengguna tidak diizinkan, arahkan mereka ke dashboard yang sesuai
        switch ($user->id_role) {
            case 1:
                return redirect('/dinas/dashboard');
            case 2:
                return redirect('/dokter/dashboard');
            case 3:
                return redirect('/peternak/dashboard');
            default:
                return redirect('/login');
        }
    }
}
