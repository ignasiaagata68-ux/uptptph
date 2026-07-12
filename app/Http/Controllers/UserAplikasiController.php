<?php

namespace App\Http\Controllers;

use App\Models\UserAplikasi;
use Illuminate\Http\Request;
use App\Models\Lphp;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;

class UserAplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UserAplikasi::with([
            'lphp',
            'kabupaten',
            'kecamatan'
        ])->get();

        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lphp = Lphp::orderBy('nama_lphp')->get();

        $kabupaten = KabupatenKota::orderBy('nama_kabupaten_kota')->get();

        return view('user.create', compact(
            'lphp',
            'kabupaten'
        ));
    }

    public function getKecamatan($idKabupaten)
    {
        $kecamatan = Kecamatan::where('id_kabupaten_kota', $idKabupaten)
                        ->orderBy('nama_kecamatan')
                        ->get();

        return response()->json($kecamatan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user,username',
            'password' => 'required',
            'email'    => 'required|email|unique:user,email',
            'role'     => 'required',
            'status'   => 'required',

            'id_lphp' => 'required_if:role,lphp',
            'id_kabupaten' => 'required_if:role,popt',
            'id_kecamatan' => 'required_if:role,popt',
        ]);

        $user = UserAplikasi::create([
            'username'      => $request->username,
            'password'      => bcrypt($request->password),
            'email'         => $request->email,
            'role'          => $request->role,
            'status'        => $request->status,
            'id_lphp'       => $request->id_lphp,
            'id_kabupaten'  => $request->id_kabupaten,
            'id_kecamatan'  => $request->id_kecamatan,
        ]);
        
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
    public function edit($id)
    {
        $data = UserAplikasi::findOrFail($id);

        $lphp = Lphp::orderBy('nama_lphp')->get();

        $kabupaten = KabupatenKota::orderBy('nama_kabupaten_kota')->get();

        $kecamatan = Kecamatan::where(
            'id_kabupaten_kota',
            $data->id_kabupaten
        )->orderBy('nama_kecamatan')->get();

        return view('user.edit', compact(
            'data',
            'lphp',
            'kabupaten',
            'kecamatan'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|unique:user,username,' . $id . ',id_user',
            'email' => 'required|email|unique:user,email,' . $id . ',id_user',
            'role' => 'required',
            'status' => 'required',

            'id_lphp' => 'required_if:role,lphp',
            'id_kabupaten' => 'required_if:role,popt',
            'id_kecamatan' => 'required_if:role,popt',
        ]);

        $data = UserAplikasi::findOrFail($id);

        $data->username = $request->username;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->status = $request->status;

        $data->id_lphp = $request->id_lphp;
        $data->id_kabupaten = $request->id_kabupaten;
        $data->id_kecamatan = $request->id_kecamatan;

        // Password hanya diubah jika diisi
        if ($request->filled('password')) {
            $data->password = bcrypt($request->password);
        }

        $data->save();

        return redirect()
            ->route('user-aplikasi.index')
            ->with('success', 'Data berhasil diupdate');
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
