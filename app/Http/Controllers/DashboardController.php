<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Petugas;

class DashboardController extends Controller
{
    public function index()
    {
        // id user yang sedang login
        $idUser = session('id_user');

        // cari id petugas dari user login
        $petugas = Petugas::where('id_user', $idUser)->first();

        // jika belum punya data petugas
        if (!$petugas) {

            return view('dashboard.index', [
                'jumlahPengamatan' => 0
            ]);

        }

        // jumlah seluruh pencatatan milik petugas
        $jumlahPengamatan = Data::where(
            'id_petugas',
            $petugas->id_petugas
        )->count();

        return view(
            'dashboard.index',
            compact('jumlahPengamatan')
        );
    }
}