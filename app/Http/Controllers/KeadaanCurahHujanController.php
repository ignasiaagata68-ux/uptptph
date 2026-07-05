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
            'kabupaten_kota as kab',
            'h.id_kabupaten_kota',
            '=',
            'kab.id_kabupaten_kota'
        )

        ->join(
            'kecamatan as kec',
            'h.id_kecamatan',
            '=',
            'kec.id_kecamatan'
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
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
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
    dd($request->all());
    DB::beginTransaction();

    try {

        // ==========================
        // Simpan Header
        // ==========================

        $header = KeadaanCurahHujan::create([

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_bulan' =>
                $request->id_bulan[0],

            'id_musim_tanam' =>
                $request->id_musim_tanam[0]

        ]);

        // ==========================
        // Simpan Detail
        // ==========================

        for ($i = 0; $i < count($request->tanggal_penakaran); $i++) {

            DetKeadaanCurahHujan::create([

                'id_keadaan_curah_hujan' =>
                    $header->id_keadaan_curah_hujan,

                'tanggal_penakaran' =>
                    $request->tanggal_penakaran[$i],

                'dasiran' =>
                    $request->dasiran[$i],

                'curah_hujan_mm' =>
                    $request->curah_hujan_mm[$i],

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

        // ==========================
        // REKAP
        // (nanti kita isi)
        // ==========================

        DB::commit();

        return redirect()
            ->route('keadaan-curah-hujan.index')
            ->with(
                'success',
                'Data berhasil disimpan.'
            );

    } catch (\Exception $e) {

        DB::rollBack();
        dd([
        'message' => $e->getMessage(),
        'line'    => $e->getLine(),
        'file'    => $e->getFile(),
    ]);
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