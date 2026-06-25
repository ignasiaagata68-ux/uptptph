<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Data;
use App\Models\TangkapanLampuPerangkap;
use App\Models\DetTangkapanLampuPerangkap;

class TangkapanLampuPerangkapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('tangkapan_lampu_perangkap as h')
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
            'tangkapan_lampu_perangkap.index',
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
            'bulan',
            'periode',
            'musimTanam'
        ])->findOrFail($id_data);

        return view(
            'tangkapan_lampu_perangkap.create',
            compact('data')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $header =
        TangkapanLampuPerangkap::create([

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_periode' =>
                $request->id_periode[0],

            'id_musim_tanam' =>
                $request->id_musim_tanam

        ]);

        for($i=0; $i<count($request->penggerek_batang_padi_kn); $i++)
        {

            DetTangkapanLampuPerangkap::create([

                'id_tangkapan_lampu_perangkap' =>
                    $header->id_tangkapan_lampu_perangkap,

                'penggerek_batang_padi_kn' =>
                    $request->penggerek_batang_padi_kn[$i],

                'penggerek_batang_padi_pt' =>
                    $request->penggerek_batang_padi_pt[$i],

                'wereng_ck' =>
                    $request->wereng_ck[$i],

                'wereng_pp' =>
                    $request->wereng_pp[$i],

                'wereng_daun_vn' =>
                    $request->wereng_daun_vn[$i],

                'wereng_daun_nn' =>
                    $request->wereng_daun_nn[$i],

                'ganjur' =>
                    $request->ganjur[$i],

                'kepinding_tanah' =>
                    $request->kepinding_tanah[$i],

                'walang_sangit' =>
                    $request->walang_sangit[$i],

                'musuh_alami1' =>
                    $request->musuh_alami1[$i],

                'musuh_alami2' =>
                    $request->musuh_alami2[$i],

                'musuh_alami3' =>
                    $request->musuh_alami3[$i],

                'musuh_alami4' =>
                    $request->musuh_alami4[$i]

            ]);

        }

        return redirect()
            ->route('tangkapan-lampu-perangkap.index')
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
