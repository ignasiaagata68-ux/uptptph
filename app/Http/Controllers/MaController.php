<?php

namespace App\Http\Controllers;

use App\Models\Ma;
use Illuminate\Http\Request;

class MaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ma = Ma::all();

        return view('ma.index', compact('ma'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ma.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_ma' => 'required'
        ]);

        Ma::create([
            'nama_ma' => $request->nama_ma
        ]);

        return redirect()->route('ma.index')
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
        $ma = Ma::findOrFail($id);

        return view('ma.edit', compact('ma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_ma' => 'required'
        ]);

        $ma = Ma::findOrFail($id);

        $ma->update([
            'nama_ma' => $request->nama_ma
        ]);

        return redirect()->route('ma.index')
                         ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $ma = Ma::findOrFail($id);

        $ma->delete();

        return redirect()->route('ma.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
