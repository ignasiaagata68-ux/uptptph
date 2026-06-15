<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Desa::with('kecamatan')->get();

        return view('desa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kecamatan = Kecamatan::all();

        return view('desa.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_desa' => 'required',
            'id_kecamatan' => 'required'
        ]);

        Desa::create([
            'nama_desa' => $request->nama_desa,
            'id_kecamatan' => $request->id_kecamatan
        ]);

        return redirect()
                ->route('desa.index')
                ->with('success','Data Berhasil Ditambahkan');
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
        $data = Desa::findOrFail($id);

        $kecamatan = Kecamatan::all();

        return view(
            'desa.edit',
            compact('data','kecamatan')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Desa::findOrFail($id);

        $data->update([
            'nama_desa' => $request->nama_desa,
            'id_kecamatan' => $request->id_kecamatan
        ]);

        return redirect('/desa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

        $data = Desa::findOrFail($id);

        $data->delete();

        return redirect()
                ->route('desa.index')
                ->with(
                    'success',
                    'Data desa berhasil dihapus.'
                );

    } catch (Exception $e) {

        $pesanError = $e->getMessage();

        $namaTabel = 'data lain';

        if (preg_match('/fails \\(`[^`]+`\\.`([^`]+)`/', $pesanError, $match)) {

            $namaTabel = $match[1];

            $namaTabel = str_replace('_', ' ', $namaTabel);

            $namaTabel = ucwords($namaTabel);
        }

        return redirect()
                ->route('desa.index')
                ->with(
                    'error',
                    'Data tidak dapat dihapus karena masih digunakan pada ' . $namaTabel . '.'
                );


    }
}
}