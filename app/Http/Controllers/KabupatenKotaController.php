<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use Illuminate\Http\Request;

class KabupatenKotaController extends Controller
{
    public function index()
    {
        $data = KabupatenKota::all();

        return view('kabupaten.index', compact('data'));
    }

    public function create()
    {
        //
        return view('kabupaten.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
        'nama_kabupaten_kota' => 'required'
        ]);

        KabupatenKota::create([
        'nama_kabupaten_kota' => $request->nama_kabupaten_kota
        ]);

        return redirect()->route('kabupaten.index')
                 ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
        $data = KabupatenKota::findOrFail($id);

        return view('kabupaten.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        //
         $request->validate([
        'nama_kabupaten_kota' => 'required'
        ]);

        $data = KabupatenKota::findOrFail($id);

        $data->update([
        'nama_kabupaten_kota' => $request->nama_kabupaten_kota
        ]);

        return redirect()->route('kabupaten.index')
                        ->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        //
        try {

            $data = KabupatenKota::findOrFail($id);
            $data->delete();

        } catch (\Exception $e) {

            return redirect()
                ->route('kabupaten.index')
                ->with('error',
                    'Data tidak dapat dihapus karena masih digunakan.'
                );
        }
    }
}

