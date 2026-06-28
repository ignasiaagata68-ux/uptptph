<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Desa;
use App\Models\KelompokTani;
use App\Models\Ma;
use Illuminate\Http\Request;
use App\Models\PengamatanPersemaianPadi;
use App\Models\DetPengamatanPersemaianPadi;
use Illuminate\Support\Facades\DB;

class PengamatanPersemaianPadiController extends Controller
{
    public function index()
    {
        $data = PengamatanPersemaianPadi::leftJoin(
            'det_pengamatan_persemaian_padi',
            'pengamatan_persemaian_padi.id_pengamatan_persemaian_padi',
            '=',
            'det_pengamatan_persemaian_padi.id_pengamatan_persemaian_padi'
        )
        ->select(
            'pengamatan_persemaian_padi.*',
            'det_pengamatan_persemaian_padi.status_verifikasi',
            'det_pengamatan_persemaian_padi.keterangan_verifikasi'
        )
        ->latest('pengamatan_persemaian_padi.id_pengamatan_persemaian_padi')
        ->get();

        return view(
            'pengamatan_persemaian_padi.index',
            compact('data')
        );
    }

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
        )->orderBy('nama_desa')->get();

        $kelompokTani = collect();

        $ma = Ma::orderBy('nama_ma')->get();

        $kelompokTani = KelompokTani::orderBy('nama_kelompok')->get();

        return view(
            'pengamatan_persemaian_padi.create',
            compact(
                'data',
                'desa',
                'kelompokTani',
                'ma'
            )
        );
    }

     public function store(Request $request)
        {

            $header = PengamatanPersemaianPadi::create([

            'id_kabupaten_kota' => $request->id_kabupaten_kota,
            'id_kecamatan'      => $request->id_kecamatan,
            'id_desa'           => $request->id_desa,
            'petak_pengamatan'  => $request->petak_pengamatan,
            'id_kelompok_tani'  => $request->id_kelompok_tani,
            'tgl_pengamatan'    => $request->tgl_pengamatan,
            'id_petugas'        => $request->id_petugas

            ]);
        
        
            for ($i = 0; $i < count($request->no_persemaian); $i++) {

            if (
                empty($request->no_persemaian[$i]) &&
                empty($request->luas[$i]) &&
                empty($request->umur[$i]) &&
                empty($request->varietas[$i]) &&
                empty($request->pop_ayunan_wbc[$i]) &&
                empty($request->wdh[$i]) &&
                empty($request->id_ma[$i]) &&
                empty($request->pop_kt_pbp[$i]) &&
                empty($request->tikus[$i]) &&
                empty($request->pbp[$i]) &&
                empty($request->penyakit[$i]) &&
                empty($request->wbc[$i])
            ) {
                continue;
            }

            DB::table('det_pengamatan_persemaian_padi')->insert([
                'id_pengamatan_persemaian_padi' => $header->id_pengamatan_persemaian_padi,
                'no_persemaian' => $request->no_persemaian[$i],
                'luas' => $request->luas[$i],
                'umur' => $request->umur[$i],
                'varietas' => $request->varietas[$i],
                'pop_ayunan_wbc' => $request->pop_ayunan_wbc[$i],
                'wdh' => $request->wdh[$i],
                'id_ma' => $request->id_ma[$i],
                'pop_kt_pbp' => $request->pop_kt_pbp[$i],
                'tikus' => $request->tikus[$i],
                'pbp' => $request->pbp[$i],
                'penyakit' => $request->penyakit[$i],
                'wbc' => $request->wbc[$i],
                'status_verifikasi' => 'menunggu'
            ]);
        }

        return redirect()
            ->route('pengamatan-persemaian-padi.index')
            ->with(
                'success',
                'Data berhasil disimpan'
            );
        }

    public function show($id)
    {
        $header = PengamatanPersemaianPadi::findOrFail($id);

        $detail = DB::table('det_pengamatan_persemaian_padi as d')
            ->leftJoin('ma as m', 'm.id_ma', '=', 'd.id_ma')
            ->select(
                'd.*',
                'm.nama_ma'
            )
            ->where(
                'd.id_pengamatan_persemaian_padi',
                $id
            )
            ->get();

        return view(
            'pengamatan_persemaian_padi.show',
            compact(
                'header',
                'detail'
            )
        );
    }

    public function edit($id)
    {
        $header = PengamatanPersemaianPadi::findOrFail($id);

        $detail = DB::table('det_pengamatan_persemaian_padi as d')
            ->leftJoin('ma as m', 'm.id_ma', '=', 'd.id_ma')
            ->select(
                'd.*',
                'm.nama_ma'
            )
            ->where('d.id_pengamatan_persemaian_padi', $id)
            ->get();

        $ma = Ma::all();

        return view(
            'pengamatan_persemaian_padi.edit',
            compact(
                'header',
                'detail',
                'ma'
            )
        );
    }

     public function update(Request $request, $id)
        {
            for ($i = 0; $i < count($request->id_detail); $i++) {

                DetPengamatanPersemaianPadi::where(
                    'id_det_pengamatan_persemaian_padi',
                    $request->id_detail[$i]
                )->update([

                    'no_persemaian' => $request->no_persemaian[$i],
                    'luas' => $request->luas[$i],
                    'umur' => $request->umur[$i],
                    'varietas' => $request->varietas[$i],
                    'pop_ayunan_wbc' => $request->pop_ayunan_wbc[$i],
                    'wdh' => $request->wdh[$i],
                    'id_ma' => $request->id_ma[$i],
                    'tikus' => $request->tikus[$i],
                    'pop_kt_pbp' => $request->pop_kt_pbp[$i],
                    'pbp' => $request->pbp[$i],
                    'penyakit' => $request->penyakit[$i],
                    'wbc' => $request->wbc[$i],

                ]);
            }

            return redirect()
                ->route('pengamatan-persemaian-padi.index')
                ->with(
                    'success',
                    'Data berhasil diupdate'
                );
        }
    public function getKelompokTani($id_desa)
    {
        $kelompok = KelompokTani::where(
            'id_desa',
            $id_desa
        )
        ->orderBy('nama_kelompok')
        ->get([
            'id_kelompok_tani',
            'nama_kelompok'
        ]);

        return response()->json($kelompok);
    }
    
}