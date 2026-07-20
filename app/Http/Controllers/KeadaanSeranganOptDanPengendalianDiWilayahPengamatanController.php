<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;
use App\Models\Opt;
use App\Models\MusimTanam;
use App\Models\Periode;
use App\Models\Petugas;
use App\Http\Controllers\SpController;
use App\Models\KeadaanSeranganOptDanPengendalianDiWilayahPengamatan;
use App\Models\DetKeadaanSeranganOptDanPengendalianDiWilayahPengamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PengirimanLaporan;

class KeadaanSeranganOptDanPengendalianDiWilayahPengamatanController extends Controller
{
   public function index()
{
    $petugas = Petugas::where(
        'id_user',
        session('id_user')
    )->first();

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
        'musim_tanam as mt',
        'k.id_musim_tanam',
        '=',
        'mt.id_musim_tanam'
    )

    ->where(
        'h.id_kecamatan',
        $petugas->id_kecamatan
    )

    ->select(
        'k.*',
        'kab.nama_kabupaten_kota',
        'kec.nama_kecamatan',
        'p.periode_pengamatan',
        'mt.musim_tanam'
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

    public function create($id_data)
    {
        $header = KeadaanSeranganOptDanPengendalianDiWilayahPengamatan::where(
            'id_data',
            $id_data
        )->first();

        if ($header) {

            return redirect()->route(
                'keadaan-serangan-opt.show',
                $header->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah
            );

        }
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

    public function show($id)
    {
        $header = DB::table(
            'keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as k'
        )

        ->leftJoin(
            'data as d',
            'k.id_data',
            '=',
            'd.id_data'
        )

        ->leftJoin(
            'petugas as pt',
            'd.id_petugas',
            '=',
            'pt.id_petugas'
        )

        ->leftJoin(
            'kecamatan as kec',
            'pt.id_kecamatan',
            '=',
            'kec.id_kecamatan'
        )

        ->leftJoin(
            'kabupaten_kota as kab',
            'kec.id_kabupaten_kota',
            '=',
            'kab.id_kabupaten_kota'
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

        $statusPengiriman = PengirimanLaporan::where(
            'id_data',
            $header->id_data
        )->first();

        return view(
            'keadaan_serangan_opt.show',
            compact(
                'header',
                'detail',
                'statusPengiriman'
            )
        );
    }

 public function edit($id)
{
    // Cek dulu apakah yang dikirim adalah id_detail
    $detailPerbaikan = DetKeadaanSeranganOptDanPengendalianDiWilayahPengamatan::find($id);

    if ($detailPerbaikan) {

        // Ambil id header dari detail
        $idHeader = $detailPerbaikan->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah;

        $header = DB::table(
            'keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as k'
        )
        ->leftJoin(
            'data as d',
            'k.id_data',
            '=',
            'd.id_data'
        )
        ->leftJoin(
            'petugas as pt',
            'd.id_petugas',
            '=',
            'pt.id_petugas'
        )
        ->leftJoin(
            'kecamatan as kec',
            'pt.id_kecamatan',
            '=',
            'kec.id_kecamatan'
        )
        ->leftJoin(
            'kabupaten_kota as kab',
            'kec.id_kabupaten_kota',
            '=',
            'kab.id_kabupaten_kota'
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
            $idHeader
        )
        ->select(
            'k.*',
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'p.periode_pengamatan',
            'mt.musim_tanam'
        )
        ->first();

        $detail = collect([$detailPerbaikan]);

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

    // ===== Edit normal =====

    $header = DB::table(
        'keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as k'
    )
    ->leftJoin(
        'data as d',
        'k.id_data',
        '=',
        'd.id_data'
    )
    ->leftJoin(
        'petugas as pt',
        'd.id_petugas',
        '=',
        'pt.id_petugas'
    )
    ->leftJoin(
        'kecamatan as kec',
        'pt.id_kecamatan',
        '=',
        'kec.id_kecamatan'
    )
    ->leftJoin(
        'kabupaten_kota as kab',
        'kec.id_kabupaten_kota',
        '=',
        'kab.id_kabupaten_kota'
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

    $desa = Desa::where(
        'id_kecamatan',
        $header->id_kecamatan
    )->get();

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

        $total = count($request->id_desa);

for ($i = 0; $i < $total; $i++) {

    $data = [

        'id_keadaan_serangan_opt_dan_pengendalian_di_wilayah' => $header->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah,

        'id_tahun' => $request->id_tahun[$i],
        'id_bulan' => $request->id_bulan[$i],
        'id_periode' => $request->id_periode,

        'id_kabupaten_kota' => $request->id_kabupaten_kota,
        'id_kecamatan' => $request->id_kecamatan,

        'id_desa' => $request->id_desa[$i],
        'id_komoditas' => $request->id_komoditas[$i],
        'varietas' => $request->varietas[$i],
        'luas' => $request->luas[$i],
        'id_opt' => $request->id_opt[$i],

        // ===== COPY semua field lain dari update() lama =====

        'sisa_periode_sebelumnya_serangan_ringan' => $request->s_r[$i],
        'sisa_periode_sebelumnya_sisa_serangan_sedang' => $request->s_s[$i],
        'sisa_sisa_periode_sebelumnya_serangan_berat' => $request->s_b[$i],
        'sisa_sisa_periode_sebelumnya_serangan_puso' => $request->s_p[$i],
        'sisa_serangan_jumlah' => $request->s_j[$i],

        'luas_terkendali' => $request->luas_terkendali[$i],
        'luas_panen' => $request->luas_panen[$i],

        'luas_tambah_serangan_ringan' => $request->t_r[$i],
        'luas_tambah_serangan_sedang' => $request->t_s[$i],
        'luas_tambah_serangan_berat' => $request->t_b[$i],
        'luas_tambah_serangan_puso' => $request->t_p[$i],
        'luas_tambah_serangan_jumlah' => $request->t_j[$i],

        'pestisida_kimia' => $request->kimia[$i],
        'pestisida_hayati' => $request->hayati[$i],
        'cara_lain' => $request->cara_lain[$i],
        'jml' => $request->jml[$i],

        'luas_keadaan_serangan_ringan' => $request->k_r[$i],
        'luas_keadaan_serangan_sedang' => $request->k_s[$i],
        'luas_keadaan_serangan_berat' => $request->k_b[$i],
        'luas_keadaan_serangan_puso' => $request->k_p[$i],
        'luas_keadaan_serangan_jumlah' => $request->k_j[$i],

        'mt' => $request->mt[$i],

        'status_verifikasi' => 'menunggu',
        'keterangan_verifikasi' => null,
        'verified_by' => null,
        'verified_at' => null,
    ];
     
    if (!empty($request->id_detail[$i])) {

        $detail = DetKeadaanSeranganOptDanPengendalianDiWilayahPengamatan::findOrFail(
        $request->id_detail[$i]
    );

    // dd($detail->toArray(), $data);

    $detail->update($data);

    } else {

        DetKeadaanSeranganOptDanPengendalianDiWilayahPengamatan::create($data);

    }
}

    $spController = new SpController();
    $spController->cekStatusPengiriman($header->id_data);
    return redirect()
        ->route('keadaan-serangan-opt.show', $id)
        ->with('success', 'Data berhasil diupdate');
    }


    public function store(Request $request)
{
    $header = KeadaanSeranganOptDanPengendalianDiWilayahPengamatan::firstOrCreate(

        [
            'id_data' => $request->id_data
        ],

        [
            'id_periode'         => $request->id_periode,
            'id_kabupaten_kota'  => $request->id_kabupaten_kota,
            'id_kecamatan'       => $request->id_kecamatan,
            'id_musim_tanam'     => $request->id_musim_tanam,
        ]
    );

    // Simpan Detail
    for ($i = 0; $i < count($request->id_desa); $i++) {

        // Lewati baris kosong
        if (
            empty($request->id_desa[$i]) &&
            empty($request->id_komoditas[$i]) &&
            empty($request->id_opt[$i])
        ) {
            continue;
        }

        DetKeadaanSeranganOptDanPengendalianDiWilayahPengamatan::create([

            'id_keadaan_serangan_opt_dan_pengendalian_di_wilayah'
                => $header->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah,

            'id_tahun'
                => $request->id_tahun[$i],

            'id_bulan'
                => $request->id_bulan[$i],

            'id_periode'
                => $request->id_periode,

            'id_kabupaten_kota'
                => $request->id_kabupaten_kota,

            'id_kecamatan'
                => $request->id_kecamatan,

            'id_desa'
                => $request->id_desa[$i],

            'id_komoditas'
                => $request->id_komoditas[$i],

            'varietas'
                => $request->varietas[$i],

            'luas'
                => $request->luas[$i],

            'id_opt'
                => $request->id_opt[$i],

            'sisa_periode_sebelumnya_serangan_ringan'
                => $request->s_r[$i],

            'sisa_periode_sebelumnya_sisa_serangan_sedang'
                => $request->s_s[$i],

            'sisa_sisa_periode_sebelumnya_serangan_berat'
                => $request->s_b[$i],

            'sisa_sisa_periode_sebelumnya_serangan_puso'
                => $request->s_p[$i],

            'sisa_serangan_jumlah'
                => $request->s_j[$i],

            'luas_terkendali'
                => $request->luas_terkendali[$i],

            'luas_panen'
                => $request->luas_panen[$i],

            'luas_tambah_serangan_ringan'
                => $request->t_r[$i],

            'luas_tambah_serangan_sedang'
                => $request->t_s[$i],

            'luas_tambah_serangan_berat'
                => $request->t_b[$i],

            'luas_tambah_serangan_puso'
                => $request->t_p[$i],

            'luas_tambah_serangan_jumlah'
                => $request->t_j[$i],

            'pestisida_kimia'
                => $request->kimia[$i],

            'pestisida_hayati'
                => $request->hayati[$i],

            'cara_lain'
                => $request->cara_lain[$i],

            'jml'
                => $request->jml[$i],

            'luas_keadaan_serangan_ringan'
                => $request->k_r[$i],

            'luas_keadaan_serangan_sedang'
                => $request->k_s[$i],

            'luas_keadaan_serangan_berat'
                => $request->k_b[$i],

            'luas_keadaan_serangan_puso'
                => $request->k_p[$i],

            'luas_keadaan_serangan_jumlah'
                => $request->k_j[$i],

            'mt'
                => $request->mt[$i],

            'status_verifikasi'
                => 'menunggu',

            'keterangan_verifikasi'
                => null,

            'verified_by'
                => null,

            'verified_at'
                => null,
        ]);
    }

    return redirect()->route(
        'sp.create',
        $request->id_data
    )->with(
        'success',
        'Data berhasil disimpan'
    );
}
    public function prosesVerifikasi(Request $request, $id)
    {
        // dd($request->id_detail);
        foreach ($request->id_detail as $idDetail) {

            DetKeadaanSeranganOptDanPengendalianDiWilayahPengamatan::where(
                'id_det_keadaan_serangan_opt_dan_pengendalian_di_wilayah',
                $idDetail
            )->update([

                'status_verifikasi' => $request->status_verifikasi[$idDetail],

                'keterangan_verifikasi' =>
                    $request->keterangan_verifikasi[$idDetail] ?? null,

                'verified_by' => session('id_user'),

                'verified_at' => now()

            ]);
        }

        $header = KeadaanSeranganOptDanPengendalianDiWilayahPengamatan::findOrFail($id);
        $spController = new SpController();
        $spController->cekStatusPengiriman($header->id_data);
        return redirect()
            ->route(
                'keadaan-serangan-opt.show',
                $id
            )
            ->with(
                'success',
                'Verifikasi berhasil disimpan.'
            );
    }

    private function decimal($value)
    {
        if ($value === null || $value === '') {
            return null;
        }

        return str_replace(',', '.', $value);
    }

    public function getOpt($idKomoditas)
    {
        $opt = Opt::where('id_komoditas', $idKomoditas)
            ->orderBy('nama_opt')
            ->get();

        return response()->json($opt);
    }

    
}   
