<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;
use App\Models\Permission;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        if (!session()->has('id_user')) {
            return redirect('/login');
        }

        $role = Role::with('permissions')
            ->find(session('id_role'));

        if (!$role) {
            abort(403, 'Role tidak ditemukan');
        }

        $hasPermission = $role->permissions
            ->contains('nama_permission', $permission);

        if (!$hasPermission) {
            abort(403, 'Anda tidak memiliki permission');
        }
        return $next($request);
    }
}
