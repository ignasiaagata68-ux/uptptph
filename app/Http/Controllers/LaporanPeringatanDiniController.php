<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\LaporanPeringatanDini;
use App\Models\DetLaporanPeringatanDini;

class LaporanPeringatanDiniController extends Controller
{

    public function index()
    {

        $data =
        LaporanPeringatanDini::with([
            'kabupaten',
            'kecamatan',
            'periode',
            'musimTanam'
        ])
        ->orderBy(
            'id_laporan_peringatan_dini',
            'desc'
        )
        ->get();

        return view(
            'laporan_peringatan_dini.index',
            compact('data')
        );

    }

    public function create($id_data)
{
    $data = Data::findOrFail($id_data);

    // Kabupaten sesuai petugas
    $kabupaten = DB::table('kabupaten_kota')
        ->where(
            'id_kabupaten_kota',
            $data->petugas->kecamatan->id_kabupaten_kota
        )
        ->get();

    // Kecamatan sesuai petugas
    $kecamatan = DB::table('kecamatan')
        ->where(
            'id_kecamatan',
            $data->petugas->id_kecamatan
        )
        ->get();

    // Desa sesuai kecamatan petugas
    $desa = DB::table('desa')
        ->where(
            'id_kecamatan',
            $data->petugas->id_kecamatan
        )
        ->orderBy('nama_desa')
        ->get();

    // Master Komoditas
    $komoditas = DB::table('komoditas')
        ->orderBy('komoditas')
        ->get();

    // Master OPT
    $opt = DB::table('opt')
        ->orderBy('nama_opt')
        ->get();

    return view(
        'laporan_peringatan_dini.create',
        compact(
            'data',
            'kabupaten',
            'kecamatan',
            'desa',
            'komoditas',
            'opt'
        )
    );
}

    public function getOpt($idKomoditas)
    {
        $opt = DB::table('opt')
            ->where('id_komoditas', $idKomoditas)
            ->orderBy('nama_opt')
            ->get();

        return response()->json($opt);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        try{

            $master =
            LaporanPeringatanDini::create([

                'id_kabupaten_kota' =>
                $request->id_kabupaten_kota,

                'id_kecamatan' =>
                $request->id_kecamatan,

                'id_periode' =>
                $request->id_periode,

                'id_musim_tanam' =>
                $request->id_musim_tanam,

            ]);

            foreach($request->id_desa as $i => $v){

                DetLaporanPeringatanDini::create([

                    'id_laporan_peringatan_dini' =>
                    $master->id_laporan_peringatan_dini,

                    'id_kabupaten_kota' =>
                    $request->id_kabupaten_kota,

                    'id_kecamatan' =>
                    $request->id_kecamatan,

                    'id_tahun' =>
                    $request->id_tahun,

                    'id_bulan' =>
                    $request->id_bulan,

                    'id_periode' =>
                    $request->id_periode,

                    'id_desa' =>
                    $request->id_desa[$i],

                    'id_komoditas' =>
                    $request->id_komoditas[$i],

                    'poktan' =>
                    $request->poktan[$i],

                    'longitude' =>
                    $request->longitude[$i],

                    'latitude' =>
                    $request->latitude[$i],

                    'varietas' =>
                    $request->varietas[$i],

                    'umur' =>
                            $request->umur[$i],

                    'id_opt' =>
                            $request->id_opt[$i],

                    'luas_terserang' =>
                            $request->luas_terserang[$i],

                    'intens' =>
                            $request->intens[$i],

                    'kepadatan_populasi' =>
                            $request->kepadatan_populasi[$i],

                    'luas_waspada' =>
                            $request->luas_waspada[$i],

                    'tgl_pengamatan' =>
                            $request->tanggal_pengamatan[$i],

                ]);

            }

            DB::commit();

            return redirect()
            ->route('laporan-peringatan-dini.index')
            ->with(
                'success',
                'Data berhasil disimpan'
            );

        }catch(\Exception $e){

            DB::rollBack();

            return back()
            ->withInput()
            ->with(
                'error',
                $e->getMessage()
            );

        }

    }
    public function detail($id)
{
    $header = DB::table('laporan_peringatan_dini as h')

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
            'mt.musim_tanam'
        )

        ->where(
            'h.id_laporan_peringatan_dini',
            $id
        )

        ->first();

    $detail = DB::table(
        'det_laporan_peringatan_dini as d'
    )

        ->leftJoin(
            'kabupaten_kota as kab',
            'd.id_kabupaten_kota',
            '=',
            'kab.id_kabupaten_kota'
        )

        ->leftJoin(
            'kecamatan as kec',
            'd.id_kecamatan',
            '=',
            'kec.id_kecamatan'
        )

