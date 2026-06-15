<?php

namespace App\Http\Controllers;

use App\Models\UserAplikasi;
use Illuminate\Http\Request;

class UserAplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = UserAplikasi::all();

        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role'     => 'required',
            'email'    => 'required'
        ]);

        UserAplikasi::create([
            'username' => $request->username,
            'password' => $request->password,
            'role'     => $request->role,
            'email'    => $request->email
        ]);

        return redirect()->route('user-aplikasi.index')
                         ->with('success','Data berhasil ditambahkan');
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
        $data = UserAplikasi::findOrFail($id);

        return view('user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = UserAplikasi::findOrFail($id);

        $data->update([
            'username' => $request->username,
            'password' => $request->password,
            'role'     => $request->role,
            'email'    => $request->email
        ]);

        return redirect()->route('user-aplikasi.index')
                         ->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = UserAplikasi::findOrFail($id);

        $data->delete();

        return redirect()->route('user-aplikasi.index')
                         ->with('success','Data berhasil dihapus');
    }
}
