<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
{
    $user = DB::table('user')
            ->where('username', $request->username)
            ->first();

    if (!$user) {

        return back()->with(
            'error',
            'Username atau Password salah'
        );

    }

    if (!Hash::check($request->password, $user->password)) {

        return back()->with(
            'error',
            'Username atau Password salah'
        );

    }

    if ($user->status != 'aktif') {

        return back()->with(
            'error',
            'Akun Anda tidak aktif'
        );

    }

    session([

        'id_user'  => $user->id_user,

        'username' => $user->username,

        'role'     => $user->role,

        'status'   => $user->status

    ]);

    if ($user->role == 'pengelola_data') {
        return redirect('/dashboard-pengelola');
    }

    if ($user->role == 'popt') {
        return redirect('/dashboard-popt');
    }

    if ($user->role == 'lphp') {
        return redirect('/dashboard-lphp');
    }

    if ($user->role == 'pimpinan') {
        return redirect('/dashboard-pimpinan');
    }

    return redirect('/dashboard');
}

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}