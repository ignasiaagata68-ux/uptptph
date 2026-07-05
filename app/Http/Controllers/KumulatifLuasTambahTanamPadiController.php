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

        ->leftJoin(
            'det_kumulatif_luas_tambah_tanam_padi as d',
            'h.id_kumulatif_luas_tambah_tanam_padi',
            '=',
            'd.id_kumulatif_luas_tambah_tanam_padi'
        )

        ->select(
            'h.*',
            'k.nama_kabupaten_kota',
            'kc.nama_kecamatan',
            'p.periode_pengamatan',
            'mt.musim_tanam',
            DB::raw('MAX(d.status_verifikasi) as status_verifikasi'),
            DB::raw('MAX(d.keterangan_verifikasi) as keterangan_verifikasi')
        )

        ->groupBy(
            'h.id_kumulatif_luas_tambah_tanam_padi',
            'h.id_kabupaten_kota',
            'h.id_kecamatan',
            'h.id_periode',
            'h.id_musim_tanam',
            'k.nama_kabupaten_kota',
            'kc.nama_kecamatan',
            'p.periode_pengamatan',
            'mt.musim_tanam'
        )

        ->orderByDesc('h.id_kumulatif_luas_tambah_tanam_padi')

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
    $data = Data::with([
        'petugas.kecamatan.kabupaten',
        'bulan',
        'periode',
        'musimTanam'
    ])->findOrFail($id_data);

    $desa = Desa::where(
        'id_kecamatan',
        $data->petugas->id_kecamatan
    )->orderBy('nama_desa')
     ->get();

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
    DB::beginTransaction();

    try {

        $header = KumulatifLuasTambahTanamPadi::create([
            'id_kabupaten_kota' => $request->id_kabupaten_kota[0],
            'id_kecamatan'      => $request->id_kecamatan[0],
            'id_periode'        => $request->id_periode[0],
            'id_musim_tanam'    => $request->id_musim_tanam[0],
        ]);

        for ($i = 0; $i < count($request->id_desa); $i++) {

            if (empty($request->id_desa[$i])) {
                continue;
            }

            DetKumulatifLuasTambahTanamPadi::create([

                'id_kumulatif_luas_tambah_tanam_padi'
                    => $header->id_kumulatif_luas_tambah_tanam_padi,

                'no'
                    => $request->no[$i],

                'id_kabupaten_kota'
                    => $request->id_kabupaten_kota[$i],

                'id_kecamatan'
                    => $request->id_kecamatan[$i],

                'id_desa'
                    => $request->id_desa[$i],

                'total_luas_laporan_periode_lalu'
                    => $request->total_luas_laporan_periode_lalu[$i] ?? 0,

                'var1' => $request->var1[$i] ?? 0,
                'var2' => $request->var2[$i] ?? 0,
                'var3' => $request->var3[$i] ?? 0,
                'var4' => $request->var4[$i] ?? 0,
                'var5' => $request->var5[$i] ?? 0,
                'var6' => $request->var6[$i] ?? 0,
                'var7' => $request->var7[$i] ?? 0,
                'var8' => $request->var8[$i] ?? 0,
                'var9' => $request->var9[$i] ?? 0,
                'var10' => $request->var10[$i] ?? 0,

                'status_verifikasi' => 'menunggu',
                'keterangan_verifikasi' => null,
                'verified_by' => null,
                'verified_at' => null,
            ]);
        }

        DB::commit();

        return redirect()
            ->route('kumulatif-luas-tambah-tanam-padi.index')
            ->with('success', 'Data berhasil disimpan.');

    } catch (\Exception $e) {

        DB::rollBack();

        dd($e->getMessage());
    }
}
    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $header = DB::table('kumulatif_luas_tambah_tanam_padi as h')

        ->leftJoin(
            'kabupaten_kota as kab',
            'h.id_kabupaten_kota',
            '=',
            'kab.id_kabupaten_kota'
        )

        ->leftJoin(
            'kecamatan as kec',
            'h.id_kecamatan',
            '=',
            'kec.id_kecamatan'
        )

        ->leftJoin(
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
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'p.periode_pengamatan',
            'p.tgl_mulai',
            'mt.musim_tanam'
        )

        ->where(
            'h.id_kumulatif_luas_tambah_tanam_padi',
            $id
        )

        ->first();

    $detail = DB::table('det_kumulatif_luas_tambah_tanam_padi as d')

        ->leftJoin(
            'desa',
            'd.id_desa',
            '=',
            'desa.id_desa'
        )

        ->select(
            'd.*',
            'desa.nama_desa'
        )

        ->where(
            'd.id_kumulatif_luas_tambah_tanam_padi',
            $id
        )

        ->orderBy('d.no')

        ->get();

    return view(
        'kumulatif_luas_tambah_tanam_padi.detail',
        compact(
            'header',
            'detail'
        )
    );
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $header = DB::table('kumulatif_luas_tambah_tanam_padi as h')

        ->leftJoin(
            'kabupaten_kota as kab',
            'h.id_kabupaten_kota',
            '=',
            'kab.id_kabupaten_kota'
        )

        ->leftJoin(
            'kecamatan as kec',
            'h.id_kecamatan',
            '=',
            'kec.id_kecamatan'
        )

        ->leftJoin(
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
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'p.periode_pengamatan',
            'p.tgl_mulai',
            'mt.musim_tanam'
        )

        ->where(
            'h.id_kumulatif_luas_tambah_tanam_padi',
            $id
        )

        ->first();


    $detail = DB::table('det_kumulatif_luas_tambah_tanam_padi as d')

        ->leftJoin(
            'desa',
            'd.id_desa',
            '=',
            'desa.id_desa'
        )

        ->select(
            'd.*',
            'desa.nama_desa'
        )

        ->where(
            'd.id_kumulatif_luas_tambah_tanam_padi',
            $id
        )

        ->orderBy('d.no')

        ->get();


    $desa = Desa::where(
        'id_kecamatan',
        $header->id_kecamatan
    )
    ->orderBy('nama_desa')
    ->get();

    return view(
        'kumulatif_luas_tambah_tanam_padi.edit',
        compact(
            'header',
            'detail',
            'desa'
        )
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{

    DB::beginTransaction();

    try {

        $header = KumulatifLuasTambahTanamPadi::findOrFail($id);

        $header->update([

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_periode' =>
                $request->id_periode[0],

            // gunakan musim tanam dari form
            'id_musim_tanam' =>
                $request->id_musim_tanam[0]

        ]);

        DB::table('det_kumulatif_luas_tambah_tanam_padi')
            ->where(
                'id_kumulatif_luas_tambah_tanam_padi',
                $id
            )
            ->delete();

        for ($i = 0; $i < count($request->id_desa); $i++) {

            if (empty($request->id_desa[$i])) {
                continue;
            }

            DetKumulatifLuasTambahTanamPadi::create([

                'id_kumulatif_luas_tambah_tanam_padi' =>
                    $id,

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
                    $request->var10[$i],

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

        DB::commit();

        return redirect()
            ->route('kumulatif-luas-tambah-tanam-padi.index')
            ->with(
                'success',
                'Data berhasil diupdate.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        dd([
        'message' => $e->getMessage(),
        'line' => $e->getLine(),
        'file' => $e->getFile(),
    ]);

    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}