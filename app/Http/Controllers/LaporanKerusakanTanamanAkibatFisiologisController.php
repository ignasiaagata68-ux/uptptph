<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;
use App\Models\Kecamatan;
use App\Models\LaporanKerusakanTanamanAkibatFisiologis;
use App\Models\DetLaporanKerusakanTanamanAkibatFisiologis;

class LaporanKerusakanTanamanAkibatFisiologisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('laporan_kerusakan_tanaman_akibat_fisiologis as h')

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

            ->get();

        return view(
            'laporan_kerusakan_tanaman_akibat_fisiologis.index',
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
            'tahun',
            'bulan',
            'periode',
            'musimTanam'
        ])->findOrFail($id_data);

        $desa = Desa::all();

        $komoditas = Komoditas::all();

        return view(
            'laporan_kerusakan_tanaman_akibat_fisiologis.create',
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
        LaporanKerusakanTanamanAkibatFisiologis::create([

            'id_periode' =>
                $request->id_periode[0],

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota[0],

            'id_kecamatan' =>
                $request->id_kecamatan[0],

            'id_musim_tanam' => 
                $request->id_musim_tanam

        ]);

        for($i = 0; $i < count($request->id_desa); $i++)
        {

            DetLaporanKerusakanTanamanAkibatFisiologis::create([

                'id_laporan_kerusakan_tanaman_akibat_fisiologis' =>
                    $header->id_laporan_kerusakan_tanaman_akibat_fisiologis,

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

                'varietas' =>
                    $request->varietas[$i],

                'umur' =>
                    $request->umur[$i],

                'luas_tanam' =>
                    $this->decimal($request->luas_tanam[$i]),

                'luas_waspada' =>
                    $this->decimal($request->luas_waspada[$i]),

                'sps_ringan' =>
                    $this->decimal($request->sps_ringan[$i]),

                'sps_sedang' =>
                    $this->decimal($request->sps_sedang[$i]),

                'sps_berat' =>
                    $this->decimal($request->sps_berat[$i]),

                'sps_puso' =>
                    $this->decimal($request->sps_puso[$i]),

                'sps_pulih' =>
                    $this->decimal($request->sps_pulih[$i]),

                'sps_jumlah' =>
                    $this->decimal($request->sps_jumlah[$i]),

                'luas_tambah_ringan' =>
                    $this->decimal($request->luas_tambah_ringan[$i]),

                'luas_tambah_sedang' =>
                    $this->decimal($request->luas_tambah_sedang[$i]),

                'luas_tambah_berat' =>
                    $this->decimal($request->luas_tambah_berat[$i]),

                'luas_tambah_puso' =>
                    $this->decimal($request->luas_tambah_puso[$i]),

                'luas_tambah_jumlah' =>
                    $this->decimal($request->luas_tambah_jumlah[$i]),

                'luas_keadaan_ringan' =>
                    $this->decimal($request->luas_keadaan_ringan[$i]),

                'luas_keadaan_sedang' =>
                    $this->decimal($request->luas_keadaan_sedang[$i]),

                'luas_keadaan_berat' =>
                    $this->decimal($request->luas_keadaan_berat[$i]),

                'luas_keadaan_puso' =>
                    $this->decimal($request->luas_keadaan_puso[$i]),

                'luas_keadaan_jumlah' =>
                    $this->decimal($request->luas_keadaan_jumlah[$i]),

                'penanganan_upaya' =>
                    $this->decimal($request->penanganan_upaya[$i]),

                'penanganan_luas' =>
                    $this->decimal($request->penanganan_luas[$i]),

                'latitude' =>
                    $this->decimal($request->latitude[$i]),

                'longitude' =>
                    $this->decimal($request->longitude[$i]),

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
                'laporan-kerusakan-tanaman-akibat-fisiologis.index'
            )
            ->with(
                'success',
                'Data berhasil disimpan'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $header = DB::table(
            'laporan_kerusakan_tanaman_akibat_fisiologis as h'
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
            'h.id_laporan_kerusakan_tanaman_akibat_fisiologis',
            $id
        )

        ->select(
            'h.*',
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'p.periode_pengamatan',
            'mt.musim_tanam'
        )

        ->first();

        $detail =
            DetLaporanKerusakanTanamanAkibatFisiologis::with([
                'desa',
                'komoditas'
            ])

            ->where(
                'id_laporan_kerusakan_tanaman_akibat_fisiologis',
                $id
            )

            ->get();

        return view(
            'laporan_kerusakan_tanaman_akibat_fisiologis.detail',
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
        $header = DB::table(
            'laporan_kerusakan_tanaman_akibat_fisiologis as h'
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
            'h.id_laporan_kerusakan_tanaman_akibat_fisiologis',
            $id
        )

        ->select(
            'h.*',
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'p.periode_pengamatan',
            'mt.musim_tanam'
        )

        ->first();

        $detail = DetLaporanKerusakanTanamanAkibatFisiologis::with([
            'desa',
            'komoditas'
        ])

        ->where(
            'id_laporan_kerusakan_tanaman_akibat_fisiologis',
            $id
        )

        ->get();
        $desa = Desa::all();

        $komoditas = Komoditas::all();

        $kecamatan = Kecamatan::all();

        return view(
            'laporan_kerusakan_tanaman_akibat_fisiologis.edit',
            compact(
                'header',
                'detail',
                'kecamatan',
                'desa',
                'komoditas'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    LaporanKerusakanTanamanAkibatFisiologis::where(
        'id_laporan_kerusakan_tanaman_akibat_fisiologis',
        $id
    )->update([

        'id_periode' =>
            $request->id_periode[0],

        'id_kabupaten_kota' =>
            $request->id_kabupaten_kota[0],

        'id_kecamatan' =>
            $request->id_kecamatan[0],

        'id_musim_tanam' =>
            $request->id_musim_tanam

    ]);

    for ($i = 0; $i < count($request->id_detail); $i++) {

        DetLaporanKerusakanTanamanAkibatFisiologis::where(
            'id_det_laporan_kerusakan_tanaman_akibat_fisiologis',
            $request->id_detail[$i]
        )->update([

            'id_desa' =>
                $request->id_desa[$i],

            'id_komoditas' =>
                $request->id_komoditas[$i],

            'varietas' =>
                $request->varietas[$i],

            'umur' =>
                $request->umur[$i],

            'luas_tanam' =>
                $this->decimal($request->luas_tanam[$i]),

            'luas_waspada' =>
                $this->decimal($request->luas_waspada[$i]),

            'sps_ringan' =>
                $this->decimal($request->sps_ringan[$i]),

            'sps_sedang' =>
                $this->decimal($request->sps_sedang[$i]),

            'sps_berat' =>
                $this->decimal($request->sps_berat[$i]),

            'sps_puso' =>
                $this->decimal($request->sps_puso[$i]),

            'sps_pulih' =>
                $this->decimal($request->sps_pulih[$i]),

            'sps_jumlah' =>
                $this->decimal($request->sps_jumlah[$i]),

            'luas_tambah_ringan' =>
                $this->decimal($request->luas_tambah_ringan[$i]),

            'luas_tambah_sedang' =>
                $this->decimal($request->luas_tambah_sedang[$i]),

            'luas_tambah_berat' =>
                $this->decimal($request->luas_tambah_berat[$i]),

            'luas_tambah_puso' =>
                $this->decimal($request->luas_tambah_puso[$i]),

            'luas_tambah_jumlah' =>
                $this->decimal($request->luas_tambah_jumlah[$i]),

            'luas_keadaan_ringan' =>
                $this->decimal($request->luas_keadaan_ringan[$i]),

            'luas_keadaan_sedang' =>
                $this->decimal($request->luas_keadaan_sedang[$i]),

            'luas_keadaan_berat' =>
                $this->decimal($request->luas_keadaan_berat[$i]),

            'luas_keadaan_puso' =>
                $this->decimal($request->luas_keadaan_puso[$i]),

            'luas_keadaan_jumlah' =>
                $this->decimal($request->luas_keadaan_jumlah[$i]),

            'penanganan_upaya' =>
                $request->penanganan_upaya[$i],

            'penanganan_luas' =>
                $this->decimal($request->penanganan_luas[$i]),

            'latitude' =>
                $this->decimal($request->latitude[$i]),

            'longitude' =>
                $this->decimal($request->longitude[$i])

        ]);
    }

    return redirect()
        ->route(
            'laporan-kerusakan-tanaman-akibat-fisiologis.index'
        )
        ->with(
            'success',
            'Data berhasil diubah'
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
}
