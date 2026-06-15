<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!session()->has('role')) {
            return redirect('/login');
        }

        if (session('role') != $role) {
            abort(403, 'Akses Ditolak');
        }

        return $next($request);
    }
}
