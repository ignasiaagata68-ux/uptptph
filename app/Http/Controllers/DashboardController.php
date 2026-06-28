<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Petugas;

class DashboardController extends Controller
{
    //
    public function pengelola()
    {
        $totalKabupaten = KabupatenKota::count();
        $totalKecamatan = Kecamatan::count();
        $totalDesa      = Desa::count();
        $totalPetugas   = Petugas::count();

        return view(
            'dashboard_pengelola',
            compact(
                'totalKabupaten',
                'totalKecamatan',
                'totalDesa',
                'totalPetugas'
            )
        );
    }
}
