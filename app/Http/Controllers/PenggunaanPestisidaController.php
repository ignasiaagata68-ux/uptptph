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
        ->orderByDesc('h.id_penggunaan_pestisida')
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
        ->orderBy('nama_desa')
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
    
    DB::beginTransaction();

    try {

        $header = PenggunaanPestisida::create([

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_periode' =>
                $request->id_periode[0],

            'id_musim_tanam' =>
                $request->id_musim_tanam[0]

        ]);



        for ($i = 0; $i < count($request->no); $i++) {

            DetPenggunaanPestisida::create([

                'id_penggunaan_pestisida' =>
                    $header->id_penggunaan_pestisida,

                'no' =>
                    $request->no[$i],

                'lokasi_wilkel_desa' =>
                    DB::table('desa')
                        ->where('id_desa', $request->id_desa[$i])
                        ->value('nama_desa'),

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
                    $request->ket[$i],

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
            ->route('penggunaan-pestisida.index')
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
  public function show($id)
{
    $header = DB::table('penggunaan_pestisida as h')

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
            'h.id_penggunaan_pestisida',
            $id
        )

        ->first();


    $detail = DB::table('det_penggunaan_pestisida')

        ->where(
            'id_penggunaan_pestisida',
            $id
        )

        ->orderBy('no')

        ->get();


    return view(
        'penggunaan_pestisida.detail',
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
    $header = DB::table('penggunaan_pestisida as h')

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
            'h.id_penggunaan_pestisida',
            $id
        )

        ->first();

    $detail = DetPenggunaanPestisida::where(
        'id_penggunaan_pestisida',
        $id
    )->get();

    $desa = DB::table('desa')
        ->where(
            'id_kecamatan',
            $header->id_kecamatan
        )
        ->get();

    return view(
        'penggunaan_pestisida.edit',
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

        $header = PenggunaanPestisida::findOrFail($id);

        $header->update([

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_periode' =>
                $request->id_periode[0],

            'id_musim_tanam' =>
                $request->id_musim_tanam[0]

        ]);

        DB::table('det_penggunaan_pestisida')
            ->where(
                'id_penggunaan_pestisida',
                $id
            )
            ->delete();

        for ($i = 0; $i < count($request->no); $i++) {

            if (empty($request->id_desa[$i])) {
                continue;
            }

            DetPenggunaanPestisida::create([

                'id_penggunaan_pestisida' =>
                    $id,

                'no' =>
                    $request->no[$i],

                'lokasi_wilkel_desa' =>
                    DB::table('desa')
                        ->where('id_desa', $request->id_desa[$i])
                        ->value('nama_desa'),

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
                    $request->ket[$i],

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
            ->route('penggunaan-pestisida.index')
            ->with(
                'success',
                'Data berhasil diupdate.'
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}