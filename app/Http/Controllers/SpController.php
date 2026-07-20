<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\PengirimanLaporan;
use App\Models\KeadaanSeranganOptDanPengendalianDiWilayahPengamatan;
use App\Models\LaporanKerusakanTanamanAkibatBanjir;
use App\Models\LaporanKerusakanTanamanAkibatKekeringan;


class SpController extends Controller
{
    public function create($id_data)
    {
        $data = Data::with([
            'petugas.kecamatan.kabupaten',
            'tahun',
            'bulan',
            'periode',
            'musimTanam'
        ])->findOrFail($id_data);

        $keadaanSerangan = KeadaanSeranganOptDanPengendalianDiWilayahPengamatan::where(
            'id_data',
            $id_data
        )->first();

        $adaKeadaanSerangan = $keadaanSerangan != null;

        $kekeringan = LaporanKerusakanTanamanAkibatKekeringan::where(
            'id_data',
            $id_data
        )->first();

        $adaKekeringan = $kekeringan != null;

        return view('sp.create', compact(
            'data',
            'keadaanSerangan',
            'adaKeadaanSerangan',
            'kekeringan',
            'adaKekeringan'
        ));
    }

    public function kirim($id_data)
    {
        PengirimanLaporan::updateOrCreate(
            [
                'id_data' => $id_data
            ],
            [
                'status' => 'menunggu',
                'tanggal_kirim' => now(),
                'komentar' => null,
                'tanggal_verifikasi' => null,
                'id_user_lphp' => null
            ]
        );

        return redirect()
            ->route('sp.create', $id_data)
            ->with('success', 'Laporan berhasil dikirim ke LPHP.');
    }

    public function cekStatusPengiriman($idData)
{
    $statusPersemaian = DB::table(
        'det_pengamatan_persemaian_padi as d'
    )
    ->join(
        'pengamatan_persemaian_padi as h',
        'h.id_pengamatan_persemaian_padi',
        '=',
        'd.id_pengamatan_persemaian_padi'
    )
    ->where('h.id_data', $idData)
    ->pluck('d.status_verifikasi');

    $statusKeadaanSerangan = DB::table(
        'det_keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as d'
    )
    ->join(
        'keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as h',
        'h.id_keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan',
        '=',
        'd.id_keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan'
    )
    ->where('h.id_data', $idData)
    ->pluck('d.status_verifikasi');

    $statusKekeringan = DB::table(
        'det_laporan_kerusakan_tanaman_akibat_kekeringan as d'
    )
    ->join(
        'laporan_kerusakan_tanaman_akibat_kekeringan as h',
        'h.id_laporan_kerusakan_tanaman_akibat_kekeringan',
        '=',
        'd.id_laporan_kerusakan_tanaman_akibat_kekeringan'
    )
    ->where('h.id_data', $idData)
    ->pluck('d.status_verifikasi');

    $statusSemua = collect()
        ->merge($statusPersemaian)
        ->merge($statusKeadaanSerangan)
        ->merge($statusKekeringan);

    if ($statusSemua->contains('perlu_perbaikan')) {

        PengirimanLaporan::where('id_data', $idData)
            ->update([
                'status' => 'perlu_perbaikan'
            ]);

        return;
    }

    if ($statusSemua->contains('menunggu')) {

        PengirimanLaporan::where('id_data', $idData)
            ->update([
                'status' => 'menunggu'
            ]);

        return;
    }

    PengirimanLaporan::where('id_data', $idData)
        ->update([
            'status' => 'terverifikasi',
            'tanggal_verifikasi' => now(),
            'id_user_lphp' => session('id_user')
        ]);
}

    

}
