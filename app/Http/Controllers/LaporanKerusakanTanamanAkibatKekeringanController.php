<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;

class LaporanKerusakanTanamanAkibatKekeringanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        //
    {
        $data = DB::table(
                'laporan_kerusakan_tanaman_akibat_kekeringan as l'
            )

            ->leftJoin(
                'kabupaten_kota as kab',
                'l.id_kabupaten_kota',
                '=',
                'kab.id_kabupaten_kota'
            )

            ->leftJoin(
                'kecamatan as kec',
                'l.id_kecamatan',
                '=',
                'kec.id_kecamatan'
            )

            ->leftJoin(
                'periode as p',
                'l.id_periode',
                '=',
                'p.id_periode'
            )

            ->leftJoin(
                'musim_tanam as mt',
                'l.id_musim_tanam',
                '=',
                'mt.id_musim_tanam'
            )

            ->select(
                'l.*',
                'kab.nama_kabupaten_kota',
                'kec.nama_kecamatan',
                'p.periode_pengamatan',
                'mt.musim_tanam'
            )

            ->latest(
                'l.id_laporan_kerusakan_tanaman_akibat_kekeringan'
            )

            ->get();

        return view(
            'laporan_kerusakan_tanaman_akibat_kekeringan.index',
            compact('data')
        );
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

        return view(
            'laporan_kerusakan_tanaman_akibat_kekeringan.create',
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
