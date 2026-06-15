<?php

namespace App\Http\Controllers;


use App\Models\Komoditas;
use Illuminate\Http\Request;

class KomoditasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Komoditas::all();

        return view('komoditas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('komoditas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'komoditas' => 'required'
        ]);

        Komoditas::create([
            'komoditas' => $request->komoditas
        ]);

        return redirect()
            ->route('komoditas.index')
            ->with('success','Data Berhasil Ditambahkan');
    }

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
         $data = Komoditas::findOrFail($id);

        return view('komoditas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $data = Komoditas::findOrFail($id);

        $data->update([
            'komoditas' => $request->komoditas
        ]);

        return redirect('/komoditas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {

        $data = Komoditas::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('komoditas.index')
            ->with('success', 'Data berhasil dihapus');

    } catch (\Exception $e) {

        return redirect()
            ->route('komoditas.index')
            ->with('error',
                'Data tidak dapat dihapus karena masih digunakan.');
    }
    }
}

