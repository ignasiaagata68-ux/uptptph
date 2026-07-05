<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Data;
use App\Models\PengamatanPenyebaranDanPerkembanganSiputMurbey;
use App\Models\DetPengamatanPenyebaranDanPerkembanganSiputMurbey;

class PengamatanPenyebaranDanPerkembanganSiputMurbeyController extends Controller
{

    public function index()
{
    $data = DB::table(
        'pengamatan_penyebaran_dan_perkembangan_siput_murbey as h'
    )

    ->join(
        'kabupaten_kota as kab',
        'h.id_kabupaten_kota',
        '=',
        'kab.id_kabupaten_kota'
    )

    ->join(
        'kecamatan as kec',
        'h.id_kecamatan',
        '=',
        'kec.id_kecamatan'
    )

    ->join(
        'bulan as b',
        'h.id_bulan',
        '=',
        'b.id_bulan'
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

        'mt.musim_tanam'

    )

    ->orderBy(
        'h.id_pengamatan_penyebaran_dan_perkembangan_siput_murbey',
        'desc'
    )

    ->get();

    return view(
        'pengamatan_penyebaran_dan_perkembangan_siput_murbey.index',
        compact('data')
    );
}

    public function store(Request $request)
    {

        DB::beginTransaction();

        try{

            $master =
            PengamatanPenyebaranDanPerkembanganSiputMurbey::create([

                'id_kabupaten_kota'=>$request->id_kabupaten_kota[0],
                'id_kecamatan'=>$request->id_kecamatan[0],
                'id_bulan'=>$request->id_bulan[0],
                'id_musim_tanam'=>$request->id_musim_tanam[0],

            ]);

            foreach($request->id_desa as $i=>$v){

                DetPengamatanPenyebaranDanPerkembanganSiputMurbey::create([

                    'id_pengamatan_penyebaran_dan_perkembangan_siput_murbey'=>$master->id_pengamatan_penyebaran_dan_perkembangan_siput_murbey,

                    'id_desa'=>$request->id_desa[$i],

                    'kolom_telur' =>$request->kolom_telur[$i],

                    'kolom_dewasa' =>$request->kolom_dewasa[$i],

                    'bak_permanen_telur'=>$request->bak_permanen_telur[$i],

                    'bak_permanen_dewasa'=>$request->bak_permanen_dewasa[$i],

                    'parit_telur'=>$request->parit_telur[$i],

                    'parit_dewasa'=>$request->parit_dewasa[$i],

                    'sawah_telur'=>$request->sawah_telur[$i],

                    'sawah_dewasa'=>$request->sawah_dewasa[$i],

                    'lain_lain_telur'=>$request->lain_lain_telur[$i],

                    'lain_lain_dewasa'=>$request->lain_lain_dewasa[$i],

                    'intensitas'=>$request->intensitas[$i],

                    'pengendalian_fm'=>$request->pengendalian_fm[$i],

                    'pengendalian_pest'=>$request->pengendalian_pest[$i],

                    'pengendalian_cl'=>$request->pengendalian_cl[$i],

                    'pengendalian_jumlah'=>$request->pengendalian_jumlah[$i],

                ]);

            }

            DB::commit();

            return redirect()
            ->route('pengamatan-penyebaran-dan-perkembangan-siput-murbey.index')
            ->with('success','Data berhasil disimpan');

        }catch(\Exception $e){

            DB::rollBack();

            return back()
            ->withInput()
            ->with('error',$e->getMessage());

        }

    }

    public function detail($id)
{
    $header = DB::table(
        'pengamatan_penyebaran_dan_perkembangan_siput_murbey as h'
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
        'bulan as b',
        'h.id_bulan',
        '=',
        'b.id_bulan'
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
        'mt.musim_tanam'
    )

    ->where(
        'h.id_pengamatan_penyebaran_dan_perkembangan_siput_murbey',
        $id
    )

    ->first();


    $detail = DB::table(
        'det_pengamatan_penyebaran_dan_perkembangan_siput_murbey as d'
    )

    ->leftJoin(
        'desa',
        'd.id_desa',
        '=',
        'desa.id_desa'
    )

    ->select(
        'd.*',
        'desa.nama_desa'
    )

    ->where(
        'd.id_pengamatan_penyebaran_dan_perkembangan_siput_murbey',
        $id
    )

    ->get();


    return view(
        'pengamatan_penyebaran_dan_perkembangan_siput_murbey.detail',
        compact(
            'header',
            'detail'
        )
    );
}

