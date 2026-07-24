<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tahun;
use App\Models\Bulan;
use App\Models\Periode;
use App\Models\PengirimanLaporan;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Komoditas;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class RekapLaporanController extends Controller
{
    public function index()
    {
        $tahun = Tahun::all();

        $bulan = Bulan::all();

        $periode = Periode::all();

        $kabupaten = KabupatenKota::orderBy('nama_kabupaten_kota')->get();

        $kecamatan = Kecamatan::orderBy('nama_kecamatan')->get();

        $komoditas = Komoditas::orderBy('komoditas')->get();

        return view(
            'rekap.index',
            compact(
                'tahun',
                'bulan',
                'periode',
                'kabupaten',
                'kecamatan',
                'komoditas'
            )
        );
    }

    public function generate(Request $request)
    {
        switch ($request->jenis) {

            case 'pengamatan_persemaian_padi':
                return $this->rekapPengamatanPersemaianPadi($request);

            case 'keadaan_serangan_opt':
                return $this->rekapKeadaanSeranganOPT($request);

            case 'keadaan_opt_pada_petak_pengamatan_tetap':
                return $this->rekapKeadaanOptPadaPetakPengamatanOpt($request);

            case 'laporan_kerusakan_tanaman_akibat_banjir':
                return $this->rekapLaporankerusakanTanamanAkibatBanjir($request);

            case 'laporan_kerusakan_tanaman_akibat_kekeringan':
                return $this->rekapLaporankerusakanTanamanAkibatKekeringan($request);

            case 'informasi_perubahan_kategori_kekeringan':
                return $this->rekapInformasiPerubahanKategoriKekeringan($request);

            case 'laporan_kerusakan_tanaman_akibat_fisiologis':
                return $this->rekapLaporankerusakanTanamanAkibatFisiologis($request);

            case 'laporan_kerusakan_tanaman_akibat_bencana_alam':
                return $this->rekapLaporankerusakanTanamanAkibatBencanaAlam($request);

            case 'tangkapan_lampu_perangkap':
                return $this->rekapTangkapanLampuPerangkap($request);

            case 'kumulatif_luas_tambah_tanam_padi':
                return $this->rekapKumulatifLuasTambahTanamPadi($request);

            case 'penggunaan_pestisida':
                return $this->rekapPenggunaanPestisida($request);

            case 'keadaan_curah_hujan':
                return $this->rekapKeadaanCurahHujan($request);

            case 'pengamatan_penyebaran_dan_perkembangan_siput_murbey':
                return $this->rekapPengamatanPenyeranganDanPerkembanganSiputMurbey($request);

            case 'laporan_peringatan_dini':
                return $this->rekapLaporanPeringatanDini($request);

            default:
                return back()->with('error', 'Jenis laporan tidak ditemukan.');
        }
    }

    public function getKecamatan($id_kabupaten)
    {
        $kecamatan = DB::table('kecamatan')
            ->where('id_kabupaten_kota', $id_kabupaten)
            ->orderBy('nama_kecamatan')
            ->get([
                'id_kecamatan',
                'nama_kecamatan'
            ]);

        return response()->json($kecamatan);
    }

    public function exportPdf(Request $request)
    {
        $data = $this->getRekapKeadaanSeranganOPT($request);

        $pdf = Pdf::loadView(
            'rekap.pdf.keadaan_serangan_opt',
            [
                'header' => $data['header'],
                'detail' => $data['detail'],
            ]
        );

        $pdf->setPaper('a3', 'landscape');

        return $pdf->download('Rekap_Keadaan_Serangan_OPT.pdf');
    }

    public function exportExcel(Request $request)
    {
        return 'Export Excel berhasil terhubung';
    }
    private function rekapPengamatanPersemaianPadi(Request $request)
    {
        //
    }

    private function getRekapKeadaanSeranganOPT(Request $request)
    {
        // =====================================================
        // 1. Ambil id_data sesuai filter
        // =====================================================

        $dataFilter = DB::table('data')

            ->when($request->id_tahun, function ($q) use ($request) {
                $q->where('id_tahun', $request->id_tahun);
            })

            ->when($request->id_bulan, function ($q) use ($request) {
                $q->where('id_bulan', $request->id_bulan);
            })

            ->when($request->id_periode, function ($q) use ($request) {
                $q->where('id_periode', $request->id_periode);
            })

            ->pluck('id_data');

        // =====================================================
        // 2. Ambil id_data yang sudah dikirim ke Pengelola
        // =====================================================

        $idData = DB::table('pengiriman_laporan')

            ->where('status', 'terverifikasi')
            ->where('is_kirim_pengelola', 1)
            ->whereIn('id_data', $dataFilter)

            ->pluck('id_data');

        // =====================================================
        // 3. Jika tidak ada data
        // =====================================================

        if ($idData->isEmpty()) {

            return view(
                'rekap.hasil_keadaan_serangan_opt',
                [
                    'header' => null,
                    'detail' => collect(),
                ]
            );
        }

        // =====================================================
        // 4. Header
        // =====================================================

        $header = new \stdClass();

        $header->nama_kabupaten_kota = 'Semua Kabupaten/Kota';

        $header->nama_kecamatan = 'Semua Kecamatan';

        $header->periode_pengamatan = '-';

        $header->musim_tanam = '-';

        if ($request->id_kabupaten_kota) {

            $kab = DB::table('kabupaten_kota')

                ->where(
                    'id_kabupaten_kota',
                    $request->id_kabupaten_kota
                )

                ->first();

            if ($kab) {

                $header->nama_kabupaten_kota =
                    $kab->nama_kabupaten_kota;

            }

        }

        if ($request->id_kecamatan) {

            $kec = DB::table('kecamatan')

                ->where(
                    'id_kecamatan',
                    $request->id_kecamatan
                )

                ->first();

            if ($kec) {

                $header->nama_kecamatan =
                    $kec->nama_kecamatan;

            }

        }

        if ($request->id_periode) {

            $periode = DB::table('periode')

                ->where(
                    'id_periode',
                    $request->id_periode
                )

                ->first();

            if ($periode) {

                $header->periode_pengamatan =
                    $periode->periode_pengamatan;

            }

        }

        $dataHeader = DB::table('data')
            ->whereIn('id_data', $idData)
            ->first();

        if ($dataHeader && $dataHeader->id_musim_tanam) {

            $musim = DB::table('musim_tanam')
                ->where('id_musim_tanam', $dataHeader->id_musim_tanam)
                ->first();

            if ($musim) {
                $header->musim_tanam = $musim->musim_tanam;
            }
        }
        // =====================================================
        // 5. Ambil seluruh id header
        // =====================================================

        $idHeader = DB::table('keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan')

            ->whereIn('id_data', $idData)

            ->pluck('id_keadaan_serangan_opt_dan_pengendalian_di_wilayah');

        // =====================================================
        // 6. Detail
        // =====================================================

        $detail = DB::table('det_keadaan_serangan_opt_dan_pengendalian_di_wilayah_pengamatan as det')

            ->leftJoin('kabupaten_kota as kab', 'kab.id_kabupaten_kota', '=', 'det.id_kabupaten_kota')
            ->leftJoin('kecamatan as kec', 'kec.id_kecamatan', '=', 'det.id_kecamatan')
            ->leftJoin('desa as ds', 'ds.id_desa', '=', 'det.id_desa')
            ->leftJoin('komoditas as kom', 'kom.id_komoditas', '=', 'det.id_komoditas')
            ->leftJoin('opt', 'opt.id_opt', '=', 'det.id_opt')

            ->whereIn(
                'det.id_keadaan_serangan_opt_dan_pengendalian_di_wilayah',
                $idHeader
            )

            ->when($request->id_kabupaten_kota, function ($q) use ($request) {

                $q->where(
                    'det.id_kabupaten_kota',
                    $request->id_kabupaten_kota
                );

            })

            ->when($request->id_kecamatan, function ($q) use ($request) {

                $q->where(
                    'det.id_kecamatan',
                    $request->id_kecamatan
                );

            })

            ->when($request->id_komoditas, function ($q) use ($request) {

                $q->where(
                    'det.id_komoditas',
                    $request->id_komoditas
                );

            })

            ->select(
                'det.*',

                'kab.nama_kabupaten_kota',
                'kec.nama_kecamatan',
                'ds.nama_desa',
                'kom.komoditas',
                'opt.nama_opt'
            )

            ->get();

        // =====================================================
        // 7. Tampilkan View
        // =====================================================

        return [
            'header' => $header,
            'detail' => $detail,
        ];
    }

    private function rekapKeadaanSeranganOPT(Request $request)
    {
        $data = $this->getRekapKeadaanSeranganOPT($request);

        return view(
            'rekap.hasil_keadaan_serangan_opt',
            [
                'header' => $data['header'],
                'detail' => $data['detail'],
            ]
        );
    }


private function rekapKeadaanOptPadaPetakPengamatanOpt(Request $request)
{
    //
}

private function rekapLaporankerusakanTanamanAkibatBanjir(Request $request)
{
    //
}

private function rekapLaporankerusakanTanamanAkibatKekeringan(Request $request)
{
    //
}

private function rekapInformasiPerubahanKategoriKekeringan(Request $request)
{
    //
}

private function rekapLaporankerusakanTanamanAkibatFisiologis(Request $request)
{
    //
}

private function rekapLaporankerusakanTanamanAkibatBencanaAlam(Request $request)
{
    //
}

private function rekapTangkapanLampuPerangkap(Request $request)
{
    //
}

private function rekapKumulatifLuasTambahTanamPadi(Request $request)
{
    //
}

private function rekapPenggunaanPestisida(Request $request)
{
    //
}

private function rekapKeadaanCurahHujan(Request $request)
{
    //
}

private function rekapPengamatanPenyeranganDanPerkembanganSiputMurbey(Request $request)
{
    //
}

private function rekapLaporanPeringatanDini(Request $request)
{
    //
}
}