        ->leftJoin(
            'desa',
            'd.id_desa',
            '=',
            'desa.id_desa'
        )

        ->leftJoin(
            'komoditas',
            'd.id_komoditas',
            '=',
            'komoditas.id_komoditas'
        )

        ->leftJoin(
            'opt',
            'd.id_opt',
            '=',
            'opt.id_opt'
        )

        ->leftJoin(
            'tahun',
            'd.id_tahun',
            '=',
            'tahun.id_tahun'
        )

        ->leftJoin(
            'bulan',
            'd.id_bulan',
            '=',
            'bulan.id_bulan'
        )

        ->leftJoin(
            'periode',
            'd.id_periode',
            '=',
            'periode.id_periode'
        )

        ->select(
            'd.*',
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'desa.nama_desa',
            'komoditas.komoditas',
            'opt.nama_opt',
            'tahun.tahun',
            'bulan.bulan',
            'periode.periode_pengamatan'
        )

        ->where(
            'd.id_laporan_peringatan_dini',
            $id
        )

        ->get();

    return view(
        'laporan_peringatan_dini.detail',
        compact(
            'header',
            'detail'
        )
    );
}

public function edit($id)
{
    $header = DB::table('laporan_peringatan_dini as h')

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
            'mt.musim_tanam'
        )

        ->where(
            'h.id_laporan_peringatan_dini',
            $id
        )

        ->first();

    $detail = DetLaporanPeringatanDini::where(
        'id_laporan_peringatan_dini',
        $id
    )->get();

    $kabupaten = DB::table('kabupaten_kota')
        ->orderBy('nama_kabupaten_kota')
        ->get();

    $kecamatan = DB::table('kecamatan')
        ->orderBy('nama_kecamatan')
        ->get();

    $desa = DB::table('desa')
        ->where(
            'id_kecamatan',
            $header->id_kecamatan
        )
        ->get();

    $komoditas = DB::table('komoditas')
        ->orderBy('komoditas')
        ->get();

    $opt = DB::table('opt')
        ->orderBy('nama_opt')
        ->get();

    return view(
        'laporan_peringatan_dini.edit',
        compact(
            'header',
            'detail',
            'kabupaten',
            'kecamatan',
            'desa',
            'komoditas',
            'opt'
        )
    );
}

public function update(Request $request, $id)
{
    DB::beginTransaction();

    try{

        // ==========================
        // Update Header
        // ==========================

        $master =
        LaporanPeringatanDini::findOrFail($id);

        $master->update([

            'id_kabupaten_kota' => $request->id_kabupaten_kota,
            'id_kecamatan'      => $request->id_kecamatan,
            'id_periode'        => $request->id_periode,
            'id_musim_tanam'    => $request->id_musim_tanam,

        ]);

        // ==========================
        // Hapus Detail Lama
        // ==========================

        DetLaporanPeringatanDini::where(
            'id_laporan_peringatan_dini',
            $id
        )->delete();

        // ==========================
        // Simpan Detail Baru
        // ==========================

        foreach($request->id_desa as $i => $v){

            DetLaporanPeringatanDini::create([

                'id_laporan_peringatan_dini' =>
                    $id,

                'id_kabupaten_kota' =>
                    $request->id_kabupaten_kota,

                'id_kecamatan' =>
                    $request->id_kecamatan,

                'id_tahun' =>
                    $request->id_tahun,

                'id_bulan' =>
                    $request->id_bulan,

                'id_periode' =>
                    $request->id_periode,

                'id_desa' =>
                    $request->id_desa[$i],

                'id_komoditas' =>
                    $request->id_komoditas[$i],

                'poktan' =>
                    $request->poktan[$i],

                'longitude' =>
                    $request->longitude[$i],

                'latitude' =>
                    $request->latitude[$i],

                'varietas' =>
                    $request->varietas[$i],

                'umur' =>
                    $request->umur[$i],

                'id_opt' =>
                    $request->id_opt[$i],

                'luas_terserang' =>
                    $request->luas_terserang[$i],

                'intens' =>
                    $request->intens[$i],

                'kepadatan_populasi' =>
                    $request->kepadatan_populasi[$i],

                'luas_waspada' =>
                    $request->luas_waspada[$i],

                'tgl_pengamatan' =>
                    $request->tanggal_pengamatan[$i],

            ]);

        }

        DB::commit();

        return redirect()
            ->route('laporan-peringatan-dini.index')
            ->with(
                'success',
                'Data berhasil diupdate.'
            );

    }catch(\Exception $e){

        DB::rollBack();

        dd(
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    );

    }
}
}