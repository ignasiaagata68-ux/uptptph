<?php

namespace App\Http\Controllers;

use App\Models\PengirimanLaporan;

class PengirimanLaporanController extends Controller
{
    public function index()
    {
        $data = PengirimanLaporan::with([
            'data.petugas.kecamatan',
            'data.periode',
            'data.bulan',
            'data.tahun'
        ])
        ->latest('tanggal_kirim')
        ->get();

        return view(
            'pengiriman_laporan.index',
            compact('data')
        );
    }
}