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

        $data =
        Data::findOrFail($id_data);

        $kabupaten =
        DB::table('kabupaten_kota')
        ->orderBy('nama_kabupaten_kota')
        ->get();

        $kecamatan =
        DB::table('kecamatan')
        ->orderBy('nama_kecamatan')
        ->get();

        $desa =
        DB::table('desa')
        ->where(
            'id_kecamatan',
            $data->petugas->id_kecamatan
        )
        ->get();

        $komoditas =
        DB::table('komoditas')
        ->orderBy('komoditas')
        ->get();

        $opt =
        DB::table('opt')
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

    public function store(Request $request)
    {

        DB::beginTransaction();

        try{

            $master =
            LaporanPeringatanDini::create([

                'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

                'id_kecamatan' =>
                $request->id_kecamatan[0],

                'id_periode' =>
                $request->id_periode[0],

                'id_musim_tanam' =>
                $request->id_musim_tanam[0],

            ]);

            foreach($request->id_desa as $i => $v){

                DetLaporanPeringatanDini::create([

                    'id_laporan_peringatan_dini' =>
                    $master->id_laporan_peringatan_dini,

                    'id_tahun' =>
                    $request->id_tahun[$i],

                    'id_bulan' =>
                    $request->id_bulan[$i],

                    'id_periode' =>
                    $request->id_periode[$i],

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
                    $request->tgl_pengamatan[$i],

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
}