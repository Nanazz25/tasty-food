<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->is_superadmin) {
            return $next($request);
        }

        abort(403, 'Akses ditolak. Hanya Super Admin yang dapat mengakses halaman ini.');
    }
}
