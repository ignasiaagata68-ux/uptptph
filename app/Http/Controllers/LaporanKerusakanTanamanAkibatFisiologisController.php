<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;
use App\Models\LaporanKerusakanTanamanAkibatFisiologis;
use App\Models\DetLaporanKerusakanTanamanAkibatFisiologis;

class LaporanKerusakanTanamanAkibatFisiologisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('laporan_kerusakan_tanaman_akibat_fisiologis as h')
            ->join(
                'kabupaten_kota as k',
                'h.id_kabupaten_kota',
                '=',
                'k.id_kabupaten_kota'
            )
            ->join(
                'kecamatan as kc',
                'h.id_kecamatan',
                '=',
                'kc.id_kecamatan'
            )
            ->join(
                'periode as p',
                'h.id_periode',
                '=',
                'p.periode_pengamatan'
            )
            ->leftJoin(
                'musim_tanam as mt',
                'h.id_musim_tanam',
                '=',
                'mt.id_musim_tanam'
            )
            ->select(
                'h.*',
                'k.nama_kabupaten_kota',
                'kc.nama_kecamatan',
                'p.periode_pengamatan',
                'mt.musim_tanam'
            )
            ->get();

        return view(
            'laporan_kerusakan_tanaman_akibat_fisiologis.index',
            compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_data)
    {
        $data = Data::with([
            'petugas.kecamatan.kabupaten',
            'tahun',
            'bulan',
            'periode',
            'musimTanam'
        ])->findOrFail($id_data);

        $desa = Desa::all();

        $komoditas = Komoditas::all();

        return view(
            'laporan_kerusakan_tanaman_akibat_fisiologis.create',
            compact(
                'data',
                'desa',
                'komoditas'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $header =
        LaporanKerusakanTanamanAkibatFisiologis::create([

            'id_periode' =>
                $request->id_periode[0],

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_musim_tanam' =>
                1

        ]);

        for($i = 0; $i < count($request->id_desa); $i++)
        {

            DetLaporanKerusakanTanamanAkibatFisiologis::create([

                'id_laporan_kerusakan_tanaman_akibat_fisiologis' =>
                    $header->id_laporan_kerusakan_tanaman_akibat_fisiologis,

                'id_tahun' =>
                    $request->id_tahun[0],

                'id_bulan' =>
                    $request->id_bulan[0],

                'id_periode' =>
                    $request->id_periode[0],

                'id_kabupaten_kota' =>
                    $request->id_kabupaten_kota[$i],

                'id_kecamatan' =>
                    $request->id_kecamatan[$i],

                'id_desa' =>
                    $request->id_desa[$i],

                'id_komoditas' =>
                    $request->id_komoditas[$i],

                'varietas' =>
                    $request->varietas[$i],

                'umur' =>
                    $request->umur[$i],

                'luas_tanam' =>
                    $request->luas_tanam[$i],

                'luas_waspada' =>
                    $request->luas_waspada[$i],

                'sps_ringan' =>
                    $request->sps_ringan[$i] ?? 0,

                'sps_sedang' =>
                    $request->sps_sedang[$i] ?? 0,

                'sps_berat' =>
                    $request->sps_berat[$i] ?? 0,

                'sps_puso' =>
                    $request->sps_puso[$i] ?? 0,

                'sps_pulih' =>
                    $request->sps_pulih[$i] ?? 0,

                'sps_jumlah' =>
                    $request->sps_jumlah[$i] ?? 0,

                'luas_tambah_ringan' =>
                    $request->luas_tambah_ringan[$i] ?? 0,

                'luas_tambah_sedang' =>
                    $request->luas_tambah_sedang[$i] ?? 0,

                'luas_tambah_berat' =>
                    $request->luas_tambah_berat[$i] ?? 0,

                'luas_tambah_puso' =>
                    $request->luas_tambah_puso[$i] ?? 0,

                'luas_tambah_jumlah' =>
                    $request->luas_tambah_jumlah[$i] ?? 0,

                'luas_keadaan_ringan' =>
                    $request->luas_keadaan_ringan[$i] ?? 0,

                'luas_keadaan_sedang' =>
                    $request->luas_keadaan_sedang[$i] ?? 0,

                'luas_keadaan_berat' =>
                    $request->luas_keadaan_berat[$i] ?? 0,

                'luas_keadaan_puso' =>
                    $request->luas_keadaan_puso[$i] ?? 0,

                'luas_keadaan_jumlah' =>
                    $request->luas_keadaan_jumlah[$i] ?? 0,

                'penanganan_upaya' =>
                    $request->penanganan_upaya[$i],

                'penanganan_luas' =>
                    $request->penanganan_luas[$i],

                'latitude' =>
                    $request->latitude[$i],

                'longitude' =>
                    $request->longitude[$i],

                'status_verifikasi' =>
                    'menunggu',

                'keterangan_verifikasi' =>
                    null,

                'verified_by' =>
                    null,

                'verified_at' =>
                    null

            ]);

        }

        return redirect()
            ->route(
                'laporan-kerusakan-tanaman-akibat-fisiologis.index'
            )
            ->with(
                'success',
                'Data berhasil disimpan'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
