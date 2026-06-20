<?php

namespace App\Http\Controllers;

use App\Models\Data;

class SpController extends Controller
{
    public function create($id_data)
    {
        $data = Data::with([
            'petugas.kecamatan.kabupaten',
            'tahun',
            'bulan',
            'periode',
            'musimTanam'
        ])->findOrFail($id_data);

        return view(
            'sp.create',
            compact('data')
        );
    }
}