<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        $user = DB::table('user')
            ->join('role', 'user.id_role', '=', 'role.id_role')
            ->where('user.username', $request->username)
            ->where('user.password', $request->password)
            ->select(
                'user.*',
                'role.nama_role'
            )
            ->first();

        if ($user) {

            session([
                'id_user'  => $user->id_user,
                'username' => $user->username,
                'id_role'  => $user->id_role,
                'role'     => $user->nama_role
            ]);

            if ($user->nama_role == 'pengelola_data') {

                return redirect('/dashboard-pengelola');

    }

    return redirect('/dashboard');

}

        return back()->with('error', 'Username atau Password salah');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}