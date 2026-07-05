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
                    $this->decimal($request->lst[$i]),

                'was' =>
                    $this->decimal($request->was[$i]),

                'sp_r' =>
                    $this->decimal($request->sp_r[$i]),

                'sp_s' =>
                    $this->decimal($request->sp_s[$i]),

                'sp_b' =>
                    $this->decimal($request->sp_b[$i]),

                'sp_ps' =>
                    $this->decimal($request->sp_ps[$i]),

                'sp_pl' =>
                    $this->decimal($request->sp_pl[$i]),

                'sp_j' =>
                    $this->decimal($request->sp_j[$i]),

                'lt_r' =>
                    $this->decimal($request->lt_r[$i]),

                'lt_s' =>
                    $this->decimal($request->lt_s[$i]),

                'lt_b' =>
                    $this->decimal($request->lt_b[$i]),

                'lt_p' =>
                    $this->decimal($request->lt_p[$i]),

                'lt_j' =>
                    $this->decimal($request->lt_j[$i]),

                'lk_r' =>
                    $this->decimal($request->lk_r[$i]),

                'lk_s' =>
                    $this->decimal($request->lk_s[$i]),

                'lk_b' =>
                    $this->decimal($request->lk_b[$i]),

                'lk_p' =>
                    $this->decimal($request->lk_p[$i]),

                'lk_j' =>
                    $this->decimal($request->lk_j[$i]),

                'upy' =>
                    $this->decimal($request->upy[$i]),

                'l_upy' =>
                    $this->decimal($request->l_upy[$i]),

                'lat' =>
                    $this->decimal($request->lat[$i]),

                'long' =>
                    $this->decimal($request->long[$i]),

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
    DB::table(
    'det_laporan_kerusakan_tanaman_akibat_bencana_alam'
)
->where(
    'id_laporan_kerusakan_tanaman_akibat_bencana_alam',
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

    DetLaporanKerusakanTanamanAkibatBencanaAlam::create([

        'id_laporan_kerusakan_tanaman_akibat_bencana_alam' => $id,

        'id_tahun'          => $request->id_tahun[$i],
        'id_bulan'          => $request->id_bulan[$i],
        'id_periode'        => $request->id_periode[$i],
        'id_kabupaten_kota' => $request->id_kabupaten_kota[$i],
        'id_kecamatan'      => $request->id_kecamatan[$i],
        'id_desa'           => $request->id_desa[$i],
        'id_komoditas'      => $request->id_komoditas[$i],

        'var'   => $request->var[$i],
        'umr'   => $request->umr[$i],
        'lst'   => $this->decimal($request->lst[$i]),
        'was'   => $this->decimal($request->was[$i]),
        'lsrt'  => $this->decimal($request->lsrt[$i]),
        'k_s'   => $request->k_s[$i],
        'lpso'  => $this->decimal($request->lpso[$i]),
        'k_p'   => $request->k_p[$i],
        'lt_t'  => $this->decimal($request->lt_t[$i]),
        'lt_p'  => $this->decimal($request->lt_p[$i]),
        'lk_t'  => $this->decimal($request->lk_t[$i]),
        'lk_p'  => $this->decimal($request->lk_p[$i]),
        'upy'   => $request->upy[$i],
        'j_upy' => $this->decimal($request->j_upy[$i]),
        'lat'   => $this->decimal($request->lat[$i]),
        'long'  => $this->decimal($request->long[$i]),

        'status_verifikasi' => 'menunggu',
        'keterangan_verifikasi' => null,
        'verified_by' => null,
        'verified_at' => null,
    ]);
}
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
