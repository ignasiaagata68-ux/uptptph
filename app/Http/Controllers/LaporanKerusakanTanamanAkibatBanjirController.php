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
        LaporanKerusakanTanamanAkibatBanjir::create([

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

        return view(
            'laporan_kerusakan_tanaman_akibat_banjir.detail',
            compact(
                'header',
                'detail'
            )
        );
    }
    
    public function edit($id)
{
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

    $detail = DB::table(
        'det_laporan_kerusakan_tanaman_akibat_banjir'
    )
    ->where(
        'id_laporan_kerusakan_tanaman_akibat_banjir',
        $id
    )
    ->get();

    $desa = Desa::all();

    $komoditas = Komoditas::all();

    return view(
        'laporan_kerusakan_tanaman_akibat_banjir.edit',
        compact(
            'header',
            'detail',
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
    DB::table('det_laporan_kerusakan_tanaman_akibat_banjir')
        ->where(
            'id_laporan_kerusakan_tanaman_akibat_banjir',
            $id
        )
        ->delete();

    for ($i = 0; $i < count($request->id_desa); $i++) {

        if (
            empty($request->id_desa[$i]) &&
            empty($request->id_komoditas[$i])
        ) {
            continue;
        }

        DetLaporanKerusakanTanamanAkibatBanjir::create([

            'id_laporan_kerusakan_tanaman_akibat_banjir' => $id,

            'id_tahun' => $request->id_tahun[$i],
            'id_bulan' => $request->id_bulan[$i],
            'id_periode' => $request->id_periode[$i],
            'id_kabupaten_kota' => $request->id_kabupaten_kota[$i],
            'id_kecamatan' => $request->id_kecamatan[$i],
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
        ]);
    }

    return redirect()
        ->route('laporan-kerusakan-tanaman-akibat-banjir.detail', $id)
        ->with('success', 'Data berhasil diperbarui');
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
