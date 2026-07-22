<?php

namespace App\Http\Controllers\LPHP;

use App\Http\Controllers\Controller;

class DashboardLphpController extends Controller
{
    public function index()
    {
        return view('dashboard.lphp', [
            'jumlahPengamatan' => 0,
        ]);
    }
}