<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengirimanLaporan;

class VerifikasiPengelolaController extends Controller
{

public function index()
{
    $data = PengirimanLaporan::where('is_kirim_pengelola',1)->get();

    return view('dashboard.verifikasi', compact('data'));
}

    
}