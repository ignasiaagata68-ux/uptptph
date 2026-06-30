<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;

use App\Models\InformasiPerubahanKategoriKekeringan;
use App\Models\DetInformasiPerubahanKategoriKekeringan;

class InformasiPerubahanKategoriKekeringanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('informasi_perubahan_kategori_kekeringan as h')
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
                'p.id_periode',
                'mt.musim_tanam'
            )
            ->get();

        return view(
            'informasi_perubahan_kategori_kekeringan.index',
            compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_data)
    {
        $data = Data::with([
            'petugas',
            'tahun',
            'bulan',
            'periode',
            'musimTanam'
        ])->findOrFail($id_data);

        $desa = Desa::all();

        $komoditas = Komoditas::all();

        return view(
            'informasi_perubahan_kategori_kekeringan.create',
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
        InformasiPerubahanKategoriKekeringan::create([

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

            DetInformasiPerubahanKategoriKekeringan::create([

                'id_informasi_perubahan_kategori_kekeringan' =>
                    $header->id_informasi_perubahan_kategori_kekeringan,

                'id_desa' =>
                    $request->id_desa[$i],

                'id_komoditas' =>
                    $request->id_komoditas[$i],

                'ltb_ringan' =>
                    $request->ltb_ringan[$i],

                'ltb_sedang' =>
                    $request->ltb_sedang[$i],

                'ltb_berat' =>
                    $request->ltb_berat[$i],

                'ltb_puso' =>
                    $request->ltb_puso[$i],

                'ltb_jumlah' =>
                    $request->ltb_jumlah[$i],

                'pkt_ringan' =>
                    $request->pkt_ringan[$i],

                'pkt_sedang' =>
                    $request->pkt_sedang[$i],

                'pkt_berat' =>
                    $request->pkt_berat[$i],

                'pkt_puso' =>
                    $request->pkt_puso[$i],

                'pkt_jumlah' =>
                    $request->pkt_jumlah[$i],

                'pkt_pulih' =>
                    $request->pkt_pulih[$i]

            ]);

        }

        return redirect()
            ->route(
                'informasi-perubahan-kategori-kekeringan.index'
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
   public function edit($id)
{
    $header = DB::table(
        'informasi_perubahan_kategori_kekeringan as h'
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
        'h.id_informasi_perubahan_kategori_kekeringan',
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

    $detail = DetInformasiPerubahanKategoriKekeringan::with([
        'desa',
        'komoditas'
    ])

    ->where(
        'id_informasi_perubahan_kategori_kekeringan',
        $id
    )

    ->get();

    $desa = Desa::all();

    $komoditas = Komoditas::all();

    return view(
        'informasi_perubahan_kategori_kekeringan.edit',
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

    InformasiPerubahanKategoriKekeringan::where(
        'id_informasi_perubahan_kategori_kekeringan',
        $id
    )->update([

        'id_periode' =>
            $request->id_periode[0],

        'id_kabupaten_kota' =>
            $request->id_kabupaten_kota[0],

        'id_kecamatan' =>
            $request->id_kecamatan[0]

    ]);

    for ($i = 0; $i < count($request->id_detail); $i++) {

DetInformasiPerubahanKategoriKekeringan::where(
    'id_det_informasi_perubahan_kategori_kekeringan',
    $request->id_detail[$i]
)->update([

    'id_desa' => $request->id_desa[$i],
    'id_komoditas' => $request->id_komoditas[$i],

    'ltb_ringan' => $request->ltb_ringan[$i],
    'ltb_sedang' => $request->ltb_sedang[$i],
    'ltb_berat' => $request->ltb_berat[$i],
    'ltb_puso' => $request->ltb_puso[$i],
    'ltb_jumlah' => $request->ltb_jumlah[$i],
    'pkt_ringan' => $request->pkt_ringan[$i],
    'pkt_sedang' => $request->pkt_sedang[$i],
    'pkt_berat' => $request->pkt_berat[$i],
    'pkt_puso' => $request->pkt_puso[$i],
    'pkt_jumlah' => $request->pkt_jumlah[$i],
    'pkt_pulih' => $request->pkt_pulih[$i],

]);

    }

    return redirect()
        ->route(
            'informasi-perubahan-kategori-kekeringan.index'
        )
        ->with(
            'success',
            'Data berhasil diubah'
        );
}


    public function detail($id)
{
    $header = DB::table(
        'informasi_perubahan_kategori_kekeringan as h'
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
        'h.id_informasi_perubahan_kategori_kekeringan',
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
        DetInformasiPerubahanKategoriKekeringan::with([
            'desa',
            'komoditas'
        ])

        ->where(
            'id_informasi_perubahan_kategori_kekeringan',
            $id
        )

        ->get();

    return view(
        'informasi_perubahan_kategori_kekeringan.detail',
        compact(
            'header',
            'detail'
        )
    );
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
