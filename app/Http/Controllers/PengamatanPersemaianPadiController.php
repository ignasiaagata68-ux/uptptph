<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Desa;
use App\Models\Petugas;
use App\Models\KelompokTani;
use App\Models\Ma;
use App\Models\PengirimanLaporan;
use Illuminate\Http\Request;
use App\Models\PengamatanPersemaianPadi;
use App\Models\DetPengamatanPersemaianPadi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SpController;

class PengamatanPersemaianPadiController extends Controller
{
    public function index()
    {
        $petugas = Petugas::where(
            'id_user',
            session('id_user')
        )->first();

        if (!$petugas) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data petugas tidak ditemukan.'
                );

        }

        $data = PengamatanPersemaianPadi::with([
            'kabupaten',
            'kecamatan',
            'desa',
            'kelompokTani',
            'petugas'
        ])
        ->where(
            'id_petugas',
            $petugas->id_petugas
        )
        ->latest('id_pengamatan_persemaian_padi')
        ->get();

        return view(
            'pengamatan_persemaian_padi.index',
            compact('data')
        );
    }

    public function create($id_data)
    {
        $statusLaporan = PengirimanLaporan::where(
            'id_data',
            $id_data
        )->first();

        $header = PengamatanPersemaianPadi::where(
            'id_data',
            $id_data
        )->first();

        if ($header) {

            return redirect()->route(
                'pengamatan-persemaian-padi.show',
                $header->id_pengamatan_persemaian_padi
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
        )->orderBy('nama_desa')->get();

       $kelompokTani = KelompokTani::orderBy('nama_kelompok')->get();

        $ma = Ma::orderBy('nama_ma')->get();

        return view(
            'pengamatan_persemaian_padi.create',
            compact(
                'data',
                'desa',
                'kelompokTani',
                'ma',
                'statusLaporan'
            )
        );
    }

     public function store(Request $request)
        {
            $header = PengamatanPersemaianPadi::create([

            'id_data' => $request->id_data,

            'id_kabupaten_kota' => $request->id_kabupaten_kota,
            'id_kecamatan' => $request->id_kecamatan,
            'id_desa' => $request->id_desa,
            'petak_pengamatan' => $request->petak_pengamatan,
            'id_kelompok_tani' => $request->id_kelompok_tani,
            'tgl_pengamatan' => $request->tgl_pengamatan,
            'id_petugas' => $request->id_petugas

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
        ->route('sp.create', $request->id_data)
        ->with(
            'success',
            'Data berhasil disimpan'
        );
        } 

    public function show($id)
    {
       $header = PengamatanPersemaianPadi::with([
            'kabupaten',
            'kecamatan',
            'desa',
            'kelompokTani',
            'petugas'
        ])->findOrFail($id);

        $statusPengiriman = PengirimanLaporan::where(
            'id_data',
            $header->id_data
        )->first();

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
                'detail',
                'statusPengiriman'
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
    $header = PengamatanPersemaianPadi::findOrFail($id);

    for ($i = 0; $i < count($request->no_persemaian); $i++) {

        // Jika semua kolom kosong, lewati
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

        // Jika id_detail ada → UPDATE
        if (!empty($request->id_detail[$i])) {

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

                'status_verifikasi' => 'menunggu',
                'keterangan_verifikasi' => null,
                'verified_by' => null,
                'verified_at' => null,
            ]);

        } else {

            // Jika id_detail kosong → INSERT
            DetPengamatanPersemaianPadi::create([

                'id_pengamatan_persemaian_padi' => $header->id_pengamatan_persemaian_padi,

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

                'status_verifikasi' => 'menunggu',
                'keterangan_verifikasi' => null,
                'verified_by' => null,
                'verified_at' => null,
            ]);
        }
    }

    return redirect()
        ->route('pengamatan-persemaian-padi.show', $id)
        ->with('success', 'Data berhasil diupdate');
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

    private function decimal($value)
    {
        if ($value === null || $value === '') {
            return null;
        }

        return str_replace(',', '.', $value);
    }
    
    public function prosesVerifikasi(Request $request, $id)
    {
        foreach ($request->id_detail as $idDetail) {

            $updated = DetPengamatanPersemaianPadi::where(
                'id_det_pengamatan_persemaian_padi',
                $idDetail
            )->update([
                'status_verifikasi' => $request->status_verifikasi[$idDetail],
                'keterangan_verifikasi' => $request->keterangan_verifikasi[$idDetail] ?? null,
                'verified_by' => session('id_user'),
                'verified_at' => now()
            ]);

        }

        $header = PengamatanPersemaianPadi::findOrFail($id);

        $spController = new SpController();
        $spController->cekStatusPengiriman($header->id_data);


        return redirect()
            ->route('pengamatan-persemaian-padi.show', $id)
            ->with('success', 'Verifikasi berhasil disimpan.');
    }
}