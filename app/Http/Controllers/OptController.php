<?php

namespace App\Http\Controllers;

use App\Models\Opt;
use App\Models\Komoditas;
use Illuminate\Http\Request;

class OptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $opt = Opt::with('komoditas')->get();

        return view('opt.index', compact('opt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $komoditas = Komoditas::all();

        return view('opt.create', compact('komoditas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
        'id_komoditas' => 'required',
        'nama_opt'     => 'required'
        ]);

        Opt::create([
        'id_komoditas' => $request->id_komoditas,
        'nama_opt'     => $request->nama_opt
        ]);

        return redirect()->route('opt.index')
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
        $opt = Opt::findOrFail($id);

        $komoditas = Komoditas::all();

        return view('opt.edit', compact('opt', 'komoditas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $opt = Opt::findOrFail($id);

        $opt->update([
        'id_komoditas' => $request->id_komoditas,
        'nama_opt'     => $request->nama_opt
        ]);

        return redirect()->route('opt.index')
                     ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $opt = Opt::findOrFail($id);

        $opt->delete();

        return redirect()->route('opt.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
