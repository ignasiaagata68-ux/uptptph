<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;
use App\Models\Opt;
use App\Models\MusimTanam;
use App\Models\Periode;
use App\Models\KeadaanSeranganOptDanPengendalianDiWilayahPengamatan;
use App\Models\DetKeadaanSeranganOptDanPengendalianDiWilayahPengamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController extends Controller
{
    public function create($id_data)
    {
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

        return view(
            'keadaan_serangan_opt.create',
            compact(
                'data',
                'desa',
                'komoditas',
                'opt'
            )
        );
    }

    public function index()
    {
    $data = DB::table(
    'keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as k'
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
        'det_keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as d',
        'k.id_keadaan_serangan_opt_dan_pengendalian_di_wilayah',
        '=',
        'd.id_keadaan_serangan_opt_dan_pengendalian_di_wilayah'
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
        'k.id_keadaan_serangan_opt_dan_pengendalian_di_wilayah',
        'kab.nama_kabupaten_kota',
        'kec.nama_kecamatan',
        'p.periode_pengamatan',
        'd.status_verifikasi',
        'd.keterangan_verifikasi'
    )

    ->latest(
        'k.id_keadaan_serangan_opt_dan_pengendalian_di_wilayah'
    )

    ->get();

    return view(
        'keadaan_serangan_opt.index',
        compact('data')
    );


    }


    public function show($id)
    {
        $header = DB::table(
            'keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as k'
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
            'musim_tanam as mt',
            'k.id_musim_tanam',
            '=',
            'mt.id_musim_tanam'
        )

        ->where(
            'k.id_keadaan_serangan_opt_dan_pengendalian_di_wilayah',
            $id
        )

        ->select(
            'k.*',
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'p.periode_pengamatan',
            'mt.musim_tanam'
        )

        ->first();


        $detail = DB::table(
            'det_keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as d'
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

        ->where(
            'd.id_keadaan_serangan_opt_dan_pengendalian_di_wilayah',
            $id
        )

        ->select(
            'd.*',
            'desa.nama_desa',
            'komoditas.komoditas',
            'opt.nama_opt'
        )

        ->get();


        return view(
            'keadaan_serangan_opt.show',
            compact(
                'header',
                'detail'
            )
        );
    }

    public function edit($id)
        {
            
            $header = DB::table(
            'keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as k'
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
                'musim_tanam as mt',
                'k.id_musim_tanam',
                '=',
                'mt.id_musim_tanam'
            )

            ->where(
                'k.id_keadaan_serangan_opt_dan_pengendalian_di_wilayah',
                $id
            )

            ->select(
                'k.*',
                'kab.nama_kabupaten_kota',
                'kec.nama_kecamatan',
                'p.periode_pengamatan',
                'mt.musim_tanam'
            )

            ->first();
            
            $detail = DB::table(
                'det_keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan'
            )
            ->where(
                'id_keadaan_serangan_opt_dan_pengendalian_di_wilayah',
                $id
            )
            ->get();

            //dd($detail->first());

            $desa = Desa::all();
            $komoditas = Komoditas::all();
            $opt = Opt::all();

            return view(
                'keadaan_serangan_opt.edit',
                compact(
                    'header',
                    'detail',
                    'desa',
                    'komoditas',
                    'opt'
                )
            );


        }

    public function update(Request $request, $id)
    {
        $header =
        KeadaanSeranganOptDanPengendalianDiWilayahPengamatan::findOrFail($id);

        $header->update([

            'id_periode' =>
                $request->id_periode,

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota,

            'id_kecamatan' =>
                $request->id_kecamatan,

            'id_musim_tanam' =>
                $request->id_musim_tanam

        ]);

        DB::table(
            'det_keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan'
        )
        ->where(
            'id_keadaan_serangan_opt_dan_pengendalian_di_wilayah',
            $id
        )
        ->delete();

        for ($i = 0; $i < count($request->id_desa); $i++) {

            DetKeadaanSeranganOptDanPengendalianDiWilayahPengamatan::create([

                'id_keadaan_serangan_opt_dan_pengendalian_di_wilayah' =>
                    $id,

                'id_tahun' =>
                    $request->id_tahun[$i],

                'id_bulan' =>
                    $request->id_bulan[$i],

                'id_periode' =>
                    $request->id_periode,

                'id_kabupaten_kota' =>
                    $request->id_kabupaten_kota,

                'id_kecamatan' =>
                    $request->id_kecamatan,

                'id_desa' =>
                    $request->id_desa[$i],

                'id_komoditas' =>
                    $request->id_komoditas[$i],

                'varietas' =>
                    $request->varietas[$i],

                'luas' =>
                    $request->luas[$i],

                'id_opt' =>
                    $request->id_opt[$i],

                'sisa_periode_sebelumnya_serangan_ringan' =>
                    $request->s_r[$i],

                'sisa_periode_sebelumnya_sisa_serangan_sedang' =>
                    $request->s_s[$i],

                'sisa_sisa_periode_sebelumnya_serangan_berat' =>
                    $request->s_b[$i],

                'sisa_sisa_periode_sebelumnya_serangan_puso' =>
                    $request->s_p[$i],

                'sisa_serangan_jumlah' =>
                    $request->s_j[$i],

                'luas_terkendali' =>
                    $request->luas_terkendali[$i],

                'luas_panen' =>
                    $request->luas_panen[$i],

                'luas_tambah_serangan_ringan' =>
                    $request->t_r[$i],

                'luas_tambah_serangan_sedang' =>
                    $request->t_s[$i],

                'luas_tambah_serangan_berat' =>
                    $request->t_b[$i],

                'luas_tambah_serangan_puso' =>
                    $request->t_p[$i],

                'luas_tambah_serangan_jumlah' =>
                    $request->t_j[$i],

                'pestisida_kimia' =>
                    $request->kimia[$i],

                'pestisida_hayati' =>
                    $request->hayati[$i],

                'cara_lain' =>
                    $request->cara_lain[$i],

                'jml' =>
                    $request->jml[$i],

                'luas_keadaan_serangan_ringan' =>
                    $request->k_r[$i],

                'luas_keadaan_serangan_sedang' =>
                    $request->k_s[$i],

                'luas_keadaan_serangan_berat' =>
                    $request->k_b[$i],

                'luas_keadaan_serangan_puso' =>
                    $request->k_p[$i],

                'luas_keadaan_serangan_jumlah' =>
                    $request->k_j[$i],

                'mt' =>
                    $request->mt[$i]

            ]);
        }

        return redirect()
            ->route('keadaan-serangan-opt.index')
            ->with(
                'success',
                'Data berhasil diupdate'
            );
    }
    public function store(Request $request)
{
    $header =
        KeadaanSeranganOptDanPengendalianDiWilayahPengamatan::create([

            'id_periode' =>
                $request->id_periode[0],

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_musim_tanam' =>
                $request->id_musim_tanam

        ]);

    for ($i = 0; $i < count($request->id_desa); $i++) {

        if(
            empty($request->id_desa[$i]) &&
            empty($request->id_komoditas[$i]) &&
            empty($request->id_opt[$i])
        ){
            continue;
        }

        DetKeadaanSeranganOptDanPengendalianDiWilayahPengamatan::create([

            'id_keadaan_serangan_opt_dan_pengendalian_di_wilayah' =>
                $header->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah,

            'id_tahun' =>
                $request->id_tahun[$i],

            'id_bulan' =>
                $request->id_bulan[$i],

            'id_periode' =>
                $request->id_periode[$i],

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[$i],

            'id_kecamatan' =>
                $request->id_kecamatan[$i],

            'id_desa' =>
                $request->id_desa[$i],

            'id_komoditas' =>
                $request->id_komoditas[$i],

            'varietas' =>
                $request->varietas[$i],

            'luas' =>
                $request->luas[$i],

            'id_opt' =>
                $request->id_opt[$i],

            'sisa_periode_sebelumnya_serangan_ringan' =>
                $request->s_r[$i],

            'sisa_periode_sebelumnya_sisa_serangan_sedang' =>
                $request->s_s[$i],

            'sisa_sisa_periode_sebelumnya_serangan_berat' =>
                $request->s_b[$i],

            'sisa_sisa_periode_sebelumnya_serangan_puso' =>
                $request->s_p[$i],

            'sisa_serangan_jumlah' =>
                $request->s_j[$i],

            'luas_terkendali' =>
                $request->luas_terkendali[$i],

            'luas_panen' =>
                $request->luas_panen[$i],

            'luas_tambah_serangan_ringan' =>
                $request->t_r[$i],

            'luas_tambah_serangan_sedang' =>
                $request->t_s[$i],

            'luas_tambah_serangan_berat' =>
                $request->t_b[$i],

            'luas_tambah_serangan_puso' =>
                $request->t_p[$i],

            'luas_tambah_serangan_jumlah' =>
                $request->t_j[$i],

            'pestisida_kimia' =>
                $request->kimia[$i],

            'pestisida_hayati' =>
                $request->hayati[$i],

            'cara_lain' =>
                $request->cara_lain[$i],

            'jml' =>
                $request->jml[$i],

            'luas_keadaan_serangan_ringan' =>
                $request->k_r[$i],

            'luas_keadaan_serangan_sedang' =>
                $request->k_s[$i],

            'luas_keadaan_serangan_berat' =>
                $request->k_b[$i],

            'luas_keadaan_serangan_puso' =>
                $request->k_p[$i],

            'luas_keadaan_serangan_jumlah' =>
                $request->k_j[$i],

            'mt' =>
                $request->mt[$i],

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
        ->route('keadaan-serangan-opt.index')
        ->with(
            'success',
            'Data berhasil disimpan'
        );
}
public function verifikasi($id, $status)
    {
        DB::table(
            'det_keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan'
        )
        ->where(
            'id_det_keadaan_serangan_opt_dan_pengendalian_di_wilayah',
            $id
        )
        ->update([

            'status_verifikasi' => $status,

            'verified_by' =>
                session('id_user'),

            'verified_at' =>
                now()

        ]);

        return back()->with(
            'success',
            'Data berhasil diverifikasi'
        );
    }
}