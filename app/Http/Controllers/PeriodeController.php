<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Periode::all();

        return view('periode.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'periode_pengamatan' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'deadline_pelaporan' => 'required'
        ]);

        Periode::create([
            'periode_pengamatan' => $request->periode_pengamatan,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'deadline_pelaporan' => $request->deadline_pelaporan
        ]);

        return redirect()->route('periode.index')
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
        $data = Periode::findOrFail($id);

        return view('periode.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Periode::findOrFail($id);

        $data->update([
            'periode_pengamatan' => $request->periode_pengamatan,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'deadline_pelaporan' => $request->deadline_pelaporan
        ]);

        return redirect()->route('periode.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Periode::findOrFail($id);

        $data->delete();

        return redirect()->route('periode.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
