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
    $request->validate([
        'username' => 'required',
        'password' => 'required|size:8',
    ], [
        'username.required' => 'Username wajib diisi.',
        'password.required' => 'Password wajib diisi.',
        'password.size' => 'Password harus tepat 8 karakter.',
    ]);

    $user = DB::table('user')
        ->whereRaw('BINARY username = ?', [$request->username])
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

    $request->session()->regenerate();
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

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}