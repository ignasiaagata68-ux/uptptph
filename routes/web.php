<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KabupatenKotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KomoditasController;
use App\Http\Controllers\MusimTanamController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\BulanController;
use App\Http\Controllers\KelompokTaniController;
use App\Http\Controllers\MaController;
use App\Http\Controllers\OptController;
use App\Http\Controllers\UserAplikasiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('ceklogin')->group(function () {

    Route::get('/dashboard', function () {

        if (session('role') == 'pengelola_data') {
            return redirect('/dashboard-pengelola');
        }

        if (session('role') == 'popt') {
            return redirect('/dashboard-popt');
        }

        if (session('role') == 'lphp') {
            return redirect('/dashboard-lphp');
        }

        if (session('role') == 'pimpinan') {
            return redirect('/dashboard-pimpinan');
        }

        return redirect('/login');

    });

});
Route::middleware([
    'ceklogin',
    'cekrole:pengelola_data'
])->group(function () {

    Route::get('/dashboard-pengelola', function () {

        return '
            <h1>Dashboard Pengelola Data</h1>
            <hr>

            Login sebagai : '.session('username').'<br>
            Role : '.session('role').'<br><br>

            <h3>Master Data</h3>

            <a href="/kabupaten">Kabupaten/Kota</a><br>
            <a href="/kecamatan">Kecamatan</a><br>
            <a href="/desa">Desa</a><br>
            <a href="/komoditas">Komoditas</a><br>
            <a href="/musim_tanam">Musim Tanam</a><br>
            <a href="/tahun">Tahun</a><br>
            <a href="/bulan">Bulan</a><br>
            <a href="/kelompok-tani">Kelompok Tani</a><br>
            <a href="/ma">MA</a><br>
            <a href="/opt">OPT</a><br>
            <a href="/periode">Periode</a><br>
            <a href="/petugas">Petugas</a><br>
            <a href="/user-aplikasi">User Aplikasi</a><br>
            <a href="/role">Role & Permission</a><br><br>

            <a href="/logout">Logout</a>

        ';
    });

    // MASTER DATA
    Route::resource('kabupaten', KabupatenKotaController::class);
    Route::resource('kecamatan', KecamatanController::class);
    Route::resource('desa', DesaController::class);
    Route::resource('komoditas', KomoditasController::class);
    Route::resource('musim_tanam', MusimTanamController::class);
    Route::resource('tahun', TahunController::class);
    Route::resource('bulan', BulanController::class);
    Route::resource('kelompok-tani', KelompokTaniController::class);
    Route::resource('ma', MaController::class);
    Route::resource('opt', OptController::class);
    Route::resource('periode', PeriodeController::class);
    Route::resource('petugas', PetugasController::class);

    Route::middleware('permission:kelola_user')->group(function () {

        Route::resource(
            'user-aplikasi',
            UserAplikasiController::class
        );

        Route::get('/role', [RoleController::class, 'index']);
        Route::get('/role/{id}', [RoleController::class, 'show']);
        Route::post('/role/{id}', [RoleController::class, 'update']);

    });

});

    Route::middleware('permission:kelola_user')->group(function () {

        Route::resource(
            'user-aplikasi',
            UserAplikasiController::class
        );

        Route::get('/role', [RoleController::class, 'index']);
        Route::get('/role/{id}', [RoleController::class, 'show']);
        Route::post('/role/{id}', [RoleController::class, 'update']);



    });

Route::middleware(['ceklogin','cekrole:popt'])->group(function () {

    Route::get('/dashboard-popt', function () {

        return '
        <h1>Dashboard POPT</h1>
        <hr>

        Login sebagai : '.session('username').'<br>
        Role : '.session('role').'<br><br>

        Menu Input Data POPT

        <br><br>

        <a href="/logout">Logout</a>
        ';
    });

});

Route::middleware(['ceklogin','cekrole:lphp'])->group(function () {

    Route::get('/dashboard-lphp', function () {

        return '
        <h1>Dashboard LPHP</h1>
        <hr>

        Login sebagai : '.session('username').'<br>
        Role : '.session('role').'<br><br>

        Menu Input Data LPHP

        <br><br>

        <a href="/logout">Logout</a>
        ';
    });

});

Route::middleware(['ceklogin','cekrole:pimpinan'])->group(function () {

    Route::get('/dashboard-pimpinan', function () {

        return '
        <h1>Dashboard Pimpinan</h1>
        <hr>

        Login sebagai : '.session('username').'<br>
        Role : '.session('role').'<br><br>

        Menu Laporan

        <br><br>

        <a href="/logout">Logout</a>
        ';
    });
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/proses-login', [AuthController::class, 'prosesLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
