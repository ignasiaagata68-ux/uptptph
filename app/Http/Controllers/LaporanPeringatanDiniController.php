<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Data;
use App\Models\Desa;
use App\Models\Komoditas;
use App\Models\Opt;

use App\Models\LaporanPeringatanDini;
use App\Models\DetLaporanPeringatanDini;

class LaporanPeringatanDiniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LaporanPeringatanDini::with([
            'kabupaten',
            'kecamatan',
            'periode',
            'musimTanam'
        ])
        ->orderBy(
            'id_laporan_peringatan_dini',
            'desc'
        )
        ->get();

        return view(
            'laporan_peringatan_dini.index',
            compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_data)
    {
        $data = Data::findOrFail($id_data);

        $kabupaten = DB::table('kabupaten_kota')
            ->orderBy('nama_kabupaten_kota')
            ->get();

        $kecamatan = DB::table('kecamatan')
            ->orderBy('nama_kecamatan')
            ->get();

        $desa = DB::table('desa')
            ->orderBy('nama_desa')
            ->get();

        $komoditas = DB::table('komoditas')
            ->orderBy('komoditas')
            ->get();

        $opt = DB::table('opt')
            ->orderBy('nama_opt')
            ->get();

        return view(
            'laporan_peringatan_dini.create',
            compact(
                'data',
                'kabupaten',
                'kecamatan',
                'desa',
                'komoditas',
                'opt'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try{

            $master =
            LaporanPeringatanDini::create([

                'id_kabupaten_kota'=>$request->id_kabupaten_kota[0],
                'id_kecamatan'=>$request->id_kecamatan[0],
                'id_periode'=>$request->id_periode[0],
                'id_musim_tanam'=>$request->id_musim_tanam[0],

            ]);

            foreach($request->id_desa as $i=>$v){

                DetLaporanPeringatanDini::create([

                    'id_laporan_peringatan_dini'
                        =>$master->id_laporan_peringatan_dini,

                    'id_tahun'=>$request->id_tahun[$i],

                    'id_bulan'=>$request->id_bulan[$i],

                    'id_periode'=>$request->id_periode[$i],

                    'id_kabupaten_kota'
                        =>$request->id_kabupaten_kota[$i],

                    'id_kecamatan'
                        =>$request->id_kecamatan[$i],

                    'id_desa'
                        =>$request->id_desa[$i],

                    'poktan'
                        =>$request->poktan[$i],

                    'longitude'
                        =>$request->longitude[$i],

                    'latitude'
                        =>$request->latitude[$i],

                    'id_komoditas'
                        =>$request->id_komoditas[$i],

                    'varietas'
                        =>$request->varietas[$i],

                    'umur'
                        =>$request->umur[$i],

                    'id_opt'
                        =>$request->id_opt[$i],

                    'luas_terserang'
                        =>$request->luas_terserang[$i],

                    'intens'
                        =>$request->intens[$i],

                    'kepadatan_populasi'
                        =>$request->kepadatan_populasi[$i],

                    'luas_waspada'
                        =>$request->luas_waspada[$i],

                    'tgl_pengamatan'
                        =>$request->tgl_pengamatan[$i],

                ]);

            }

            DB::commit();

            return redirect()
            ->route('laporan-peringatan-dini.index')
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
        $data =
        LaporanPeringatanDini::with([
            'detail.desa',
            'detail.komoditas',
            'detail.opt',
            'kabupaten',
            'kecamatan',
            'periode',
            'musimTanam'
        ])->findOrFail($id);

        return view(
            'laporan_peringatan_dini.detail',
            compact('data')
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
        $data =
        LaporanPeringatanDini::with('detail')
        ->findOrFail($id);

        $desa = Desa::where(
            'id_kecamatan',
            $data->id_kecamatan
        )->get();

        $komoditas = Komoditas::all();

        $opt = Opt::all();

        return view(
            'laporan_peringatan_dini.edit',
            compact(
                'data',
                'desa',
                'komoditas',
                'opt'
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

            $master =
            LaporanPeringatanDini::findOrFail($id);

            $master->update([

                'id_kabupaten_kota'=>$request->id_kabupaten_kota[0],
                'id_kecamatan'=>$request->id_kecamatan[0],
                'id_periode'=>$request->id_periode[0],
                'id_musim_tanam'=>$request->id_musim_tanam[0],

            ]);

            DetLaporanPeringatanDini::where(
                'id_laporan_peringatan_dini',
                $id
            )->delete();

            foreach($request->id_desa as $i=>$v){

                DetLaporanPeringatanDini::create([

                    'id_laporan_peringatan_dini'=>$id,

                    'id_tahun'=>$request->id_tahun[$i],
                    'id_bulan'=>$request->id_bulan[$i],
                    'id_periode'=>$request->id_periode[$i],

                    'id_kabupaten_kota'=>$request->id_kabupaten_kota[$i],
                    'id_kecamatan'=>$request->id_kecamatan[$i],
                    'id_desa'=>$request->id_desa[$i],

                    'poktan'=>$request->poktan[$i],

                    'longitude'=>$request->longitude[$i],
                    'latitude'=>$request->latitude[$i],

                    'id_komoditas'=>$request->id_komoditas[$i],

                    'varietas'=>$request->varietas[$i],

                    'umur'=>$request->umur[$i],

                    'id_opt'=>$request->id_opt[$i],

                    'luas_terserang'=>$request->luas_terserang[$i],

                    'intens'=>$request->intens[$i],

                    'kepadatan_populasi'=>$request->kepadatan_populasi[$i],

                    'luas_waspada'=>$request->luas_waspada[$i],

                    'tgl_pengamatan'=>$request->tgl_pengamatan[$i],

                ]);

            }

            DB::commit();

            return redirect()
                ->route('laporan-peringatan-dini.index')
                ->with('success','Data berhasil diupdate');

        }catch(\Exception $e){

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error',$e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DetLaporanPeringatanDini::where(
            'id_laporan_peringatan_dini',
            $id
        )->delete();

        LaporanPeringatanDini::destroy($id);

        return back()
            ->with('success','Data berhasil dihapus');
    }

    public function verifikasi($id)
    {
        $data =
        LaporanPeringatanDini::findOrFail($id);

        return view(
            'laporan_peringatan_dini.verifikasi',
            compact('data')
        );
    }

    public function prosesVerifikasi(Request $request,$id)
    {
        $data =
        LaporanPeringatanDini::findOrFail($id);

        $data->update([

            'status_verifikasi'=>$request->status_verifikasi,

            'keterangan_verifikasi'=>$request->keterangan_verifikasi,

            'verified_by'=>auth()->id(),

            'verified_at'=>now(),

        ]);

        return redirect()
            ->route('laporan-peringatan-dini.index')
            ->with('success','Verifikasi berhasil');
    }
}
