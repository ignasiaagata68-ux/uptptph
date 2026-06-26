<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Data;
use App\Models\KeadaanCurahHujan;
use App\Models\DetKeadaanCurahHujan;
use App\Models\RekapKeadaanCurahHujan;

class KeadaanCurahHujanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('keadaan_curah_hujan as h')
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
                'bulan as b',
                'h.id_bulan',
                '=',
                'b.id_bulan'
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
                'b.bulan',
                'mt.musim_tanam'
            )
            ->get();

        return view(
            'keadaan_curah_hujan.index',
            compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_data)
    {
        $data = Data::findOrFail($id_data);

        return view(
            'keadaan_curah_hujan.create',
            compact('data')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::beginTransaction();

        try{

            $header = KeadaanCurahHujan::create([

                'id_kabupaten_kota' => $request->id_kabupaten_kota[0],

                'id_kecamatan' => $request->id_kecamatan[0],

                'id_bulan' => $request->id_bulan[0],

                'id_musim_tanam' => 1

            ]);

            for($i=0;$i<count($request->tanggal_penakaran);$i++)
            {

                $detail = DetKeadaanCurahHujan::create([

                    'id_keadaan_curah_hujan'
                        => $header->id_keadaan_curah_hujan,

                    'tanggal_penakaran'
                        => $request->tanggal_penakaran[$i],

                    'dasiran'
                        => $request->dasiran[$i],

                    'curah_hujan_mm'
                        => $request->curah_hujan_mm[$i]

                ]);

                RekapKeadaanCurahHujan::create([

                    'id_det_keadaan_curah_hujan'
                        => $detail->id_det_keadaan_curah_hujan,

                    'jumlah_ch'
                        => $request->jumlah_ch[$i] ?? null,

                    'jumlah_hh'
                        => $request->jumlah_hh[$i] ?? null,

                    'deret_hari_kering'
                        => $request->deret_hari_kering[$i] ?? null,

                    'deret_hari_basah'
                        => $request->deret_hari_basah[$i] ?? null,

                    'ch_max'
                        => $request->ch_max[$i] ?? null

                ]);

            }

            DB::commit();

            return redirect()
                ->route('keadaan-curah-hujan.index')
                ->with(
                    'success',
                    'Data berhasil disimpan.'
                );

        }catch(\Exception $e){

            DB::rollback();

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );

        }

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