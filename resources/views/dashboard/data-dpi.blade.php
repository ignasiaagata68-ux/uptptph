@extends('layouts.admin')

@section('title','Data DPI')

@section('content')

<div class="container-fluid">

    <h2 class="fw-bold mb-4">
        Data Dampak Perubahan Iklim (DPI)
    </h2>

    <div class="row">

        <div class="col-md-3 mb-4">
            <a href="/laporan-kerusakan-tanaman-akibat-banjir" class="btn btn-primary w-100 p-4">
                🌊<br><br>
                Kerusakan Akibat Banjir
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/laporan-kerusakan-tanaman-akibat-kekeringan" class="btn btn-primary w-100 p-4">
                ☀️<br><br>
                Kerusakan Akibat Kekeringan
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/informasi-perubahan-kategori-kekeringan" class="btn btn-primary w-100 p-4">
                🌡️<br><br>
                Perubahan Kategori Kekeringan
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/laporan-kerusakan-tanaman-akibat-fisiologis" class="btn btn-primary w-100 p-4">
                🌱<br><br>
                Kerusakan Fisiologis
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/laporan-kerusakan-tanaman-akibat-bencana-alam" class="btn btn-primary w-100 p-4">
                🌋<br><br>
                Bencana Alam
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/keadaan-curah-hujan" class="btn btn-primary w-100 p-4">
                🌧️<br><br>
                Keadaan Curah Hujan
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/laporan-peringatan-dini" class="btn btn-primary w-100 p-4">
                🚨<br><br>
                Laporan Peringatan Dini
            </a>
        </div>

    </div>

</div>

@endsection