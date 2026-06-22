<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;

use App\Models\LaporanKerusakanTanamanAkibatBanjir;
use App\Models\DetLaporanKerusakanTanamanAkibatBanjir;

class LaporanKerusakanTanamanAkibatBanjirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table(
                'laporan_kerusakan_tanaman_akibat_banjir as l'
            )

            ->leftJoin(
                'kabupaten_kota as kab',
                'l.id_kabupaten_kota',
                '=',
                'kab.id_kabupaten_kota'
            )

            ->leftJoin(
                'kecamatan as kec',
                'l.id_kecamatan',
                '=',
                'kec.id_kecamatan'
            )

            ->leftJoin(
                'periode as p',
                'l.id_periode',
                '=',
                'p.id_periode'
            )

            ->select(
                'l.*',
                'kab.nama_kabupaten_kota',
                'kec.nama_kecamatan',
                'p.periode_pengamatan'
            )

            ->latest(
                'l.id_laporan_kerusakan_tanaman_akibat_banjir'
            )

            ->get();

        return view(
            'laporan_kerusakan_tanaman_akibat_banjir.index',
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

        $desa = Desa::all();

        $komoditas = Komoditas::all();
        
        return view(
            'laporan_kerusakan_tanaman_akibat_banjir.create',
            compact(
                'data',
                'desa',
                'komoditas'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $header =
        LaporanKerusakanTanamanAkibatKekeringan::create([

            'id_periode' =>
                $request->id_periode[0],

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_musim_tanam' =>
                1
        ]);

        for($i = 0; $i < count($request->id_desa); $i++)
        {

            DetLaporanKerusakanTanamanAkibatKekeringan::create([

                'id_laporan_kerusakan_tanaman_akibat_kekeringan' =>
                    $header->id_laporan_kerusakan_tanaman_akibat_kekeringan,

                'id_tahun' =>
                    $request->id_tahun[0],

                'id_bulan' =>
                    $request->id_bulan[0],

                'id_periode' =>
                    $request->id_periode[0],

                'id_kabupaten_kota' =>
                    $request->id_kabupaten_kota[$i],

                'id_kecamatan' =>
                    $request->id_kecamatan[$i],

                'id_desa' =>
                    $request->id_desa[$i],

                'id_komoditas' =>
                    $request->id_komoditas[$i],

                'var' =>
                    $request->var[$i],

                'umr' =>
                    $request->umr[$i],

                'lst' =>
                    $request->lst[$i],

                'was' =>
                    $request->was[$i],

                'sp_r' =>
                    $request->sp_r[$i],

                'sp_s' =>
                    $request->sp_s[$i],

                'sp_b' =>
                    $request->sp_b[$i],

                'sp_ps' =>
                    $request->sp_ps[$i],

                'sp_pl' =>
                    $request->sp_pl[$i],

                'sp_j' =>
                    $request->sp_j[$i],

                'lt_r' =>
                    $request->lt_r[$i],

                'lt_s' =>
                    $request->lt_s[$i],

                'lt_b' =>
                    $request->lt_b[$i],

                'lt_p' =>
                    $request->lt_p[$i],

                'lt_j' =>
                    $request->lt_j[$i],

                'lk_r' =>
                    $request->lk_r[$i],

                'lk_s' =>
                    $request->lk_s[$i],

                'lk_b' =>
                    $request->lk_b[$i],

                'lk_p' =>
                    $request->lk_p[$i],

                'lk_j' =>
                    $request->lk_j[$i],

                'upy' =>
                    $request->upy[$i],

                'l_upy' =>
                    $request->l_upy[$i],

                'lat' =>
                    $request->lat[$i],

                'long' =>
                    $request->long[$i],

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
            ->route(
                'laporan-kerusakan-tanaman-akibat-kekeringan.index'
            )
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function detail($id)
    {
        $header =
        LaporanKerusakanTanamanAkibatBanjir::findOrFail($id);

        $detail =
        DetLaporanKerusakanTanamanAkibatBanjir::with([
            'desa',
            'komoditas'
        ])
        ->where(
            'id_laporan_kerusakan_tanaman_akibat_banjir',
            $id
        )
        ->get();

        return view(
            'laporan_kerusakan_tanaman_akibat_banjir.detail',
            compact(
                'header',
                'detail'
            )
        );
    }
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
