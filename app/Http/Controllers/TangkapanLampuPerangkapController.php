<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Data;
use App\Models\TangkapanLampuPerangkap;
use App\Models\DetTangkapanLampuPerangkap;

class TangkapanLampuPerangkapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('tangkapan_lampu_perangkap as h')
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
                'bulan as b',
                'h.id_bulan',
                '=',
                'b.id_bulan'
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
                'b.bulan',
                'p.periode_pengamatan',
                'mt.musim_tanam'
            )
            ->get();

        return view(
            'tangkapan_lampu_perangkap.index',
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
            'bulan',
            'periode',
            'musimTanam'
        ])->findOrFail($id_data);

        return view(
            'tangkapan_lampu_perangkap.create',
            compact('data')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $header = TangkapanLampuPerangkap::create([

            'id_kabupaten_kota' => $request->id_kabupaten_kota,

            'id_kecamatan'      => $request->id_kecamatan,

            'id_bulan'          => $request->id_bulan,

            'id_periode'        => $request->id_periode,

            'id_musim_tanam'    => $request->id_musim_tanam,

        ]);

        for($i=0; $i<count($request->penggerek_batang_padi_kn); $i++)
        {

            DetTangkapanLampuPerangkap::create([

                'id_tangkapan_lampu_perangkap' =>
                    $header->id_tangkapan_lampu_perangkap,

                'penggerek_batang_padi_kn' =>
                    $request->penggerek_batang_padi_kn[$i],

                'penggerek_batang_padi_pt' =>
                    $request->penggerek_batang_padi_pt[$i],

                'wereng_ck' =>
                    $request->wereng_ck[$i],

                'wereng_pp' =>
                    $request->wereng_pp[$i],

                'wereng_daun_vn' =>
                    $request->wereng_daun_vn[$i],

                'wereng_daun_nn' =>
                    $request->wereng_daun_nn[$i],

                'ganjur' =>
                    $request->ganjur[$i],

                'kepinding_tanah' =>
                    $request->kepinding_tanah[$i],

                'walang_sangit' =>
                    $request->walang_sangit[$i],
                
                'serangga1' => 
                    $request->serangga1[$i],

                'serangga2' => 
                    $request->serangga2[$i],

                'serangga3' => 
                    $request->serangga3[$i],

                'serangga4' => 
                    $request->serangga4[$i],

                'serangga5' => 
                    $request->serangga5[$i],

                'musuh_alami1' =>
                    $request->musuh_alami1[$i],

                'musuh_alami2' =>
                    $request->musuh_alami2[$i],

                'musuh_alami3' =>
                    $request->musuh_alami3[$i],

                'musuh_alami4' =>
                    $request->musuh_alami4[$i]

            ]);

        }

        return redirect()
            ->route('tangkapan-lampu-perangkap.index')
            ->with(
                'success',
                'Data berhasil disimpan.'
            );
    dd($header->id_tangkapan_lampu_perangkap);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $header = DB::table('tangkapan_lampu_perangkap as h')

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
            'bulan as b',
            'h.id_bulan',
            '=',
            'b.id_bulan'
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

            ->select(
            'h.*',
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'b.bulan',
            'p.periode_pengamatan',
            'p.tgl_mulai',
            'mt.musim_tanam'
        )

        ->where(
            'id_tangkapan_lampu_perangkap',
            $id
        )

        ->first();


    $detail = DetTangkapanLampuPerangkap::where(
        'id_tangkapan_lampu_perangkap',
        $id
    )->get();


    $jumlah = [

        'kn' => $detail->sum('penggerek_batang_padi_kn'),
        'pt' => $detail->sum('penggerek_batang_padi_pt'),

        'p1' => 0,
        'p2' => 0,

        'ck' => $detail->sum('wereng_ck'),
        'pp' => $detail->sum('wereng_pp'),

        'vn' => $detail->sum('wereng_daun_vn'),
        'nn' => $detail->sum('wereng_daun_nn'),

        'g'  => $detail->sum('ganjur'),
        'kt' => $detail->sum('kepinding_tanah'),
        'ws' => $detail->sum('walang_sangit'),

        's1' => 0,
        's2' => 0,
        's3' => 0,
        's4' => 0,

        'm1' => $detail->sum('musuh_alami1'),
        'm2' => $detail->sum('musuh_alami2'),
        'm3' => $detail->sum('musuh_alami3'),
        'm4' => $detail->sum('musuh_alami4'),

    ];


    $jml = max($detail->count(), 1);

    $rata = [

        'kn' => round($jumlah['kn'] / $jml, 2),
        'pt' => round($jumlah['pt'] / $jml, 2),

        'p1' => 0,
        'p2' => 0,

        'ck' => round($jumlah['ck'] / $jml, 2),
        'pp' => round($jumlah['pp'] / $jml, 2),

        'vn' => round($jumlah['vn'] / $jml, 2),
        'nn' => round($jumlah['nn'] / $jml, 2),

        'g'  => round($jumlah['g'] / $jml, 2),
        'kt' => round($jumlah['kt'] / $jml, 2),
        'ws' => round($jumlah['ws'] / $jml, 2),

        's1' => 0,
        's2' => 0,
        's3' => 0,
        's4' => 0,

        'm1' => round($jumlah['m1'] / $jml, 2),
        'm2' => round($jumlah['m2'] / $jml, 2),
        'm3' => round($jumlah['m3'] / $jml, 2),
        'm4' => round($jumlah['m4'] / $jml, 2),

    ];


    return view(
        'tangkapan_lampu_perangkap.detail',
        compact(
            'header',
            'detail',
            'jumlah',
            'rata'
        )
    );
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $header = DB::table('tangkapan_lampu_perangkap as h')

        ->leftJoin(
            'kabupaten_kota as kab',
            'h.id_kabupaten_kota',
            '=',
            'kab.id_kabupaten_kota'
        )
        ->leftJoin(
            'bulan as b',
            'h.id_bulan',
            '=',
            'b.id_bulan'
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

        ->select(
            'h.*',
            'kab.nama_kabupaten_kota',
            'kec.nama_kecamatan',
            'b.bulan',
            'p.periode_pengamatan',
            'mt.musim_tanam'
        )

        ->where(
            'h.id_tangkapan_lampu_perangkap',
            $id
        )

        ->first();

    $detail = DetTangkapanLampuPerangkap::where(
        'id_tangkapan_lampu_perangkap',
        $id
    )->get();

    return view(
        'tangkapan_lampu_perangkap.edit',
        compact(
            'header',
            'detail'
        )
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    DB::beginTransaction();

    try{

        $header =
        TangkapanLampuPerangkap::findOrFail($id);

        $header->update([

            'id_kabupaten_kota' =>
                $request->id_kabupaten_kota,

            'id_kecamatan' =>
                $request->id_kecamatan,

            'id_bulan' => 
                $request->id_bulan,

            'id_periode' =>
                $request->id_periode,

            'id_musim_tanam' =>
                $request->id_musim_tanam,

        ]);

        DetTangkapanLampuPerangkap::where(
            'id_tangkapan_lampu_perangkap',
            $id
        )->delete();

        foreach($request->penggerek_batang_padi_kn as $i => $v){

            DetTangkapanLampuPerangkap::create([

                'id_tangkapan_lampu_perangkap' =>
                    $id,

                'penggerek_batang_padi_kn' =>
                    $request->penggerek_batang_padi_kn[$i],

                'penggerek_batang_padi_pt' =>
                    $request->penggerek_batang_padi_pt[$i],

                'wereng_ck' =>
                    $request->wereng_ck[$i],

                'wereng_pp' =>
                    $request->wereng_pp[$i],

                'wereng_daun_vn' =>
                    $request->wereng_daun_vn[$i],

                'wereng_daun_nn' =>
                    $request->wereng_daun_nn[$i],

                'ganjur' =>
                    $request->ganjur[$i],

                'kepinding_tanah' =>
                    $request->kepinding_tanah[$i],

                'walang_sangit' =>
                    $request->walang_sangit[$i],

                'serangga1' =>
                    $request->serangga1[$i],

                'serangga2' =>
                    $request->serangga2[$i],

                'serangga3' =>
                    $request->serangga3[$i],

                'serangga4' =>
                    $request->serangga4[$i],

                'serangga5' =>
                    $request->serangga5[$i],

                'musuh_alami1' =>
                    $request->musuh_alami1[$i],

                'musuh_alami2' =>
                    $request->musuh_alami2[$i],

                'musuh_alami3' =>
                    $request->musuh_alami3[$i],

                'musuh_alami4' =>
                    $request->musuh_alami4[$i],

            ]);

        }

        DB::commit();

        return redirect()
            ->route('tangkapan-lampu-perangkap.index')
            ->with(
                'success',
                'Data berhasil diupdate.'
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
