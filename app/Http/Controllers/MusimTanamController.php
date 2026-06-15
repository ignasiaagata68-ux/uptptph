<?php

namespace App\Http\Controllers;

use App\Models\MusimTanam;
use Illuminate\Http\Request;

class MusimTanamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = MusimTanam::all();

        return view('musim_tanam.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('musim_tanam.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'musim_tanam' => 'required'
        ]);

        MusimTanam::create([
            'musim_tanam' => $request->musim_tanam
        ]);

        return redirect('/musim_tanam');
    }

    /**
     * Store a newly created resource in storage.
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
        $data = MusimTanam::findOrFail($id);

        return view('musim_tanam.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = MusimTanam::findOrFail($id);

        $data->update([
            'musim_tanam' => $request->musim_tanam
        ]);

        return redirect('/musim_tanam');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $data = MusimTanam::findOrFail($id);

        $data->delete();

        return redirect('/musim_tanam');
    
    }
}
