@extends('layouts.admin')

@section('title','Data OPT')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4 fw-bold">
        Data Organisme Pengganggu Tanaman (OPT)
    </h2>

    <div class="row">

        <div class="col-md-3 mb-4">
            <a href="/pengamatan-persemaian-padi" class="btn btn-success w-100 p-4">
                🌱<br><br>
                Pengamatan Persemaian Padi
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/keadaan-serangan-opt" class="btn btn-success w-100 p-4">
                🐛<br><br>
                Keadaan Serangan OPT
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/keadaan-opt-pada-petak-pengamatan-tetap" class="btn btn-success w-100 p-4">
                🌾<br><br>
                Petak Pengamatan Tetap
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/tangkapan-lampu-perangkap" class="btn btn-success w-100 p-4">
                💡<br><br>
                Tangkapan Lampu Perangkap
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/kumulatif-luas-tambah-tanam-padi" class="btn btn-success w-100 p-4">
                📊<br><br>
                Kumulatif Luas Tambah Tanam
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/penggunaan-pestisida" class="btn btn-success w-100 p-4">
                🧪<br><br>
                Penggunaan Pestisida
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/pengamatan-penyebaran-dan-perkembangan-siput-murbey" class="btn btn-success w-100 p-4">
                🐌<br><br>
                Siput Murbey
            </a>
        </div>

    </div>

</div>

@endsection