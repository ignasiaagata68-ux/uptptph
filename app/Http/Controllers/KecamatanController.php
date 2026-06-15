<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kecamatan;
use App\Models\KabupatenKota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Kecamatan::with('kabupaten')->get();
        return view('kecamatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kabupaten = KabupatenKota::all();
        return view('kecamatan.create',compact('kabupaten'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_kecamatan' => 'required',
            'id_kabupaten_kota' => 'required'
        ]);

        Kecamatan::create([
            'nama_kecamatan' => $request->nama_kecamatan,
            'id_kabupaten_kota' => $request->id_kabupaten_kota
        ]);

        return redirect()
            ->route('kecamatan.index')
            ->with('success', 'Data Berhasil Ditambahkan');
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
         $data = Kecamatan::findOrFail($id);

        $kabupaten = KabupatenKota::all();

        return view(
            'kecamatan.edit',
            compact('data', 'kabupaten')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Kecamatan::findOrFail($id);
        $data->update([
            'nama_kecamatan' => $request->nama_kecamatan,
            'id_kabupaten_kota' => $request->id_kabupaten_kota
        ]);

        return redirect('/kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $data = Kecamatan::findOrFail($id);

            $data->delete();

            return redirect()
                    ->route('kecamatan.index')
                    ->with(
                        'success',
                        'Data kecamatan berhasil dihapus.'
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
                    ->route('kecamatan.index')
                    ->with(
                        'error',
                        'Data tidak dapat dihapus karena masih digunakan pada ' . $namaTabel . '.'
                    );
            }
    }
}
