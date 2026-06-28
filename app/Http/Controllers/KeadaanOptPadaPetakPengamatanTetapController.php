<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\KeadaanOptPadaPetakPengamatanTetap;
use App\Models\DetKeadaanOptPadaPetakPengamatanTetap;

use App\Models\Desa;
use App\Models\Komoditas;
use App\Models\Opt;
use App\Models\Ma;
use App\Models\Data;
use App\Models\Petugas;

class KeadaanOptPadaPetakPengamatanTetapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $data = DB::table(
                'keadaan_opt_pada_petak_pengamatan_tetap as k'
            )

            ->leftJoin(
                'kabupaten_kota as kab',
                'k.id_kabupaten_kota',
                '=',
                'kab.id_kabupaten_kota'
            )

            ->leftJoin(
                'kecamatan as kec',
                'k.id_kecamatan',
                '=',
                'kec.id_kecamatan'
            )

            ->leftJoin(
                'periode as p',
                'k.id_periode',
                '=',
                'p.id_periode'
            )

            ->leftJoin(
                'det_keadaan_opt_pada_petak_pengamatan_tetap as d',
                'k.id_keadaan_opt_pada_petak_pengamatan_tetap',
                '=',
                'd.id_keadaan_opt_pada_petak_pengamatan_tetap'
            )

            ->select(
                'k.*',
                'kab.nama_kabupaten_kota',
                'kec.nama_kecamatan',
                'p.periode_pengamatan',

                'd.status_verifikasi',
                'd.keterangan_verifikasi'
            )

            ->groupBy(
                'k.id_keadaan_opt_pada_petak_pengamatan_tetap',
                'kab.nama_kabupaten_kota',
                'kec.nama_kecamatan',
                'p.periode_pengamatan',
                'd.status_verifikasi',
                'd.keterangan_verifikasi'
            )

            ->latest(
                'k.id_keadaan_opt_pada_petak_pengamatan_tetap'
            )

            ->get();

            return view(
                'keadaan_opt_pada_petak_pengamatan_tetap.index',
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

            $desa = Desa::where(
                'id_kecamatan',
                $data->petugas->id_kecamatan
            )->get();

            $komoditas = Komoditas::all();

            $opt = Opt::all();

            $ma = Ma::all();

            return view(
                'keadaan_opt_pada_petak_pengamatan_tetap.create',
                compact(
                    'data',
                    'desa',
                    'komoditas',
                    'opt',
                    'ma'
                )
            );
        }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
        $header =
        KeadaanOptPadaPetakPengamatanTetap::create([

            'id_periode' =>
                $request->id_periode[0],

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_musim_tanam' =>
                1,
            'id_petugas' =>
                $data->petugas->id_petugas
        ]);

        for($i = 0; $i < count($request->id_desa); $i++)
        {
            DetKeadaanOptPadaPetakPengamatanTetap::create([

                'id_keadaan_opt_pada_petak_pengamatan_tetap' =>
                    $header->id_keadaan_opt_pada_petak_pengamatan_tetap,

                'id_tahun' =>
                    $request->id_tahun[0],

                'id_bulan' =>
                    $request->id_bulan[0],

                'id_periode' =>
                    $request->id_periode[0],

                'id_kabupaten_kota' =>
                    $request->id_kabupaten_kota[0],

                'id_kecamatan' =>
                    $request->id_kecamatan[0],

                'id_desa' =>
                    $request->id_desa[$i],

                'id_komoditas' =>
                    $request->id_komoditas[$i],

                'varietas' =>
                    $request->varietas[$i],

                'umur' =>
                    $request->umur[$i],

                'id_opt' =>
                    $request->id_opt[$i],

                'intensitas' =>
                    $request->intensitas[$i],

                'populasi_rumpunan' =>
                    $request->populasi_rumpunan[$i],

                'populasi_musuh_alami' =>
                    $request->populasi_musuh_alami[$i],

                'id_ma' =>
                    $request->id_ma[$i],

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

        return redirect()
            ->route('keadaan-opt-pada-petak-pengamatan-tetap.index')
            ->with(
                'success',
                'Data berhasil disimpan'
            );


        }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view(
            'keadaan_opt_pada_petak_pengamatan_tetap.detail',
            compact(
                'header',
                'detail',
                'petugas'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         $header =
            KeadaanOptPadaPetakPengamatanTetap::findOrFail($id);

            $detail =
            DetKeadaanOptPadaPetakPengamatanTetap::where(
                'id_keadaan_opt_pada_petak_pengamatan_tetap',
                $id
            )->first();

            $desa = Desa::all();
            $komoditas = Komoditas::all();
            $opt = Opt::all();
            $ma = Ma::all();

            return view(
                'keadaan_opt_pada_petak_pengamatan_tetap.edit',
                compact(
                    'header',
                    'detail',
                    'desa',
                    'komoditas',
                    'opt',
                    'ma'
                )
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function verifikasi($id)
    {
        $header =
        KeadaanOptPadaPetakPengamatanTetap::findOrFail($id);

        $detail =
        DetKeadaanOptPadaPetakPengamatanTetap::where(
            'id_keadaan_opt_pada_petak_pengamatan_tetap',
            $id
        )->get();

        return view(
            'keadaan_opt_pada_petak_pengamatan_tetap.verifikasi',
            compact(
                'header',
                'detail'
            )
        );
    }
    public function simpanVerifikasi(Request $request, $id)
    {
        DetKeadaanOptPadaPetakPengamatanTetap::where(
            'id_keadaan_opt_pada_petak_pengamatan_tetap',
            $id
        )->update([

            'status_verifikasi' =>
                $request->status_verifikasi,

            'keterangan_verifikasi' =>
                $request->keterangan_verifikasi,

            'verified_by' =>
                1,

            'verified_at' =>
                now()

        ]);

        return redirect()
            ->route(
                'keadaan-opt-pada-petak-pengamatan-tetap.index'
            )
            ->with(
                'success',
                'Data berhasil diverifikasi'
            );
    }
    public function update(Request $request, string $id)
    {
        //
         $detail =
            DetKeadaanOptPadaPetakPengamatanTetap::where(
                'id_keadaan_opt_pada_petak_pengamatan_tetap',
                $id
            )->first();

           $detail->update([

                'id_desa' =>
                    $request->id_desa,

                'id_komoditas' =>
                    $request->id_komoditas,

                'varietas' =>
                    $request->varietas,

                'umur' =>
                    $request->umur,

                'id_opt' =>
                    $request->id_opt,

                'intensitas' =>
                    $request->intensitas,

                'populasi_rumpunan' =>
                    $request->populasi_rumpunan,

                'populasi_musuh_alami' =>
                    $request->populasi_musuh_alami,

                'id_ma' =>
                    $request->id_ma
            ]);

            return redirect()
                ->route('keadaan-opt-pada-petak-pengamatan-tetap.index')
                ->with(
                    'success',
                    'Data berhasil diupdate'
                );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function detail($id)
    {
        $header =
        KeadaanOptPadaPetakPengamatanTetap::findOrFail($id);

        $detail =
        DetKeadaanOptPadaPetakPengamatanTetap::with([
            'desa',
            'komoditas',
            'opt',
            'ma'
        ])
        ->where(
            'id_keadaan_opt_pada_petak_pengamatan_tetap',
            $id
        )
        ->get();

        return view(
            'keadaan_opt_pada_petak_pengamatan_tetap.detail',
            compact(
                'header',
                'detail'
            )
        );
    }
}
