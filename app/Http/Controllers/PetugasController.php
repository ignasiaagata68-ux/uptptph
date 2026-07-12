<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\UserAplikasi;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Petugas::with(['user','kecamatan'])->get();

        return view('petugas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = UserAplikasi::where('role', 'popt')->get();
        $kecamatan = Kecamatan::all();

        return view(
            'petugas.create',
            compact('user','kecamatan')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'NIP' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'id_user' => 'required',
            'id_kecamatan' => 'required'
        ]);

        Petugas::create([
            'nama' => $request->nama,
            'NIP' => $request->NIP,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'id_user' => $request->id_user,
            'id_kecamatan' => $request->id_kecamatan
        ]);

        return redirect()
            ->route('petugas.index')
            ->with('success','Data berhasil ditambahkan');
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
        $data = Petugas::findOrFail($id);

        $user = UserAplikasi::all();

        $kecamatan = Kecamatan::all();

        return view(
            'petugas.edit',
            compact(
                'data',
                'user',
                'kecamatan'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Petugas::findOrFail($id);

        $data->update([
            'nama' => $request->nama,
            'NIP' => $request->NIP,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'id_user' => $request->id_user,
            'id_kecamatan' => $request->id_kecamatan
        ]);

        return redirect()
            ->route('petugas.index')
            ->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Petugas::findOrFail($id);

        $data->delete();

        return redirect()
            ->route('petugas.index')
            ->with('success','Data berhasil dihapus');
    }
}
