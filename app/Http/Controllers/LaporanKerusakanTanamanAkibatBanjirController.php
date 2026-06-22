<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;

use App\Models\LaporanKerusakanTanamanAkibatBanjir;
use App\Models\DetLaporanKerusakanTanamanAkibatBanjir;

class LaporanKerusakanTanamanAkibatBanjirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_data)
    {
        //
         $data = Data::with([
            'petugas.kecamatan.kabupaten',
            'tahun',
            'bulan',
            'periode',
            'musimTanam'
        ])->findOrFail($id_data);

        $desa = Desa::all();

        $komoditas = Komoditas::all();
        dd($komoditas->first()->toArray());
        return view(
            'laporan_kerusakan_tanaman_akibat_banjir.create',
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
        //
        dd(
            $request->id_komoditas,
            $request->id_desa
        );
        $header =
        LaporanKerusakanTanamanAkibatBanjir::create([

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
            DetLaporanKerusakanTanamanAkibatBanjir::create([

                'id_laporan_kerusakan_tanaman_akibat_banjir' =>
                    $header->id_laporan_kerusakan_tanaman_akibat_banjir,

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

                'var' =>
                    $request->var[$i],

                'umur' =>
                    $request->umur[$i],

                'luas_tanam' =>
                    $request->luas_tanam[$i],

                'luas_waspada' =>
                    $request->luas_waspada[$i],

                'sps_surut_luas' =>
                    $request->sps_surut_luas[$i],

                'sps_surut_ket' =>
                    $request->sps_surut_ket[$i],

                'sps_puso_luas' =>
                    $request->sps_puso_luas[$i],

                'sps_puso_ket' =>
                    $request->sps_puso_ket[$i],

                'luas_tambah_terkena' =>
                    $request->luas_tambah_terkena[$i],

                'luas_tambah_puso' =>
                    $request->luas_tambah_puso[$i],

                'luas_keadaan_terkena' =>
                    $request->luas_keadaan_terkena[$i],

                'luas_keadaan_puso' =>
                    $request->luas_keadaan_puso[$i],

                'penangan_upaya' =>
                    $request->penangan_upaya[$i],

                'penangan_jumlah' =>
                    $request->penangan_jumlah[$i],

                'koordinat_latitude' =>
                    $request->koordinat_latitude[$i],

                'koordinat_longitude' =>
                    $request->koordinat_longitude[$i],

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
                'laporan-kerusakan-tanaman-akibat-banjir.index'
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
