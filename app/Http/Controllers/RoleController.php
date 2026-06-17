<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();

        return view('role.index', compact('roles'));
    }

    public function show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        $permissions = Permission::all();

        return view(
            'role.show',
            compact('role', 'permissions')
        );
    }
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->permissions()->sync(
            $request->permissions ?? []
        );

        return redirect('/role')
            ->with(
                'success',
                'Permission berhasil diupdate'
            );
    }
}