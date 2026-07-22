<?php

namespace App\Http\Controllers;

use App\Models\PengirimanLaporan;
use App\Models\LPHP\LphpKabupaten;

class PengirimanLaporanController extends Controller
{
    public function index()
    {
        $idLphp = session('id_lphp');

        $wilayah = LphpKabupaten::where('id_lphp', $idLphp)
            ->pluck('id_kabupaten_kota');

        $data = PengirimanLaporan::with([
                'data.petugas.kecamatan',
                'data.periode',
                'data.bulan',
                'data.tahun'
            ])
            ->whereHas('data.petugas.kecamatan', function ($q) use ($wilayah) {
                $q->whereIn('id_kabupaten_kota', $wilayah);
            })
            ->latest('tanggal_kirim')
            ->get();

        return view(
            'pengiriman_laporan.index',
            compact('data')
        );
    }

    public function kirimPengelola($id)
{
    $pengiriman = PengirimanLaporan::findOrFail($id);

    if ($pengiriman->status != 'terverifikasi') {
        return back()->with(
            'error',
            'Laporan belum dapat dikirim ke Pengelola.'
        );
    }

    if ($pengiriman->is_kirim_pengelola == 1) {
        return back()->with(
            'info',
            'Laporan sudah pernah dikirim.'
        );
    }

    $pengiriman->update([
        'is_kirim_pengelola' => 1
    ]);

    return back()->with(
        'success',
        'Laporan berhasil dikirim ke Pengelola.'
    );
}
}