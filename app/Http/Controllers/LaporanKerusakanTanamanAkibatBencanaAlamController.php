<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;

use App\Models\LaporanKerusakanTanamanAkibatBencanaAlam;
use App\Models\DetLaporanKerusakanTanamanAkibatBencanaAlam;

class LaporanKerusakanTanamanAkibatBencanaAlamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('laporan_kerusakan_tanaman_akibat_bencana_alam as h')
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
                'p.id_periode'
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
            'laporan_kerusakan_tanaman_akibat_bencana_alam.index',
            compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_data)
    {
        $data = Data::findOrFail($id_data);

        $desa = Desa::all();

        $komoditas = Komoditas::all();

        return view(
            'laporan_kerusakan_tanaman_akibat_bencana_alam.create',
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
        LaporanKerusakanTanamanAkibatBencanaAlam::create([

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_periode' =>
                $request->id_periode[0],

            'id_musim_tanam' =>
                1

        ]);

        for($i=0; $i<count($request->id_desa); $i++)
        {

            DetLaporanKerusakanTanamanAkibatBencanaAlam::create([

                'id_laporan_kerusakan_tanaman_akibat_bencana_alam' =>
                    $header->id_laporan_kerusakan_tanaman_akibat_bencana_alam,

                'id_tahun' =>
                    $request->id_tahun[$i],

                'id_bulan' =>
                    $request->id_bulan[$i],

                'id_periode' =>
                    $request->id_periode[$i],

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

                'umr' =>
                    $request->umr[$i],

                'lst' =>
                    $request->lst[$i],

                'was' =>
                    $request->was[$i],

                'lsrt' =>
                    $request->lsrt[$i],

                'k_s' =>
                    $request->k_s[$i],

                'lpso' =>
                    $request->lpso[$i],

                'k_p' =>
                    $request->k_p[$i],

                'lt_t' =>
                    $request->lt_t[$i],

                'lt_p' =>
                    $request->lt_p[$i],

                'lk_t' =>
                    $request->lk_t[$i],

                'lk_p' =>
                    $request->lk_p[$i],

                'upy' =>
                    $request->upy[$i],

                'j_upy' =>
                    $request->j_upy[$i],

                'lat' =>
                    $request->lat[$i],

                'long' =>
                    $request->long[$i]

            ]);
        }

        return redirect()
            ->route('laporan-kerusakan-tanaman-akibat-bencana-alam.index')
            ->with(
                'success',
                'Data berhasil disimpan.'
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
