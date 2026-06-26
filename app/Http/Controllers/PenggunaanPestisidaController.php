<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Data;
use App\Models\PenggunaanPestisida;
use App\Models\DetPenggunaanPestisida;

class PenggunaanPestisidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('penggunaan_pestisida as h')
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
            'penggunaan_pestisida.index',
            compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_data)
    {
        $data = Data::findOrFail($id_data);

        $desa = DB::table('desa')
            ->where(
                'id_kecamatan',
                $data->petugas->id_kecamatan
            )
            ->get();

        return view(
            'penggunaan_pestisida.create',
            compact(
                'data',
                'desa'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $header =
        PenggunaanPestisida::create([

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_periode' =>
                $request->id_periode[0],

            'id_musim_tanam' =>
                $request->id_musim_tanam[0],

        ]);

        for($i=0; $i<count($request->no); $i++)
        {

            DetPenggunaanPestisida::create([

                'id_penggunaan_pestisida' =>
                    $header->id_penggunaan_pestisida,

                'no' =>
                    $request->no[$i],

                'lokasi_wilkel_desa' =>
                    $request->lokasi_wilkel_desa[$i],

                'jenis_dan_formulasi' =>
                    $request->jenis_dan_formulasi[$i],

                'penggunaan' =>
                    $request->penggunaan[$i],

                'volume_semprot' =>
                    $request->volume_semprot[$i],

                'jenis_tanaman' =>
                    $request->jenis_tanaman[$i],

                'opt_sasaran' =>
                    $request->opt_sasaran[$i],

                'opt_non_sasaran' =>
                    $request->opt_non_sasaran[$i],

                'lingkungan_hayati' =>
                    $request->lingkungan_hayati[$i],

                'jumlah_korban' =>
                    $request->jumlah_korban[$i],

                'sebab' =>
                    $request->sebab[$i],

                'ket' =>
                    $request->ket[$i]

            ]);

        }

        return redirect()
            ->route('penggunaan-pestisida.index')
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