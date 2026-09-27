<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        if (! $user) {
            abort(403, 'User Belum Login');
        }

        if (! in_array($user->role, $roles)) {
            // jika tidak diizinkan → tolak akses, tampilkan halaman error
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // jika diizinkan → lanjutkan request ke Controller
        return $next($request);
    }
}
