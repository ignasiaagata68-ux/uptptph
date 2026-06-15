<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use Illuminate\Http\Request;

class BulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Bulan::all();

        return view('bulan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('bulan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'bulan' => 'required'
        ]);

        Bulan::create([
            'bulan' => $request->bulan
        ]);

        return redirect('/bulan');
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
        $data = Bulan::findOrFail($id);

        return view('bulan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = Bulan::findOrFail($id);

        $data->update([
            'bulan' => $request->bulan
        ]);

        return redirect('/bulan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {

        $data = Bulan::findOrFail($id);

        $data->delete();

        return redirect()
                ->route('bulan.index')
                ->with(
                    'success',
                    'Data berhasil dihapus'
                );

        } catch (\Throwable $e) {

            return redirect()
                    ->route('bulan.index')
                    ->with(
                        'error',
                        'Data tidak dapat dihapus karena masih digunakan.'
                    );

        }
    }
}
