@extends('layouts.admin')

@section('title','Data Pengamatan')

@section('content')

<div class="container mt-4">

    <h2>Data Pengamatan</h2>

    <div class="row">

        <div class="col-md-4 mb-3">
            <a href="/data" class="btn btn-primary w-100">
                Data
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="/sp" class="btn btn-success w-100">
                SP
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="/pengamatan-persemaian-padi" class="btn btn-warning w-100">
                Pengamatan Persemaian Padi
            </a>
        </div>

        <div class="col-md-6 mb-3">
            <a href="/keadaan-serangan-opt" class="btn btn-danger w-100">
                Keadaan Serangan OPT
            </a>
        </div>

        <div class="col-md-6 mb-3">
            <a href="/keadaan-opt-pada-petak-pegamatan-tetap" class="btn btn-danger w-100">
                Keadaan Opt Pada Petak Pengamatan Tetap
            </a>
        </div>

        <div class="col-md-6 mb-3">
            <a href="/tangkapan-lampu-perangkap" class="btn btn-dark w-100">
                Tangkapan Lampu Perangkap
            </a>
        </div>

    </div>

</div>

@endsection