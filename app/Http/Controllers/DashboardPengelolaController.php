<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Petugas;
use App\Models\UserAplikasi;
use App\Models\Periode;

class DashboardPengelolaController extends Controller
{
    public function index()
    {
        // Statistik Master Data
        $jumlahKabupaten = KabupatenKota::count();
        $jumlahKecamatan = Kecamatan::count();
        $jumlahDesa      = Desa::count();
        $jumlahPetugas   = Petugas::count();
        $jumlahUser      = UserAplikasi::count();

        // Periode Aktif
        $periodeAktif = Periode::orderBy('id_periode', 'desc')->first();

        return view('dashboard.pengelola', compact(
            'jumlahKabupaten',
            'jumlahKecamatan',
            'jumlahDesa',
            'jumlahPetugas',
            'jumlahUser',
            'periodeAktif'
        ));
    }
}