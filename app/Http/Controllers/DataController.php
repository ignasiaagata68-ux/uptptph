<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Petugas;
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
    public function index()
    {
        //
         $data = Data::with([
        'petugas',
        'tahun',
        'bulan',
        'periode',
        'musimTanam'
    ])->get();

    return view('data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         $userId = session('id_user');

        dd($userId);

        $petugas = Petugas::with(
            'kecamatan.kabupaten'
        )
        ->where('id_user', $userId)
        ->first();
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

    Data::create([
        'id_petugas'      => $request->id_petugas,
        'id_tahun'        => $request->id_tahun,
        'id_bulan'        => $request->id_bulan,
        'id_periode'      => $request->id_periode,
        'id_musim_tanam'  => $request->id_musim_tanam,
        'tanggal_laporan' => $request->tanggal_laporan
    ]);

    return redirect()
        ->route('data.index')
        ->with('success', 'Data berhasil ditambahkan');
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
