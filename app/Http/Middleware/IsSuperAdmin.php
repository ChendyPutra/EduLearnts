<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Auth::guard('admin')->user();

        // Cek apakah admin login dan punya role superadmin
        if (!$admin || $admin->role !== 'superadmin') {
            abort(403, 'Akses hanya untuk superadmin.');
        }

        return $next($request);
    }
}
