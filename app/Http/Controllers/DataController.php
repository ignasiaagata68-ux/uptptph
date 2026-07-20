<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Petugas;
use App\Models\PengirimanLaporan;
use App\Models\Tahun;
use App\Models\Bulan;
use App\Models\Periode;
use App\Models\MusimTanam;
use Illuminate\Http\Request;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //      $data = Data::with([
    //     'petugas',
    //     'tahun',
    //     'bulan',
    //     'periode',
    //     'musimTanam'
    // ])->get();

    // return view('data.index', compact('data'));
    // }
    public function index()
    {
        if (session('role') == 'popt') {

            $petugas = Petugas::where(
                'id_user',
                session('id_user')
            )->first();

            $data = Data::with([
                'petugas',
                'tahun',
                'bulan',
                'periode',
                'musimTanam'
            ])
            ->where('id_petugas', $petugas->id_petugas)
            ->latest('id_data')
            ->get();

        } else {

            // LPHP dan Pengelola melihat semua data
            $data = Data::with([
                'petugas',
                'tahun',
                'bulan',
                'periode',
                'musimTanam'
            ])
            ->latest('id_data')
            ->get();

        }

        return view('data.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $userId = session('id_user');

    $petugas = Petugas::with('kecamatan.kabupaten')
        ->where('id_user', $userId)
        ->first();

    $tahun = Tahun::all();
    $bulan = Bulan::all();
    $periode = Periode::all();
    $musimTanam = MusimTanam::all();

    // Tahun aktif
    $tahunAktif = Tahun::where(
        'tahun',
        date('Y')
    )->first();

    // Bulan aktif
    $namaBulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    $bulanAktif = Bulan::where(
        'bulan',
        $namaBulan[date('n')]
    )->first();

    // Periode aktif
    $hari = date('d');

    if ($hari <= 15) {
        $periodeAktif = Periode::find(1);
    } else {
        $periodeAktif = Periode::find(2);
    }

    // Cek apakah laporan periode ini sudah ada
    $dataSudahAda = Data::where('id_petugas', $petugas->id_petugas)
        ->where('id_tahun', $tahunAktif->id_tahun)
        ->where('id_bulan', $bulanAktif->id_bulan)
        ->where('id_periode', $periodeAktif->id_periode)
        ->first();

    // Jika sudah ada, buka lagi laporan tersebut
    if ($dataSudahAda) {

        return redirect()->route(
            'sp.create',
            $dataSudahAda->id_data
        );

    }
    // Jika belum ada, tampilkan form Data
    return view(
        'data.create',
        compact(
            'petugas',
            'tahun',
            'bulan',
            'periode',
            'musimTanam',
            'tahunAktif',
            'bulanAktif',
            'periodeAktif'
        )
    );
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
        'id_petugas'      => 'required',
        'id_tahun'        => 'required',
        'id_bulan'        => 'required',
        'id_periode'      => 'required',
        'id_musim_tanam'  => 'required',
        'tanggal_laporan' => 'required'
    ]);

    $data = Data::where('id_petugas', $request->id_petugas)
    ->where('id_tahun', $request->id_tahun)
    ->where('id_bulan', $request->id_bulan)
    ->where('id_periode', $request->id_periode)
    ->first();

    if ($data) {

        return redirect()->route(
            'sp.create',
            $data->id_data
        );

    }
    $data = Data::create([

    'id_petugas'      => $request->id_petugas,
    'id_tahun'        => $request->id_tahun,
    'id_bulan'        => $request->id_bulan,
    'id_periode'      => $request->id_periode,
    'id_musim_tanam'  => $request->id_musim_tanam,
    'tanggal_laporan' => $request->tanggal_laporan
    ]);

    PengirimanLaporan::create([

    'id_data' => $data->id_data,

    'status' => 'Draft',

    'komentar' => null,

    'tanggal_kirim' => null,

    'tanggal_verifikasi' => null,

    'id_user_lphp' => null

    ]);

    return redirect()
        ->route('sp.create', $data->id_data);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