    public function edit($id)
{
    $header = DB::table(
        'pengamatan_penyebaran_dan_perkembangan_siput_murbey as h'
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
        'bulan as b',
        'h.id_bulan',
        '=',
        'b.id_bulan'
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
        'mt.musim_tanam'
    )

    ->where(
        'h.id_pengamatan_penyebaran_dan_perkembangan_siput_murbey',
        $id
    )

    ->first();

    $detail = DB::table(
        'det_pengamatan_penyebaran_dan_perkembangan_siput_murbey'
    )

    ->where(
        'id_pengamatan_penyebaran_dan_perkembangan_siput_murbey',
        $id
    )

    ->get();

    $desa = DB::table('desa')
        ->where(
            'id_kecamatan',
            $header->id_kecamatan
        )
        ->get();

    return view(
        'pengamatan_penyebaran_dan_perkembangan_siput_murbey.edit',
        compact(
            'header',
            'detail',
            'desa'
        )
    );
}

    public function update(Request $request,$id)
    {

        $master=
        PengamatanPenyebaranDanPerkembanganSiputMurbey::findOrFail($id);

        $master->update([

            'id_kabupaten_kota'=>$request->id_kabupaten_kota[0],
            'id_kecamatan'=>$request->id_kecamatan[0],
            'id_bulan'=>$request->id_bulan[0],
            'id_musim_tanam'=>$request->id_musim_tanam[0],

        ]);

        DetPengamatanPenyebaranDanPerkembanganSiputMurbey
        ::where(
            'id_pengamatan_penyebaran_dan_perkembangan_siput_murbey',
            $id
        )->delete();

        foreach($request->id_desa as $i=>$v){

            DetPengamatanPenyebaranDanPerkembanganSiputMurbey::create([

                'id_pengamatan_penyebaran_dan_perkembangan_siput_murbey'=>$id,

                'id_desa'=>$request->id_desa[$i],

                'kolom_telur'=>$request->kolom_telur[$i],

                'kolom_dewasa'=>$request->kolom_dewasa[$i],

                'bak_permanen_telur'=>$request->bak_permanen_telur[$i],

                'bak_permanen_dewasa'=>$request->bak_permanen_dewasa[$i],

                'parit_telur'=>$request->parit_telur[$i],

                'parit_dewasa'=>$request->parit_dewasa[$i],

                'sawah_telur'=>$request->sawah_telur[$i],

                'sawah_dewasa'=>$request->sawah_dewasa[$i],

                'lain_lain_telur'=>$request->lain_lain_telur[$i],

                'lain_lain_dewasa'=>$request->lain_lain_dewasa[$i],

                'intensitas'=>$request->intensitas[$i],

                'pengendalian_fm'=>$request->pengendalian_fm[$i],

                'pengendalian_pest'=>$request->pengendalian_pest[$i],

                'pengendalian_cl'=>$request->pengendalian_cl[$i],

                'pengendalian_jumlah'=>$request->pengendalian_jumlah[$i],

            ]);

        }

        return redirect()
        ->route('pengamatan-penyebaran-dan-perkembangan-siput-murbey.index')
        ->with('success','Data berhasil diupdate');

    }

    public function destroy($id)
    {

        DetPengamatanPenyebaranDanPerkembanganSiputMurbey
        ::where(
            'id_pengamatan_penyebaran_dan_perkembangan_siput_murbey',
            $id
        )->delete();

        PengamatanPenyebaranDanPerkembanganSiputMurbey
        ::destroy($id);

        return back()->with('success','Data berhasil dihapus');

    }

    public function verifikasi($id)
    {

        $data=
        PengamatanPenyebaranDanPerkembanganSiputMurbey::findOrFail($id);

        return view(
            'pengamatan_penyebaran_dan_perkembangan_siput_murbey.verifikasi',
            compact('data')
        );

    }

    public function prosesVerifikasi(Request $request,$id)
    {

        $data=
        PengamatanPenyebaranDanPerkembanganSiputMurbey::findOrFail($id);

        $data->update([

            'status_verifikasi'=>$request->status_verifikasi,
            'keterangan_verifikasi'=>$request->keterangan_verifikasi,
            'verified_by'=>auth()->id(),
            'verified_at'=>now(),

        ]);

        return redirect()
        ->route('pengamatan-penyebaran-dan-perkembangan-siput-murbey.index')
        ->with('success','Verifikasi berhasil');

    }

}