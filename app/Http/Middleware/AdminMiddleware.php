<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'admin_super'])) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Akses ditolak. Hanya admin yang diperbolehkan.');
    }
}
