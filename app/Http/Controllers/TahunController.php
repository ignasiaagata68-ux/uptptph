<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Tahun::all();

        return view('tahun.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tahun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'tahun' => 'required'
        ]);

        Tahun::create([
            'tahun' => $request->tahun
        ]);

        return redirect('/tahun');
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
        $data = Tahun::findOrFail($id);

        return view('tahun.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Tahun::findOrFail($id);

        $data->update([
            'tahun' => $request->tahun
        ]);

        return redirect('/tahun');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Tahun::findOrFail($id);

        $data->delete();

        return redirect('/tahun');
    }
}
