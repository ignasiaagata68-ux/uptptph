<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\MusimTanam;
use App\Models\Petugas;
use App\Models\Opt;
use App\Models\Periode;
use App\Http\Controllers\SpController;


use App\Models\LaporanKerusakanTanamanAkibatBanjir;
use App\Models\DetLaporanKerusakanTanamanAkibatBanjir;
use App\Models\PengirimanLaporan;

class LaporanKerusakanTanamanAkibatBanjirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $petugas = Petugas::where(
        'id_user',
        session('id_user')
    )->first();

    $data = DB::table(
        'laporan_kerusakan_tanaman_akibat_banjir as h'
    )

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

    ->where(
        'k.id_kecamatan',
        $petugas->id_kecamatan
    )

    ->leftJoin(
        'det_laporan_kerusakan_tanaman_akibat_banjir as d',
        'h.id_laporan_kerusakan_tanaman_akibat_banjir',
        '=',
        'd.id_laporan_kerusakan_tanaman_akibat_banjir'
    )

    ->select(
        'h.*',
        'kab.nama_kabupaten_kota',
        'kec.nama_kecamatan',
        'p.periode_pengamatan',
        'mt.musim_tanam',

        DB::raw('MIN(d.status_verifikasi) as status_verifikasi'),

        DB::raw('GROUP_CONCAT(DISTINCT d.keterangan_verifikasi SEPARATOR ", ") as keterangan_verifikasi')
    )

    ->groupBy(
        'h.id_laporan_kerusakan_tanaman_akibat_banjir',
        'kab.nama_kabupaten_kota',
        'kec.nama_kecamatan',
        'p.periode_pengamatan',
        'mt.musim_tanam'
    )

    ->latest(
        'h.id_laporan_kerusakan_tanaman_akibat_banjir'
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
        $header = LaporanKerusakanTanamanAkibatBanjir::where(
            'id_data',
            $id_data
        )->first();

        if ($header) {

            return redirect()->route(
                'laporan-kerusakan-tanaman-akibat-banjir.detail',
                $header->id_laporan_kerusakan_tanaman_akibat_banjir
            );

        }

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
        $header = LaporanKerusakanTanamanAkibatBanjir::firstOrCreate(

            [
                'id_data' => $request->id_data
            ],

            [
                'id_periode' =>
                    $request->id_periode[0],

                'id_kabupaten_kota' =>
                    $request->id_kabupaten_kota[0],

                'id_kecamatan' =>
                    $request->id_kecamatan[0],

                'id_musim_tanam' =>
                    1
            ]

        );

        for($i = 0; $i < count($request->id_desa); $i++)
        {

            DetLaporanKerusakanTanamanAkibatBanjir::create([

                'id_laporan_kerusakan_tanaman_akibat_banjir' =>
                    $header->id_laporan_kerusakan_tanaman_akibat_banjir,

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

                'umur' =>
                    $request->umur[$i],

                'luas_tanam' =>
                    $this->decimal($request->luas_tanam[$i]),

                'luas_waspada' =>
                    $this->decimal($request->luas_waspada[$i]),

                'sps_surut_luas' =>
                    $this->decimal($request->sps_surut_luas[$i]),

                'sps_surut_ket' =>
                    $request->sps_surut_ket[$i],

                'sps_puso_luas' =>
                    $this->decimal($request->sps_puso_luas[$i]),

                'sps_puso_ket' =>
                   $request->sps_puso_ket[$i],

                'luas_tambah_terkena' =>
                    $this->decimal($request->luas_tambah_terkena[$i]),

                'luas_tambah_puso' =>
                    $this->decimal($request->luas_tambah_puso[$i]),

                'luas_keadaan_terkena' =>
                    $this->decimal($request->luas_keadaan_terkena[$i]),

                'luas_keadaan_puso' =>
                    $this->decimal($request->luas_keadaan_puso[$i]),

                'penangan_upaya' =>
                    $request->penangan_upaya[$i],

                'penangan_jumlah' =>
                    $this->decimal($request->penangan_jumlah[$i]),

                'koordinat_latitude' =>
                    $this->decimal($request->koordinat_latitude[$i]),

                'koordinat_longitude' =>
                    $this->decimal($request->koordinat_longitude[$i]),

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

        PengirimanLaporan::where('id_data', $request->id_data)
        ->update([
            'status' => 'menunggu',
            'tanggal_kirim' => now(),
            'tanggal_verifikasi' => null,
            'id_user_lphp' => null,
            'komentar' => null,
        ]);

        return redirect()
            ->route(
                'laporan-kerusakan-tanaman-akibat-banjir.index'
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
        $header = DB::table(
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

        ->leftJoin(
            'musim_tanam as mt',
            'l.id_musim_tanam',
            '=',
            'mt.id_musim_tanam'
        )

        ->where(
            'l.id_laporan_kerusakan_tanaman_akibat_banjir',
            $id
        )

        ->select(
            'l.*',
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'p.periode_pengamatan',
            'mt.musim_tanam'
        )

        ->first();

        $detail = DetLaporanKerusakanTanamanAkibatBanjir::with([
            'desa',
            'komoditas'
        ])
        ->where(
            'id_laporan_kerusakan_tanaman_akibat_banjir',
            $id
        )
        ->get();

        $statusPengiriman = PengirimanLaporan::where(
            'id_data',
            $header->id_data
        )->first();

        return view(
            'laporan_kerusakan_tanaman_akibat_banjir.detail',
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
    $detailPerbaikan = DetLaporanKerusakanTanamanAkibatBanjir::find($id);

    if ($detailPerbaikan) {

        // Ambil id header dari detail
        $idHeader = $detailPerbaikan->id_laporan_kerusakan_tanaman_akibat_banjir;

        $header = DB::table('laporan_kerusakan_tanaman_akibat_banjir as l')
            ->leftJoin('kabupaten_kota as kab','l.id_kabupaten_kota','=','kab.id_kabupaten_kota')
            ->leftJoin('kecamatan as kec','l.id_kecamatan','=','kec.id_kecamatan')
            ->leftJoin('periode as p','l.id_periode','=','p.id_periode')
            ->leftJoin('musim_tanam as mt','l.id_musim_tanam','=','mt.id_musim_tanam')
            ->where('l.id_laporan_kerusakan_tanaman_akibat_banjir',$idHeader)
            ->select(
                'l.*',
                'kab.nama_kabupaten_kota',
                'kec.nama_kecamatan',
                'p.periode_pengamatan',
                'mt.musim_tanam'
            )
            ->first();

        $detail = collect([$detailPerbaikan]);

        $desa = Desa::all();
        $komoditas = Komoditas::all();

        return view(
            'laporan_kerusakan_tanaman_akibat_banjir.edit_perbaikan',
            compact('header','detail','desa','komoditas')
        );
    }

    // ===== Edit normal =====

    $header = DB::table('laporan_kerusakan_tanaman_akibat_banjir as l')
        ->leftJoin('kabupaten_kota as kab','l.id_kabupaten_kota','=','kab.id_kabupaten_kota')
        ->leftJoin('kecamatan as kec','l.id_kecamatan','=','kec.id_kecamatan')
        ->leftJoin('periode as p','l.id_periode','=','p.id_periode')
        ->leftJoin('musim_tanam as mt','l.id_musim_tanam','=','mt.id_musim_tanam')
        ->where('l.id_laporan_kerusakan_tanaman_akibat_banjir',$id)
        ->select(
            'l.*',
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'p.periode_pengamatan',
            'mt.musim_tanam'
        )
        ->first();

    $detail = DB::table('det_laporan_kerusakan_tanaman_akibat_banjir')
        ->where('id_laporan_kerusakan_tanaman_akibat_banjir',$id)
        ->get();

    $desa = Desa::all();
    $komoditas = Komoditas::all();

    return view(
        'laporan_kerusakan_tanaman_akibat_banjir.edit',
        compact(
            'header',
            'detail',
            'desa',
            'komoditas',
            'idDetail'

            )
    );
}
    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, $id)
{
    $header = LaporanKerusakanTanamanAkibatBanjir::findOrFail($id);

    $header->update([
        'id_periode'        => $request->id_periode[0],
        'id_kabupaten_kota' => $request->id_kabupaten_kota[0],
        'id_kecamatan'      => $request->id_kecamatan[0],
        'id_musim_tanam'    => 1,
    ]);

    for ($i = 0; $i < count($request->id_desa); $i++) {

        if (
            empty($request->id_desa[$i]) &&
            empty($request->id_komoditas[$i])
        ) {
            continue;
        }

        $data = [

            'id_laporan_kerusakan_tanaman_akibat_banjir' => $id,

            'id_tahun' => $request->id_tahun[0],
            'id_bulan' => $request->id_bulan[0],
            'id_periode' => $request->id_periode[0],
            'id_kabupaten_kota' => $request->id_kabupaten_kota[0],
            'id_kecamatan' => $request->id_kecamatan[0],
            'id_desa' => $request->id_desa[$i],
            'id_komoditas' => $request->id_komoditas[$i],

            'var' => $request->var[$i],
            'umur' => $request->umur[$i],

            'luas_tanam' => $this->decimal($request->luas_tanam[$i]),
            'luas_waspada' => $this->decimal($request->luas_waspada[$i]),

            'sps_surut_luas' => $this->decimal($request->sps_surut_luas[$i]),
            'sps_surut_ket' => $request->sps_surut_ket[$i], 

            'sps_puso_luas' => $this->decimal($request->sps_puso_luas[$i]),
            'sps_puso_ket' => $request->sps_puso_ket[$i],  

            'luas_tambah_terkena' => $this->decimal($request->luas_tambah_terkena[$i]),
            'luas_tambah_puso' => $this->decimal($request->luas_tambah_puso[$i]),

            'luas_keadaan_terkena' => $this->decimal($request->luas_keadaan_terkena[$i]),
            'luas_keadaan_puso' => $this->decimal($request->luas_keadaan_puso[$i]),

            'penangan_upaya' => $request->penangan_upaya[$i],
            'penangan_jumlah' => $this->decimal($request->penangan_jumlah[$i]),

            'koordinat_latitude' => $this->decimal($request->koordinat_latitude[$i]),
            'koordinat_longitude' => $this->decimal($request->koordinat_longitude[$i]),

            'status_verifikasi' => 'menunggu',
            'keterangan_verifikasi' => null,
            'verified_by' => null,
            'verified_at' => null,
        ];

        if (!empty($request->id_detail[$i])) {

            $detail = DetLaporanKerusakanTanamanAkibatBanjir::findOrFail(
                $request->id_detail[$i]
            );

            $detail->update($data);

        } else {

            DetLaporanKerusakanTanamanAkibatBanjir::create($data);

        }
    }

    return redirect()
        ->route(
            'laporan-kerusakan-tanaman-akibat-banjir.detail',
            $id
        )
        ->with(
            'success',
            'Data berhasil diperbarui.'
        );
}

    
    private function decimal($value)
    {
        if ($value === null || $value === '') {
            return null;
        }

        return str_replace(',', '.', $value);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function prosesVerifikasi(Request $request, $id)
{
    foreach ($request->id_detail as $idDetail) {

        DetLaporanKerusakanTanamanAkibatBanjir::where(
            'id_det_laporan_kerusakan_tanaman_akibat_banjir',
            $idDetail
        )->update([

            'status_verifikasi' =>
                $request->status_verifikasi[$idDetail],

            'keterangan_verifikasi' =>
                $request->keterangan_verifikasi[$idDetail] ?? null,

            'verified_by' =>
                session('id_user'),

            'verified_at' =>
                now()

        ]);
    }

    $header = LaporanKerusakanTanamanAkibatBanjir::findOrFail($id);

    $spController = new SpController();
    $spController->cekStatusPengiriman($header->id_data);

    return redirect()
        ->route(
            'laporan-kerusakan-tanaman-akibat-banjir.detail',
            $id
        )
        ->with(
            'success',
            'Verifikasi berhasil disimpan.'
        );
}

    public function editPerbaikan($id)
{
    $detail = DetLaporanKerusakanTanamanAkibatBanjir::findOrFail($id);

    $header = DB::table('laporan_kerusakan_tanaman_akibat_banjir as l')

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

        ->leftJoin(
            'musim_tanam as mt',
            'l.id_musim_tanam',
            '=',
            'mt.id_musim_tanam'
        )

        ->where(
            'l.id_laporan_kerusakan_tanaman_akibat_banjir',
            $detail->id_laporan_kerusakan_tanaman_akibat_banjir
        )

        ->select(
            'l.*',
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'p.periode_pengamatan',
            'mt.musim_tanam'
        )

        ->first();

    $detail = collect([$detail]);

    $desa = Desa::all();
    $komoditas = Komoditas::all();

    $idDetail = $detail->id_det_laporan_kerusakan_tanaman_akibat_banjir;

    return view(
        'laporan_kerusakan_tanaman_akibat_banjir.edit_perbaikan',
        compact(
            'header',
            'detail',
            'idDetail',
            'desa',
            'komoditas'
        )
    );
}

public function updatePerbaikan(Request $request, $id)
{
    $detail = DetLaporanKerusakanTanamanAkibatBanjir::findOrFail($id);

    $detail->update([
        'id_desa'                 => $request->id_desa[0],
        'id_komoditas'            => $request->id_komoditas[0],
        'var'                     => $request->var[0],
        'umur'                    => $request->umur[0],
        'luas_tanam'              => $request->luas_tanam[0],
        'luas_waspada'            => $request->luas_waspada[0],
        'sps_surut_luas'          => $request->sps_surut_luas[0],
        'sps_surut_ket'           => $request->sps_surut_ket[0],
        'sps_puso_luas'           => $request->sps_puso_luas[0],
        'sps_puso_ket'            => $request->sps_puso_ket[0],
        'luas_tambah_terkena'     => $request->luas_tambah_terkena[0],
        'luas_tambah_puso'        => $request->luas_tambah_puso[0],
        'luas_keadaan_terkena'    => $request->luas_keadaan_terkena[0],
        'luas_keadaan_puso'       => $request->luas_keadaan_puso[0],
        'penangan_upaya'          => $request->penangan_upaya[0],
        'penangan_jumlah'         => $request->penangan_jumlah[0],
        'koordinat_latitude'      => $request->koordinat_latitude[0],
        'koordinat_longitude'     => $request->koordinat_longitude[0],

        // reset status verifikasi
        'status_verifikasi'       => 'menunggu',
        'keterangan_verifikasi'   => null,
        'verified_by'             => null,
        'verified_at'             => null,
    ]);
    
    $header = LaporanKerusakanTanamanAkibatBanjir::findOrFail(
    $detail->id_laporan_kerusakan_tanaman_akibat_banjir
    );

    $spController = new SpController();
    $spController->cekStatusPengiriman($header->id_data);
    return redirect()
        ->route(
            'laporan-kerusakan-tanaman-akibat-banjir.detail',
            $detail->id_laporan_kerusakan_tanaman_akibat_banjir
        )
        ->with('success', 'Data perbaikan berhasil disimpan.');
}
}
