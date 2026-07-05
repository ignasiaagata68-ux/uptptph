@extends('layouts.admin')

@section('title','Laporan')

@section('content')

<div class="container-fluid">

    <h2 class="fw-bold mb-4">
        Menu Laporan
    </h2>

    <div class="row">

        <div class="col-md-6">

            <a href="/laporan-opt" class="btn btn-success w-100 p-5">

                <h3>📄 Laporan OPT</h3>

                <p>Rekap seluruh data Organisme Pengganggu Tanaman.</p>

            </a>

        </div>

        <div class="col-md-6">

            <a href="/laporan-dpi" class="btn btn-primary w-100 p-5">

                <h3>🌧️ Laporan DPI</h3>

                <p>Rekap seluruh data Dampak Perubahan Iklim.</p>

            </a>

        </div>

    </div>

</div>

@endsection