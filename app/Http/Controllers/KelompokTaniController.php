<?php

namespace App\Http\Controllers;

use App\Models\KelompokTani;
use App\Models\Desa;
use Illuminate\Http\Request;

class KelompokTaniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kelompok = KelompokTani::all();

        return view('kelompok_tani.index', compact('kelompok'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $desa = Desa::all();

        return view('kelompok_tani.create', compact('desa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
        'nama_kelompok' => 'required',
        'nama_ketua' => 'required',
        'alamat' => 'required',
        'id_desa' => 'required'
        ]);

        KelompokTani::create([
        'nama_kelompok' => $request->nama_kelompok,
        'nama_ketua' => $request->nama_ketua,
        'alamat' => $request->alamat,
        'id_desa' => $request->id_desa
        ]);

        return redirect()->route('kelompok-tani.index');
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
         $kelompok = KelompokTani::findOrFail($id);

        $desa = Desa::all();

        return view('kelompok_tani.edit', compact('kelompok', 'desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $request->validate([
        'nama_kelompok' => 'required',
        'nama_ketua'    => 'required',
        'alamat'        => 'required',
        'id_desa'       => 'required'
        ]);

        $kelompok = KelompokTani::findOrFail($id);

        $kelompok->update([
        'nama_kelompok' => $request->nama_kelompok,
        'nama_ketua'    => $request->nama_ketua,
        'alamat'        => $request->alamat,
        'id_desa'       => $request->id_desa
        ]);

        return redirect()->route('kelompok-tani.index')
                     ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kelompok = KelompokTani::findOrFail($id);

        $kelompok->delete();

        return redirect()->route('kelompok-tani.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
