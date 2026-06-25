<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Data;
use App\Models\Desa;
use App\Models\KumulatifLuasTambahTanamPadi;
use App\Models\DetKumulatifLuasTambahTanamPadi;

class KumulatifLuasTambahTanamPadiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('kumulatif_luas_tambah_tanam_padi as h')
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
            'kumulatif_luas_tambah_tanam_padi.index',
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

        return view(
            'kumulatif_luas_tambah_tanam_padi.create',
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
        KumulatifLuasTambahTanamPadi::create([

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

            DetKumulatifLuasTambahTanamPadi::create([

                'id_kumulatif_luas_tambah_tanam_padi' =>
                    $header->id_kumulatif_luas_tambah_tanam_padi,

                'no' =>
                    $request->no[$i],

                'id_kabupaten_kota' =>
                    $request->id_kabupaten_kota[$i],

                'id_kecamatan' =>
                    $request->id_kecamatan[$i],

                'id_desa' =>
                    $request->id_desa[$i],

                'total_luas_laporan_periode_lalu' =>
                    $request->total_luas_laporan_periode_lalu[$i],

                'var1' =>
                    $request->var1[$i],

                'var2' =>
                    $request->var2[$i],

                'var3' =>
                    $request->var3[$i],

                'var4' =>
                    $request->var4[$i],

                'var5' =>
                    $request->var5[$i],

                'var6' =>
                    $request->var6[$i],

                'var7' =>
                    $request->var7[$i],

                'var8' =>
                    $request->var8[$i],

                'var9' =>
                    $request->var9[$i],

                'var10' =>
                    $request->var10[$i]

            ]);

        }

        return redirect()
            ->route('kumulatif-luas-tambah-tanam-padi.index')
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