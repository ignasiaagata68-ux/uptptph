@extends('layouts.admin')

@section('title', 'Master Data')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">
        Master Data
    </h2>

    <div class="row">

        <div class="col-md-3 mb-3">

            <a href="/kabupaten" class="btn btn-primary w-100">

                Kabupaten / Kota

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/kecamatan" class="btn btn-primary w-100">

                Kecamatan

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/desa" class="btn btn-primary w-100">

                Desa

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/komoditas" class="btn btn-primary w-100">

                Komoditas

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/musim_tanam" class="btn btn-success w-100">

                Musim Tanam

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/tahun" class="btn btn-success w-100">

                Tahun

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/bulan" class="btn btn-success w-100">

                Bulan

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/periode" class="btn btn-success w-100">

                Periode

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/petugas" class="btn btn-warning w-100">

                Petugas

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/kelompok-tani" class="btn btn-warning w-100">

                Kelompok Tani

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/opt" class="btn btn-danger w-100">

                OPT

            </a>

        </div>

        <div class="col-md-3 mb-3">

            <a href="/ma" class="btn btn-danger w-100">

                Musuh Alami

            </a>

        </div>

    </div>

</div>

@endsection